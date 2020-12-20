<?php
include 'koneksi.php';

$text_hasil = '';
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

//Mengosongkan tabel uji
$sql2 = 'TRUNCATE TABLE mahasiswa';
$hasil2 = $koneksi->query($sql2);

//mendapatkan jumlah kriteria
$sql2 = 'select * from kriteria';
$hasil2 = $koneksi->query($sql2);
$i = 0;
while ($s2 = $hasil2->fetch_assoc()) {
    $id = ($s2['id_kriteria']);
    $id_kriteria[$i++] = $id;
}

//insert ke dalam tabel uji
for ($i = 0; $i < count($id_kriteria); ++$i) {
    $id_kriteria[] = $_POST['id_kriteria'][$i];
    $nilai[] = $_POST['nilai'][$i];
    $input = "INSERT INTO mahasiswa (nim, nama, jurusan, alamat, telepon, id_kriteria, nilai) VALUE ('$nim','$nama','$jurusan','$alamat','$telepon','$id_kriteria[$i]', '$nilai')";
    $hasil = mysqli_query($koneksi, $sql);
}

//$rr="SELECT * from penilain";
//mencari id kriteria dan id skala yang sama antara tabel uji dan tabel penilaian
$sql2 = 'SELECT * from mahasiswa, penilaian, bobot where mahasiswa.id_kriteria =bobot.id_kriteria 
AND penilaian.id_bobot=bobot.id_bobot AND penilaian.nilai= mahasiswa.nilai
GROUP By penilaian.id_alternatif';
$hasil = $koneksi->query($sql2);
$i = 0;

while ($alternatif = $hasil->fetch_array()) {
    $id_nilai = $alternatif['id_nilai'];

    // $a = "SELECT  exp(sum(log(hasil_wp.pangkat))) AS hasil,id_alternatif from hasil_wp where id_nilai='$id_nilai' group by id_alternatif";
    $a = "SELECT exp(sum(log(s.nilai))) as hasil,id_alternatif FROM s where id_nilai='$id_nilai' group by id_alternatif";
    $ab = $koneksi->query($a);
    $abc = $ab->fetch_array();

    $rr = $abc['hasil'];
    $id_alternatif_hasil = $abc['id_alternatif'];
    $sql2 = "SELECT nm_alternatif from alternatif where id_alternatif='".$id_alternatif_hasil."'";
    $hasil2 = $koneksi->query($sql2);
    while ($s2 = $hasil2->fetch_assoc()) {
        if ($hasil2) {
            $text_hasil = $s2['nm_alternatif'];
        } else {
            $text_hasil = 'Undefined';
        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Panel User</title>
</head>

<body>
    <div class="container">
        <p class="h4 text-center">Pemilihan Mahasiswa Terbaik <br> UIN Maulana Malik Ibrahim Malang</p>
        <br>
        <p class="h6">NIM: <?= $nim; ?> </p>
        <p class="h6">Nama Mahasiswa:<?= $nama; ?> </p>        
        <p class="h6">Alamat: <?= $alamat; ?></p>
        <p class="h6">K1 : <?= $nilai[0]; ?></p>
        <p class="h6">K2 : <?= $nilai[1]; ?> </p>
        <p class="h6">K3 : <?= $nilai[2]; ?></p>
        <p class="h6">k4 : <?= $nilai[3]; ?></p>
        <p class="h6">k5 : <?= $nilai[4]; ?></p>

        <br>
        <p class="h6 text-center">Mahasiswa Dinyatakan </p>
        <p class="h3 text-center bold"> <?= $text_hasil; ?> </p>

        <form action="user.php" class="text-center">
            <button class="btn btn-primary text-center">Back</button>
        </form>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>