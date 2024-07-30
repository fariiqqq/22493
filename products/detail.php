<?php
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    include 'database.php'; // Memasukkan konfigurasi database

    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo $row["name"]; ?> - Sepatu Online</title>
        </head>
        <body>
            <h1><?php echo $row["name"]; ?></h1>
            <img src='../assets/images/<?php echo $row["image"]; ?>' alt='<?php echo $row["name"]; ?>'>
            <p>Deskripsi: <?php echo $row["description"]; ?></p>
            <p>Harga: Rp<?php echo number_format($row["price"], 2, ',', '.'); ?></p>
        </body>
        </html>

        <?php
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "Produk tidak ditentukan.";
}
$conn->close();
?>
