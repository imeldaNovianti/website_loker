<?php
include "koneksi.php";

$action = $_GET['action'];
$kode_fakultas = $_POST['kode_fakultas'];
$nama_fakultas = $_POST['nama_fakultas'];
$nama_dekan = $_POST['nama_dekan'];
$alamat = $_POST['alamat'];

switch ($action) {
    case 'tambah':
        mysqli_query($con, "INSERT INTO mst_fakultas VALUES ('$kode_fakultas', '$nama_fakultas', '$nama_dekan', '$alamat')")
            or die("SQL Salah: " . mysqli_error($con));
        break;

    case 'ubah':
        mysqli_query($con, "UPDATE mst_fakultas 
                            SET nama_fakultas = '$nama_fakultas', nama_dekan = '$nama_dekan', alamat = '$alamat'
                            WHERE kode_fakultas = '$kode_fakultas'")
            or die("SQL Salah: " . mysqli_error($con));
        break;

    case 'hapus':
        $kode_fak = $_GET['kodefak'];
        mysqli_query($con, "DELETE FROM mst_fakultas WHERE kode_fakultas = '$kode_fak'")
            or die("SQL Salah: " . mysqli_error($con));
        break;
}

header("Location: fakultas.php");
?>
