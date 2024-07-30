<?php
session_start();
require 'database.php'; // Pastikan database.php terhubung dengan benar

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM users WHERE id = '$userId'");

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    die("Pengguna tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - ARLOJI</title>
</head>
<body>
    <h2>Profil Pengguna</h2>
    <form action="update_profile.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
        
        <!-- Tambahkan field lain sesuai kebutuhan -->
        
        <input type="submit" value="Update Profil">
    </form>
</body>
</html>
