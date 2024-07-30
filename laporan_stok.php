<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok - Eastwood Arloji</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  <style>

body {
    font-family: Arial, sans-serif;
    margin: 20px;
}

h1, h2 {
    color: #333;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    text-decoration: none;
    padding: 8px 16px;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
}

nav ul li a:hover {
    background-color: #0056b3;
}

form {
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
}

button {
    margin: 20px 0;
    padding: 10px 20px;
    background-color: #1f1d59;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #1f1d59;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
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

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

.signature {
    margin-top: 50px;
    text-align: right;
}

.signature p {
    margin: 0;
    padding: 0;
}

.signature p + p {
    margin-top: 10px;
}

/* Sembunyikan form saat cetak */
@media print {
    #form-input {
        display: none;
}


    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>

<main>
    <h1>Laporan Stok Tersedia dan Terjual</h1>
    <button onclick="printReport()">Cetak Laporan</button>

    <?php
    include 'database.php';

    $sql = "SELECT p.name, sb.stok_awal, sb.stok_tersedia, 
            (sb.stok_awal - sb.stok_tersedia) AS terjual 
            FROM stok_barang sb
            JOIN produk p ON sb.id_produk = p.id_produk";
    $result = $conn->query($sql);

    echo "<h2>Stok Produk</h2>";
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Nama Produk</th><th>Stok Awal</th><th>Stok Tersedia</th><th>Terjual</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["stok_awal"] . "</td>";
            echo "<td>" . $row["stok_tersedia"] . "</td>";
            echo "<td>" . $row["terjual"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Tidak ada data stok.</p>";
    }
    $conn->close();
    ?>
</main>

</body>
</html>
