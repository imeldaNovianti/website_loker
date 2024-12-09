<form method="post">
    Sisi 1: <input type="number" name="sisi1" required><br><br>
    Sisi 2: <input type="number" name="sisi2" required><br><br>
    Sisi 3: <input type="number" name="sisi3" required><br><br>
    <input type="submit" name="submit" value="Hitung">
</form>
<?php
if (isset($_POST['submit'])) {
    $sisi1 = $_POST['sisi1'];
    $sisi2 = $_POST['sisi2'];
    $sisi3 = $_POST['sisi3'];
    
    $keliling = $sisi1 + $sisi2 + $sisi3;
    
    echo "Keliling segitiga dengan sisi $sisi1, $sisi2, dan $sisi3 adalah: $keliling<br>";
}
?>
