<?php
session_start();
include '../config.php';

if (!isset($_SESSION['email'])) {
    echo "<script> document.location='../../admin.php'</script>";
    exit;
}

$order_id = $_GET['id'] ?? null;

if (!$order_id) {
    echo "<script>alert('Invalid order ID.'); document.location='orders.php'</script>";
    exit;
}

$query = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order_result = $stmt->get_result();
$order = $order_result->fetch_assoc();

if (!$order) {
    echo "<script>alert('Order not found.'); document.location='orders.php'</script>";
    exit;
}

$item_query = "SELECT * FROM order_items WHERE order_id = ?";
$item_stmt = $conn->prepare($item_query);
$item_stmt->bind_param("i", $order_id);
$item_stmt->execute();
$items_result = $item_stmt->get_result();
$order_items = $items_result->fetch_all(MYSQLI_ASSOC);

$store_items_query = "SELECT id, name, price FROM store";
$store_items_result = $conn->query($store_items_query);
$store_items = [];
while ($row = $store_items_result->fetch_assoc()) {
    $store_items[] = $row;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $items = $_POST['items']; 
    $status = $conn->real_escape_string($_POST['status']);

  
    $update_query = "UPDATE orders SET name = ?, email = ?, phone = ?, address = ?, status = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sssssi", $name, $email, $phone, $address, $status, $order_id);

    if ($update_stmt->execute()) {
      
        $delete_items_query = "DELETE FROM order_items WHERE order_id = ?";
        $delete_items_stmt = $conn->prepare($delete_items_query);
        $delete_items_stmt->bind_param("i", $order_id);
        $delete_items_stmt->execute();

        
        $totalPrice = 0;
        foreach ($items as $item) {
            $productName = $conn->real_escape_string($item['name']);
            $productPrice = $conn->real_escape_string($item['price']);
            $quantity = $conn->real_escape_string($item['quantity']);
            $totalPrice += $productPrice * $quantity;

            $insert_item_query = "INSERT INTO order_items (order_id, product_name, product_price, quantity) 
                                  VALUES ('$order_id', '$productName', '$productPrice', '$quantity')";
            $conn->query($insert_item_query);
        }

        
        $update_price_query = "UPDATE orders SET total_price = ? WHERE id = ?";
        $update_price_stmt = $conn->prepare($update_price_query);
        $update_price_stmt->bind_param("di", $totalPrice, $order_id);
        $update_price_stmt->execute();

        echo "<script>alert('Order details updated successfully.'); document.location='orders.php'</script>";
    } else {
        echo "<script>alert('Failed to update order details. Please try again.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order | K9-Vets</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin-dashboard.css">
    <link href="../img/logo.png" rel="icon">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Order #<?php echo htmlspecialchars($order['id']); ?></h1>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($order['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($order['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($order['phone']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($order['address']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="items" class="form-label">Order Items</label>
                <div id="items">
                    <?php foreach ($order_items as $index => $item) { ?>
                        <div class="item-group mb-2">
                            <select name="items[<?php echo $index; ?>][name]" class="form-select mb-1 item-name" required onchange="updatePrice(this)">
                                <?php foreach ($store_items as $store_item) { ?>
                                    <option value="<?php echo $store_item['name']; ?>" 
                                    data-price="<?php echo $store_item['price']; ?>" 
                                    <?php echo $store_item['name'] === $item['product_name'] ? 'selected' : ''; ?>>
                                        <?php echo $store_item['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <input type="number" name="items[<?php echo $index; ?>][quantity]" class="form-control mb-1 item-quantity" value="<?php echo htmlspecialchars($item['quantity']); ?>" placeholder="Quantity" required>
                            <input type="text" name="items[<?php echo $index; ?>][price]" class="form-control item-price" value="<?php echo htmlspecialchars($item['product_price']); ?>" placeholder="Price" readonly>
                        </div>
                    <?php } ?>
                </div>
                <button type="button" class="btn btn-secondary mt-2" onclick="addItem()">Add More Item</button>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Order Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="Pending" <?php echo $order['status'] === 'Pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="Shipped" <?php echo $order['status'] === 'Shipped' ? 'selected' : ''; ?>>Shipped</option>
                    <option value="Delivered" <?php echo $order['status'] === 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                    <option value="Canceled" <?php echo $order['status'] === 'Canceled' ? 'selected' : ''; ?>>Canceled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Order</button>
            <a href="orders.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        const storeItems = <?php echo json_encode($store_items); ?>;

        function addItem() {
            const itemsContainer = document.getElementById('items');
            const itemIndex = itemsContainer.children.length;

            const itemGroup = document.createElement('div');
            itemGroup.className = 'item-group mb-2';

            const select = document.createElement('select');
            select.name = `items[${itemIndex}][name]`;
            select.className = 'form-select mb-1 item-name';
            select.required = true;
            select.onchange = function() { updatePrice(this); };

            storeItems.forEach(function(storeItem) {
                const option = document.createElement('option');
                option.value = storeItem.name;
                option.dataset.price = storeItem.price;
                option.textContent = storeItem.name;
                select.appendChild(option);
            });

            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = `items[${itemIndex}][quantity]`;
            quantityInput.className = 'form-control mb-1 item-quantity';
            quantityInput.placeholder = 'Quantity';
            quantityInput.required = true;

            const priceInput = document.createElement('input');
            priceInput.type = 'text';
            priceInput.name = `items[${itemIndex}][price]`;
            priceInput.className = 'form-control item-price';
            priceInput.placeholder = 'Price';
            priceInput.readOnly = true;

            itemGroup.appendChild(select);
            itemGroup.appendChild(quantityInput);
            itemGroup.appendChild(priceInput);

            itemsContainer.appendChild(itemGroup);
        }

        function updatePrice(selectElement) {
            const price = selectElement.selectedOptions[0].dataset.price;
            const priceInput = selectElement.parentNode.querySelector('.item-price');
            priceInput.value = price;
        }
    </script>
</body>

</html>
