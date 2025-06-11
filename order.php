<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $customer_name = $data['customer_name'];
    $phone = $data['phone'];
    $address = $data['address'];
    $food_item = $data['food_item'];
    $quantity = $data['quantity'];
    $price_per_item = 10.00; // Example price
    $total_price = $quantity * $price_per_item;

    $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, address, food_item, quantity, total_price) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssid", $customer_name, $phone, $address, $food_item, $quantity, $total_price);

    echo json_encode(["status" => $stmt->execute() ? "success" : "error"]);

    $stmt->close();
    $conn->close();
}
?>
