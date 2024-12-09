<form method="post">
    Jari-jari: <input type="number" name="jari_jari" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>
<?php
if (isset($_POST['submit'])) {
    $jari_jari = $_POST['jari_jari'];
    $luas = pi() * pow($jari_jari, 2); // Rumus luas lingkaran: π * r^2
    $keliling = 2 * pi() * $jari_jari; // Rumus keliling lingkaran: 2 * π * r
    echo "Luas lingkaran dengan jari-jari $jari_jari adalah: $luas<br>";
    echo "Keliling lingkaran dengan jari-jari $jari_jari adalah: $keliling<br>";
}
