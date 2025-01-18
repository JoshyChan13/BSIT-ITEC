<?php
require 'Modules/connect.php';
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['cart_id'], $data['quantity']) || $data['quantity'] < 1) {
    echo json_encode(['success' => false, 'message' => 'Invalid data']);
    exit;
}

$cart_id = intval($data['cart_id']);
$quantity = intval($data['quantity']);


$sql = "UPDATE cart SET quantity = ? WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ii", $quantity, $cart_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Quantity updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
}

$stmt->close();
$con->close();
?>
