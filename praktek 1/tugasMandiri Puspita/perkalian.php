<form method="post">
    Angka 1: <input type="number" name="angka1" required><br><br>
    Angka 2: <input type="number" name="angka2" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>
<?php
if (isset($_POST['submit'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $hasil = $angka1 * $angka2; 
    echo "Hasil dari perkalian $angka1 dan $angka2 adalah: $hasil<br>";
}
?>
