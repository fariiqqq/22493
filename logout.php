<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Home Eastwood Arloji</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Sesuaikan path jika diperlukan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .logout-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        a {
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h2>Anda telah berhasil logout</h2>
        <p>Terima kasih telah mengunjungi Home Eastwood Arloji.</p>
        <p><a href="login.php">Kembali ke halaman login</a></p>
    </div>

    <?php
    session_start();
    // Hapus semua variabel sesi
    $_SESSION = array();

    // Jika ingin menghancurkan sesi juga, hapus cookie sesi.
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Hancurkan sesi
    session_destroy();
    ?>
</body>
</html>

