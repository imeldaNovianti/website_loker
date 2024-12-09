<?php
include "koneksi.php";

$action = @$_GET['action'];

if ($action == 'tambah') {
    echo "<form name='updatefakultas' method='post' action='simpan.php?action=tambah'>
            <table border='0'>
                <tr>
                    <td>KODE FAKULTAS</td>
                    <td><input name='kode_fakultas' type='text' size='15'></td>
                </tr>
                <tr>
                    <td>NAMA FAKULTAS</td>
                    <td><input name='nama_fakultas' type='text' size='50'></td>
                </tr>
                <tr>
                    <td>NAMA DEKAN</td>
                    <td><input name='nama_dekan' type='text' size='50'></td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td><input name='alamat' type='text' size='50'></td>
                </tr>
                <tr>
                    <td colspan='2' align='right'>
                        <input type='submit' value='Simpan'>
                        <input type='button' value='Kembali' onClick='history.back()'>
                    </td>
                </tr>
            </table>
        </form>";
} elseif ($action == 'ubah') {
    $kodefak = $_GET['kodefak'];
    $qubah = mysqli_query($con, "SELECT * FROM mst_fakultas WHERE kode_fakultas = '$kodefak'");
    $tubah = mysqli_fetch_array($qubah);

    echo "<form name='updatefakultas' method='post' action='simpan.php?action=ubah'>
            <table border='0'>
                <tr>
                    <td>KODE FAKULTAS</td>
                    <td><input name='kode_fakultas' type='text' size='15' readonly value='$tubah[kode_fakultas]'></td>
                </tr>
                <tr>
                    <td>NAMA FAKULTAS</td>
                    <td><input name='nama_fakultas' type='text' size='50' value='$tubah[nama_fakultas]'></td>
                </tr>
                <tr>
                    <td>NAMA DEKAN</td>
                    <td><input name='nama_dekan' type='text' size='50' value='$tubah[nama_dekan]'></td>
                </tr>
                <tr>
                    <td>ALAMAT</td>
                    <td><input name='alamat' type='text' size='50' value='$tubah[alamat]'></td>
                </tr>
                <tr>
                    <td colspan='2' align='right'>
                        <input type='submit' value='Simpan'>
                        <input type='button' value='Kembali' onClick='history.back()'>
                    </td>
                </tr>
            </table>
        </form>";
} else {
    $qfak = mysqli_query($con, "SELECT * FROM mst_fakultas");
    echo "
        <h2>Data Fakultas</h2>
        <table border='1' cellpadding='5' cellspacing='0'>
            <tr>
                <th>No</th>
                <th>Kode Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Nama Dekan</th>
                <th>Alamat</th>
<th><a href='fakultas.php?action=tambah'>TAMBAH</a></th>            
</tr>";
    $nomor = 0;
    while ($tfak = mysqli_fetch_array($qfak)) {
        $nomor++;
        echo "<tr>
            <td>$nomor</td>
            <td>$tfak[kode_fakultas]</td>
            <td>$tfak[nama_fakultas]</td>
            <td>$tfak[nama_dekan]</td>
            <td>$tfak[alamat]</td>
            <td>
                <a href='fakultas.php?action=ubah&kodefak=$tfak[kode_fakultas]'>Ubah</a> 
                <a href='simpan.php?action=hapus&kodefak=$tfak[kode_fakultas]'>Hapus</a>
            </td>
        </tr>";
    }
    echo "</table>";
}
?>
