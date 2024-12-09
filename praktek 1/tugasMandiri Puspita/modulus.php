<form method="post">
    Angka 1: <input type="number" name="angka1" required><br><br>
    Angka 2: <input type="number" name="angka2" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>
<?php
if (isset($_POST['submit'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    
    if ($angka2 != 0) {
        $hasil = $angka1 % $angka2; // Menghitung modulus (sisa bagi)
        echo "Sisa dari pembagian $angka1 dengan $angka2 adalah: $hasil<br>";
    } else {
        echo "Tidak bisa membagi dengan angka nol!";
    }
}
?>
