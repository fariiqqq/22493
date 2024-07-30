<?php
include '../database.php'; // Memasukkan konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Produk - Sepatu Online</title>
</head>
<body>
    <h1>Semua Produk</h1>
    <div class="products">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<img src='../assets/images/" . $row["image"] . "' alt='" . $row["name"] . "'>";
                echo "<h3><a href='detail.php?id=" . $row["id"] . "'>" . $row["name"] . "</a></h3>";
                echo "<p>Rp" . number_format($row["price"], 2, ',', '.') . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Belum ada produk yang ditambahkan.</p>";
        }
        ?>
    </div>
</body>
</html>
