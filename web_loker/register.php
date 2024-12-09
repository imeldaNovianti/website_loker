<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $role = 'seeker'; // Default role untuk pencari kerja

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $name, $email, $password, $phone, $role);

    if ($stmt->execute()) {
        echo "Registrasi berhasil! Silakan <a href='login.php'>login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Nama Lengkap" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="text" name="phone" placeholder="Nomor Telepon" required><br>
    <button type="submit">Daftar</button>
</form>
