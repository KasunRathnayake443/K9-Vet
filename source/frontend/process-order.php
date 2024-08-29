<?php
session_start();
ob_start(); 

require('../fpdf/fpdf.php');
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $cartData = json_decode($_POST['cart_data'], true);

    $totalPrice = 0;
    foreach ($cartData as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
    $status = "Pending";
    $sql = "INSERT INTO orders (name, email, phone, address, total_price, created_at,status) 
            VALUES ('$name', '$email', '$phone', '$address', '$totalPrice', NOW(), '$status')";

    if ($conn->query($sql) === TRUE) {
        $orderId = $conn->insert_id;

        foreach ($cartData as $item) {
            $productName = $conn->real_escape_string($item['name']);
            $productPrice = $item['price'];
            $quantity = $item['quantity'];

            $sqlItem = "INSERT INTO order_items (order_id, product_name, product_price, quantity) 
                        VALUES ('$orderId', '$productName', '$productPrice', '$quantity')";
            $conn->query($sqlItem);
        }

       
        $pdf = new FPDF();
        $pdf->AddPage();

        
        $pdf->Image('../img/logo.png', 10, 10, 30);
        $pdf->Ln(35); 

      
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(190, 10, 'Order Confirmation - K9-Vets', 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 10, "Order ID: $orderId", 0, 1);
        $pdf->Cell(190, 10, "Customer Name: $name", 0, 1);
        $pdf->Cell(190, 10, "Email: $email", 0, 1);
        $pdf->Cell(190, 10, "Phone: $phone", 0, 1);
        $pdf->Cell(190, 10, "Address: $address", 0, 1);
        $pdf->Ln(10);

        $pdf->Cell(190, 10, "Order Summary:", 0, 1);
        foreach ($cartData as $item) {
            $pdf->Cell(190, 10, "{$item['name']} (x{$item['quantity']}): Rs {$item['price']} each", 0, 1);
        }
        $pdf->Ln(10);

        $pdf->Cell(190, 10, "Total: Rs $totalPrice", 0, 1);
        $pdf->Ln(20);

        $pdf->Cell(190, 10, "Thank you for choosing K9-Vets!", 0, 1, 'C');

        $pdfFile = "order_$orderId.pdf";
        $pdf->Output('F', "../orders/$pdfFile"); 
        $_SESSION['pdf_file'] = "../orders/$pdfFile";
        unset($_SESSION['cart']);

       
        $_SESSION['order_id'] = $orderId;

        
        ob_end_clean(); 
        header("Location: thank-you.php");
        exit(); 

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
