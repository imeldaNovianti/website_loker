?>
<form method="post">
    Alas: <input type="number" name="alas" required><br><br>
    Tinggi: <input type="number" name="tinggi" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>
<?php
if (isset($_POST['submit'])) {
    $alas = $_POST['alas'];
    $tinggi = $_POST['tinggi'];
    $luas = 0.5 * $alas * $tinggi;
    echo "Luas segitiga dengan alas $alas dan tinggi $tinggi adalah: $luas<br>";
}
