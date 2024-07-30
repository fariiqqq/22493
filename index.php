<?php
session_start(); // Memulai sesi
include 'database.php'; // Memasukkan file konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EASTWOOD ARLOJI</title>
    <link rel="stylesheet" href="assets/css/style.css"> 
    </style><!-- Sesuaikan path jika diperlukan -->
</head>
<body>
    <header>
        <h1>Selamat Datang di EASTWOOD ARLOJI</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Produk</a></li>
                <li><a href="about.php">Tentang Kami</a></li>
                <li><a href="contact.php">Kontak</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li><a href="profile.php">Profil</a></li>
                    <li><a href="laporan_harian.php">Laporan Harian</a></li>
                    <li><a href="laporan_stok.php">Laporan Stok</a></li>
            </li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-products">
            <h2>Produk Unggulan</h2>
            <div class="products">
                <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM produk LIMIT 5";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='assets/images/" . htmlspecialchars($row["image"]) . "' alt='" . htmlspecialchars($row["name"]) . "'>";
                        echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                        echo "<p>" . htmlspecialchars($row["description"]) . "</p>";
                        echo "<p>Rp" . htmlspecialchars($row["price"]) . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada produk unggulan saat ini.</p>";
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> EASTWOOD ARLOJI. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
