<?php
include 'db.php';

$sql = "SELECT jobs.*, users.name AS posted_by_name FROM jobs 
        JOIN users ON jobs.posted_by = users.id 
        WHERE status = 'open'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<h2>" . $row['title'] . "</h2>";
    echo "<p>" . $row['description'] . "</p>";
    echo "<p>Perusahaan: " . $row['company'] . "</p>";
    echo "<p>Lokasi: " . $row['location'] . "</p>";
    echo "<p>Gaji: " . $row['salary'] . "</p>";
    echo "<p>Diposting oleh: " . $row['posted_by_name'] . "</p>";
    echo "<hr>";
}
?>
