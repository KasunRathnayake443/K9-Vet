<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - K9-Vets</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item h6 {
            margin: 0;
        }
        .cart-footer {
            text-align: right;
            margin-top: 20px;
        }
        .total-amount {
            font-weight: bold;
        }
        .checkout-form {
            margin-top: 30px;
        }
        .checkout-form .form-group {
            margin-bottom: 15px;
        }
        .checkout-form label {
            display: block;
            margin-bottom: 5px;
        }
        .checkout-form input, .checkout-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .checkout-form button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .checkout-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Checkout</h2>
    
    <div class="checkout-container">
        <h2>Your Cart</h2>
        <div id="cart-items">
            
        </div>
        <h4>Total: Rs <span id="cart-total">0</span></h4>
    </div>

    <script>
        function renderCheckoutCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartItemsContainer = document.getElementById('cart-items');
            const cartTotalElement = document.getElementById('cart-total');
            cartItemsContainer.innerHTML = '';
            let total = 0;

            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty.</p>';
            } else {
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.innerHTML = `
                        <h6>${item.name} (x${item.quantity})</h6>
                        <span>Rs ${itemTotal.toFixed(2)}</span>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                });

                cartTotalElement.textContent = total.toFixed(2);
            }
        }

       
        document.addEventListener('DOMContentLoaded', renderCheckoutCart);
    </script>
    
    <form class="checkout-form" action="process-order.php" method="POST" onsubmit="return passCartToServer();">
        <h3>Shipping Details</h3>
        
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        
        <div class="form-group">
            <label for="address">Shipping Address</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>

       
        <input type="hidden" id="cart-data" name="cart_data">

        <button type="submit">Place Order</button>
    </form>
</div>

<script>
    function passCartToServer() {
        const cart = localStorage.getItem('cart');
        document.getElementById('cart-data').value = cart;
        return true; 
    }
</script>

</body>
</html>
