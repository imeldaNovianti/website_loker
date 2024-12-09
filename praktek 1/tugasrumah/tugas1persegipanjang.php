<form method="post">
    Panjang: <input type="number" name="panjang" required><br><br>
    Lebar: <input type="number" name="lebar" required><br><br>
    <input type="submit" name="submit" value="Hitung">
    </form>
<?php
if (isset($_POST['submit'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $luas = $panjang * $lebar;
    echo "Luas Persegi Panjang dengan panjang $panjang dan lebar $lebar adalah: $luas<br>";
}
?>
