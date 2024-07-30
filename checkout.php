<?php
session_start(); // Memulai sesi

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Mengarahkan ke login jika belum masuk
    exit();
}

include 'database.php'; // Meng-include konfigurasi database

// Function to display the cart contents
function displayCart() {
    if (empty($_SESSION['cart'])) {
        echo "<p>Keranjang belanja anda kosong</p>";
    } else {
        echo "<table border='1'>";
        echo "<tr><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Total</th></tr>";
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $item) {
            $totalItemPrice = $item['price'] * $item['quantity'];
            $totalPrice += $totalItemPrice;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['name']) . "</td>";
            echo "<td>Rp" . number_format($item['price'], 2, ',', '.') . "</td>";
            echo "<td>" . $item['quantity'] . "</td>";
            echo "<td>Rp" . number_format($totalItemPrice, 2, ',', '.') . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='3'>Total</td>";
        echo "<td>Rp" . number_format($totalPrice, 2, ',', '.') . "</td>";
        echo "</tr>";
        echo "</table>";
    }
}

// Process the order on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Here you can add code to save the order details to the database
    // and process the payment.

    // Clear the cart after successful order processing
    unset($_SESSION['cart']);

    echo "<p>Terima kasih telah berbelanja! Pesanan Anda sedang diproses.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {background-color: #f9f9f9;}
        a {
            text-decoration: none;
            color: #0275d8;
        }
        a:hover {
            color: #01447e;
        }
        .header {
            background-color: #0275d8;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        .checkout-btn {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #0275d8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .checkout-btn:hover {
            background-color: #01447e;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="tel"], textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Checkout</h1>
    </div>
    <div class="container">
        <h2>Detail Keranjang</h2>
        <?php displayCart(); ?>
        <h2>Detail Pengiriman</h2>
        <form method="post" action="checkout.php">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat:</label>
                <textarea id="address" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label for="phone">Telepon:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <button type="submit" class="checkout-btn">Konfirmasi Pembelian</button>
        </form>
    </div>
</body>
</html>