session_start();
require 'database.php'; // Sesuaikan path sesuai dengan struktur folder Anda

if(isset($_GET['action'], $_GET['product_id']) && $_GET['action'] == 'add_to_cart') {
    $productId = $_GET['product_id'];

    // Cek apakah 'shopping_cart' sudah ada di sesi
    if(!isset($_SESSION['shopping_cart'])) {
        $_SESSION['shopping_cart'] = [];
    }

    // Tambah atau update jumlah produk di keranjang
    if(!isset($_SESSION['shopping_cart'][$productId])) {
        $_SESSION['shopping_cart'][$productId] = 0;
    }
    $_SESSION['shopping_cart'][$productId]++;

    // Redirect kembali ke halaman produk atau keranjang
    header("Location: products.php");
    exit;
}
