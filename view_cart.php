<?php
session_start();
include("Modules/connect.php");

if(empty($_SESSION["Username"])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT c.id, c.item_id, c.quantity, p.name, p.price, p.image 
        FROM cart c 
        JOIN products p ON c.item_id = p.Item_id 
        WHERE c.id IS NOT NULL";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <title>Your Cart</title>
    <style>
        table th {
            background-color: #f8f9fa;
            color: #000;
            text-align: center; 
            font-weight: bold;
        }
        table td {
            text-align: center;
        }
        .table {
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <header>
        <a href=""><img src="img/logo.png" style="width: 110px;"></a>
        <nav class="navbar">
        <a href="home.php" class="nav">HOME</a>
            <a href="menu.php" class="nav">MENU</a>
            <a href="Celebration.php" class="nav">RESERVATION</a>
            <a href="view_cart.php" class="nav">CART</a>
            <a href="Contact.php" class="nav">CONTACT</a>
            <a href="logout.php" class="login" onclick="logout()">LOGOUT</a>
        </nav>
    </header>
    
    <div class="container">
        <h1 class="text-center">Your Cart</h1>

        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
        
            $grand_total = 0;
        
            while ($row = $result->fetch_assoc()) {
                $total_price = $row['price'] * $row['quantity'];
                $grand_total += $total_price;
        
                echo '<tr id="row_' . $row['id'] . '">
                        <td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="100" height="100"></td>
                        <td>' . $row['name'] . '</td>
                        <td>₱' . number_format($row['price'], 2) . '</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="updateQuantity(' . $row['id'] . ', \'decrease\', ' . $row['price'] . ')">-</button>
                            <span id="quantity_' . $row['id'] . '">' . $row['quantity'] . '</span>
                            <button class="btn btn-success btn-sm" onclick="updateQuantity(' . $row['id'] . ', \'increase\', ' . $row['price'] . ')">+</button>
                        </td>
                        <td><span id="total_' . $row['id'] . '" class="item-total">₱' . number_format($total_price, 2) . '</span></td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="removeFromCart(' . $row['id'] . ')">Remove</button>
                        </td>
                    </tr>';
            }
        
            echo '</tbody>
                </table>';
        
            echo '<div class="total-price text-right">
                    <h3>Total: <span id="total-price">₱' . number_format($grand_total, 2) . '</span></h3>
                </div>';
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </div>

    <script>

        function updateQuantity(cartId, action, price) {
            const quantityElement = document.getElementById('quantity_' + cartId);
            const totalElement = document.getElementById('total_' + cartId);
            let quantity = parseInt(quantityElement.innerText);


            if (action === 'increase') {
                quantity++;
            } else if (action === 'decrease' && quantity > 1) {
                quantity--;
            }


            quantityElement.innerText = quantity;

            const itemTotal = quantity * price;
            totalElement.innerText = '₱' + itemTotal.toFixed(2);

            fetch('update_quantity.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    console.log('Quantity updated successfully');
                } else {
                    alert('Error: ' + result.message);
                }
            })
            .catch(error => console.error('Error:', error));


            updateGrandTotal();
        }


        function updateGrandTotal() {
            let grandTotal = 0;

            document.querySelectorAll('.item-total').forEach(itemTotal => {
                grandTotal += parseFloat(itemTotal.innerText.replace('₱', '').trim());
            });

            const totalPriceElement = document.getElementById('total-price');
            totalPriceElement.innerText = '₱' + grandTotal.toFixed(2);
        }


        function removeFromCart(cartId) {
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cart_id: cartId })
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {

                    const row = document.getElementById('row_' + cartId);
                    if (row) {
                        row.remove();
                    }
                    updateGrandTotal(); 
                } else {
                    alert('Error: ' + result.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }

    </script>
</body>
</html>
