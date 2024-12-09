<?php
include 'koneksi.php';

// Query untuk mengambil data mahasiswa
$sql = "SELECT imd_mstmhasiswa.imd_nim, imd_mstmhasiswa.imd_nama, imd_mstmhasiswa.imd_kodejurusan, imd_mstjurusan.imd_namajurusan 
        FROM imd_mstmhasiswa 
        JOIN imd_mstjurusan ON imd_mstmhasiswa.imd_kodejurusan = imd_mstjurusan.imd_kodejurusan";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <style>
       
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .blue { background-color: blue; color: white; }
        .light-blue { background-color: lightblue; color: black; }
        .yellow { background-color: yellow; color: black; }
        .green { background-color: green; color: white; }
        .purple { background-color: purple; color: white; }
    </style>
</head>
<body>

<h1>DATA MAHASISWA</h1>
<h2>UNIVERSITAS NASIONAL PASIM</h2>

<table>
    <tr>
        <th>NO</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>JURUSAN</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        $no = 1;
        while($row = $result->fetch_assoc()) {
            $nim = $row["imd_nim"];
            $nama = $row["imd_nama"];
            $kodejurusan = $row["imd_kodejurusan"];
            $namajurusan = $row["imd_namajurusan"];

            $colorClass = "";
            if (in_array($kodejurusan, ["01", "02"])) {
                $colorClass = "blue";
            } elseif (in_array($kodejurusan, ["03", "04"])) {
                $colorClass = "yellow";
            } elseif (in_array($kodejurusan, ["05", "06"])) {
                $colorClass = "green";
            } elseif ($kodejurusan == "07") {
                $colorClass = "purple";
            } elseif ($kodejurusan == "08") {
                $colorClass = "light-blue";
            }

            echo "<tr class='$colorClass'>
                    <td>$no</td>
                    <td>$nim</td>
                    <td>$nama</td>
                    <td>$namajurusan</td>
                  </tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>