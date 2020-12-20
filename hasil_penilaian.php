<?php
include 'koneksi.php';
// $query = "SELECT * from mahasiswa, penilaian, bobot
// where mahasiswa.id_kriteria =bobot.id_kriteria
// AND penilaian.id_bobot=bobot.id_bobot
// AND penilaian.nilai= mahasiswa.nilai
// GROUP By penilaian.id_alternatif, mahasiswa.nim";

$query = 'SELECT * from mahasiswa, penilaian, bobot where mahasiswa.id_kriteria =bobot.id_kriteria 
AND penilaian.id_bobot=bobot.id_bobot AND penilaian.nilai= mahasiswa.nilai
GROUP By penilaian.id_alternatif';

$sql = mysqli_query($koneksi, $query);
$rowcount = mysqli_num_rows($sql);
// $a = $koneksi->query();
// $a =mysqli_query($koneksi, $input);

if (isset($_POST['kembali'])) {
    //Mengosongkan tabel uji
    $sql2 = 'TRUNCATE TABLE mahasiswa';
    $hasil2 = mysqli_query($koneksi, $sql2);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Penilaian</title>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        .container{
            width: 15%;
        }
    </style>
</head>
<body>
    <?php
        while ($row = mysqli_fetch_array($sql)) {
            $id_nilai = $row['id_nilai'];
            // $a="SELECT exp(sum(log(s.nilai))) as hasil,vektor.* FROM vektor where id_nilai='$row[id_nilai]'";
            $a = "SELECT exp(sum(log(s.nilai))) as hasil,id_alternatif FROM s where id_nilai='$id_nilai' group by id_alternatif";
            // $aa = mysqli_fetch_array($a);
            $aa = mysqli_query($koneksi, $a);
            // $aaa = mysqli_fetch_array($aa);
            $jjj[] = $aa['hasil'].'<br>';
            $nama = $row['nama'];
            $nim = $row['nim'];
            $jurusan = $row['jurusan'];
            $alamat = $row['alamat'];
            $telp = $row['telepon'];
            // $a = $aa['nama'];?>
<h3 class="h4 text-center">Pemilihan Calon Musyrif/ah<br> UIN Maulana Malik Ibrahim Malang</h3>
        <div class="container">
                
                <br>
                <br>
                <p class="h6">NIM: <?= $nim; ?> </p>
                <p class="h6">Nama Mahasiswa:<?= $nama; ?> </p>        
                <p class="h6">Jurusan: <?= $jurusan; ?></p>
                <p class="h6">Alamat: <?= $alamat; ?></p>
                <p class="h6">Telepon : <?= $telp; ?></p>
                <br>
                <br>
        </div>
    <?php
        }

        // echo rsort($jjj);

        // $b=$koneksi->query("SELECT FROM s where id_alternatif='$row[id_alternatif]'");
        // $bb = mysqli_fetch_array($b);
        // $hasilAlt[] = $bb['id_alternatif']."<br>";

        // echo rsort($hasilAlt);
        if (rsort($jjj) == 1) {
            ?>
            <h3 align="center">Selamat Anda Lulus</h3>
        <?php
        } elseif (rsort($jjj) == 2) {
            ?>
            <h3>Anda Tidak Lulus</h3>
        <?php
        }

    ?>
    <form action="index_user.php" class="text-center">
            <button class="btn btn-primary text-center" name="kembali">Kembali</button>
    </form>
    
</body>
</html>