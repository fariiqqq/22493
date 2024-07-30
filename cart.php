session_start();
require 'database.php'; // Sesuaikan path sesuai dengan struktur folder Anda

echo "<h2>Keranjang Belanja</h2>";

if(isset($_SESSION['shopping_cart']) && count($_SESSION['shopping_cart']) > 0) {
    echo "<ul>";
    foreach($_SESSION['shopping_cart'] as $productId => $qty) {
        // Ambil informasi produk dari database
        $productQuery = $conn->query("SELECT name, price FROM products WHERE id = $productId");
        if($product = $productQuery->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($product['name']) . " - Jumlah: $qty - Harga: Rp" . number_format($product['price'], 2) . "</li>";
        }
    }
    echo "</ul>";
    echo '<a href="checkout.php">Checkout</a>';
} else {
    echo "Keranjang Anda kosong.";
}
