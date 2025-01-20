<?php

header('Content-Type: application/json');

session_start();

if (!isset($_SESSION['Username'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit();
}

include("Modules/connect.php");

try {
    $username = $_SESSION['Username']; 

    $sql = "SELECT c.item_id, c.quantity, p.price 
            FROM cart c 
            JOIN products p ON c.item_id = p.Item_id 
            WHERE c.username = ?";
    $stmt = $con->prepare($sql);
    
    if ($stmt === false) {
        throw new Exception("Error preparing the SQL statement: " . $con->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $grand_total = 0;
        $total_quantity = 0;

        while ($row = $result->fetch_assoc()) {
            $total_quantity += $row['quantity'];
            $grand_total += $row['price'] * $row['quantity'];
        }

        $con->begin_transaction();

        $order_sql = "INSERT INTO orders_table (total_quantity, grand_total, username) VALUES (?, ?, ?)";
        $order_stmt = $con->prepare($order_sql);
        
        if ($order_stmt === false) {
            throw new Exception("Error preparing the insert order statement: " . $con->error);
        }

        $order_stmt->bind_param("dis", $total_quantity, $grand_total, $username);
        $order_stmt->execute();

        $clear_cart_sql = "DELETE FROM cart WHERE username = ?";
        $clear_stmt = $con->prepare($clear_cart_sql);

        if ($clear_stmt === false) {
            throw new Exception("Error preparing the clear cart statement: " . $con->error);
        }

        $clear_stmt->bind_param("s", $username);
        $clear_stmt->execute();

        $con->commit();

        echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$con->close();
?>
