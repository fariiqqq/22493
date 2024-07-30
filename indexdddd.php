<?php
include 'database.php'; // Memasukkan file konfigurasi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - EASTWOOD ARLOJI</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
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
            </ul>
        </nav>
    </header>

    <main>
        <section id="featured-products">
            <h2>produk Unggulan</h2>
            <div class="products">
                <?php
                // Query untuk mendapatkan produk unggulan
                $query = "SELECT * FROM products LIMIT 5";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='assets/images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                        echo "<h3>" . $row["name"] . "</h3>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<p>Rp" . $row["price"] . "</p>";
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
        <p>&copy; 2024 EASTWOOD ARLOJI.</p>
    </footer>
</body>
</html>
