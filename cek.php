<?php
include 'koneksi.php';
// $query = "SELECT * from mahasiswa, penilaian, bobot 
// where mahasiswa.id_kriteria =bobot.id_kriteria 
// AND penilaian.id_bobot=bobot.id_bobot 
// AND penilaian.nilai= mahasiswa.nilai 
// GROUP By penilaian.id_alternatif, mahasiswa.nim";

$query = "SELECT * from mahasiswa, penilaian, bobot where mahasiswa.id_kriteria =bobot.id_kriteria 
AND penilaian.id_bobot=bobot.id_bobot AND penilaian.nilai= mahasiswa.nilai
GROUP By penilaian.id_alternatif, mahasiswa.nim";

$sql = mysqli_query($koneksi,$query);
$rowcount=mysqli_num_rows($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

</head>
<body>
    <?php
        while ($row = mysqli_fetch_array($sql)) {

        // $a=$koneksi->query("SELECT exp(sum(log(nilai))) as hasil,vektor.* FROM vektor where id_nilai='$row[id_nilai]'");
        // $aa = mysqli_fetch_array($a);  
        // $jjj[]=$aa['hasil']."<br>";
        // }
        // echo rsort($jjj);

        // $b=$koneksi->query("SELECT FROM s where id_alternatif='$row[id_alternatif]'");
        // $bb = mysqli_fetch_array($b);
        // $hasilAlt[] = $bb['id_alternatif']."<br>";

        // $c = $koneksi->query("SELECT (s.hasil / result.total_akhir) AS ranking,s.id_alternatif='$row[id_alternatif]' AS id_alternatif from mahasiswa, (s join result) where ");
        // $cc = mysqli_fetch_array($c);
        // $hasil_C = $cc['id_alternatif']."<br>";

        // $d = "SELECT from mahasiswa, penilaian join s where mahasiswa.nilai = penilaian.nilai";
        // $dd = mysqli_fetch_array($dd);
        // $hasil_d = $dd['id_alternatif'];
        
        echo rsort($hasil_d); 
        if(rsort($jjj) == 1 ){
        ?>
        <h2></h2>
        <h3>Selamat Anda Lulus</h3>
        <?php
    }else if(rsort($jjj) == 2){
        ?>
        <h3>Anda Tidak Lulus</h3>
    <?php
    }
}    
    ?>
    
</body>
</html>