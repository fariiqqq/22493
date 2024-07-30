<?php
session_start(); // Memulai sesi
include 'database.php'; // Memasukkan file konfigurasi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - EASTWOOD ARLOJI</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #007BFF 3px solid;
        }
        header a {
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        header ul {
            padding: 0;
            list-style: none;
        }
        header li {
            display: inline;
            padding: 0 20px 0 20px;
        }
        .main-header {
            text-align: center;
            background-color: #007BFF;
            color: white;
            padding: 50px 0;
        }
        .main-header h1 {
            margin: 0;
            font-size: 3em;
        }
        .contact-form {
            background: #fff;
            padding: 30px;
            margin: 30px 0;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-form label {
            display: block;
            margin-bottom: 5px;
        }
        .contact-form input[type="text"], 
        .contact-form input[type="email"], 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .contact-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .contact-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .contact-info {
            margin: 30px 0;
        }
        .contact-info p {
            margin: 0;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #333;
            color: #fff;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1 class="logo">EASTWOOD ARLOJI</h1>
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
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="main-header">
        <h1>Kontak Kami</h1>
    </div>

    <div class="container">
        <section class="contact-form">
            <h2>Formulir Kontak</h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);

                // Kirim email atau simpan pesan ke database
                // Contoh: mail($to, $subject, $message, $headers);
                // atau $conn->query("INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')");

                echo "<p>Terima kasih atas pesan Anda, $name. Kami akan segera menghubungi Anda.</p>";
            }
            ?>
            <form action="contact.php" method="post">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                
                <input type="submit" value="Kirim">
            </form>
        </section>

        <section class="contact-info">
            <h2>Informasi Kontak</h2>
            <p>Email: info@eastwoodarloji.com</p>
            <p>Telepon: +62 812 3456 7890</p>
            <p>Alamat: Jl. Sukajadi No. 123, Jakarta, Indonesia</p>
        </section>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> EASTWOOD ARLOJI. Semua hak dilindungi.</p>
    </footer>
</body>
</html>