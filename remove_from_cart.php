<?php
require 'Modules/connect.php';
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cart_id']) || empty($data['cart_id'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid or missing cart ID']);
    exit;
}

$cart_id = intval($data['cart_id']);

$sql = "DELETE FROM cart WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $cart_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Item removed from cart']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to remove item from cart']);
}

$stmt->close();
$con->close();
?>
