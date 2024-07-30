<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if(isset($_POST['address'], $_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {
    $address = $conn->real_escape_string($_POST['address']);
    $userId = $_SESSION['user_id']; // Pastikan Anda telah menetapkan ini saat login
    $totalPrice = 0; // Ini akan dihitung berdasarkan harga total produk di keranjang
    
    // Hitung total harga
    foreach($_SESSION['shopping_cart'] as $productId => $qty) {
        $result = $conn->query("SELECT price FROM products WHERE id = $productId");
        if($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $totalPrice += $product['price'] * $qty;
        }
    }
    
    // Simpan order ke database
    $orderQuery = "INSERT INTO orders (user_id, total_price, status) VALUES ($userId, $totalPrice, 'pending')";
    if($conn->query($orderQuery)) {
        $orderId = $conn->insert_id; // Mendapatkan ID order yang baru disimpan
        
        // Simpan detail order
        foreach($_SESSION['shopping_cart'] as $productId => $qty) {
            $productQuery = $conn->query("SELECT price FROM products WHERE id = $productId");
            if($product = $productQuery->fetch_assoc()) {
                $price = $product['price'];
                $conn->query("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES ($orderId, $productId, $qty, $price)");
            }
        }
        
        // Kosongkan keranjang belanja
        unset($_SESSION['shopping_cart']);
        
        echo "<script>alert('Pesanan Anda telah berhasil diproses.'); window.location.href = 'index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    header("Location: checkout.php");
    exit;
}
?>
