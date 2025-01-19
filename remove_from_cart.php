<?php
require 'Modules/connect.php';
$data = json_decode(file_get_contents("php://input"), true);

// Check if 'cart_id' is provided in the request
if (!isset($data['cart_id']) || empty($data['cart_id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing cart ID']);
    exit;
}

$cart_id = intval($data['cart_id']); // Sanitize cart ID to an integer

// Prepare SQL query to remove the item from the cart
$sql = "DELETE FROM cart WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $cart_id);

// Execute the query and check if the item was successfully removed
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove item from cart']);
}

// Close the statement and database connection
$stmt->close();
$con->close();
?>
