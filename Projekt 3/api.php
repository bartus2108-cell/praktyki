<?php
$products = [
    ["id" => 1, "name" => "Produkt 1", "price" => 10],
    ["id" => 2, "name" => "Produkt 2", "price" => 20],
    ["id" => 3, "name" => "Produkt 3", "price" => 30],
];

$action = $_GET["action"] ?? "";

switch ($action) {
    case "get_products":
        header("Content-Type: application/json");
        echo json_encode($products);
        break;
    case "add_to_cart":
        session_start();
        $productId = $_GET["product_id"] ?? 0;
        $cart = $_SESSION['cart'] ?? [];
        $product = array_filter($products, fn($p) => $p["id"] == $productId);
        if ($product) {
            $cart[] = array_shift($product);
            $_SESSION["cart"] = $cart;
        }
        header("Content-Type: application/json");
        echo json_encode(["cart" => $cart]);
        break;
    default:
        header("HTTP/1.0 400 Bad Request");
        break;
    }
?>