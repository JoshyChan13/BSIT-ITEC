<?php
require 'Modules/connect.php'; 
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['Username'])) {
    echo '<script type="text/javascript">window.location.href = "login.php";</script>';
    exit();
}

$username = $_SESSION['Username'];

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data['item_id'], $data['name'], $data['price'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid data received.']);
    exit;
}

$item_id = intval($data['item_id']);
$name = $data['name'];
$price = floatval($data['price']);

$sql = "SELECT quantity FROM cart WHERE item_id = ? AND username = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("is", $item_id, $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE item_id = ? AND username = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("is", $item_id, $username);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product quantity updated.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update quantity.', 'error' => $stmt->error]);
    }
} else {
    $sql = "INSERT INTO cart (item_id, name, price, quantity, username) VALUES (?, ?, ?, 1, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("isis", $item_id, $name, $price, $username); 

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Product added to cart.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add product to cart.', 'error' => $stmt->error]);
    }
}

$stmt->close();
$con->close();
?>
