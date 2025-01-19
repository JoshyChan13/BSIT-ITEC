<?php

header('Content-Type: application/json');


include("Modules/connect.php");

try {
    $sql = "SELECT c.item_id, c.quantity, p.price 
            FROM cart c 
            JOIN products p ON c.item_id = p.Item_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $grand_total = 0;
        $total_quantity = 0;

        while ($row = $result->fetch_assoc()) {
            $total_quantity += $row['quantity'];
            $grand_total += $row['price'] * $row['quantity'];
        }

        $con->begin_transaction();


        $order_sql = "INSERT INTO orders_table (total_quantity, grand_total) VALUES (?, ?)";
        $order_stmt = $con->prepare($order_sql);
        $order_stmt->bind_param("id", $total_quantity, $grand_total);
        $order_stmt->execute();


        $clear_cart_sql = "DELETE FROM cart";
        $con->query($clear_cart_sql);

        $con->commit();

        echo json_encode(['success' => true, 'message' => 'Order placed successfully']);
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}

$con->close();
?>
