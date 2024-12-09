<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'employer') {
    die("Anda tidak memiliki akses ke halaman ini.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $type = $_POST['type'];
    $posted_by = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO jobs (title, description, company, location, salary, type, posted_by) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssi', $title, $description, $company, $location, $salary, $type, $posted_by);

    if ($stmt->execute()) {
        echo "Lowongan berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="POST">
    <input type="text" name="title" placeholder="Judul Pekerjaan" required><br>
    <textarea name="description" placeholder="Deskripsi Pekerjaan" required></textarea><br>
    <input type="text" name="company" placeholder="Nama Perusahaan" required><br>
    <input type="text" name="location" placeholder="Lokasi" required><br>
    <input type="text" name="salary" placeholder="Gaji" required><br>
    <select name="type" required>
        <option value="Full-time">Full-time</option>
        <option value="Part-time">Part-time</option>
        <option value="Internship">Internship</option>
        <option value="Freelance">Freelance</option>
    </select><br>
    <button type="submit">Tambah Lowongan</button>
</form>
