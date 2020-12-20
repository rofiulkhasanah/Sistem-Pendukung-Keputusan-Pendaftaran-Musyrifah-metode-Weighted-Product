<?php
	include "koneksi.php";
	$nama	= $_POST['nama'];
	$value	= $_POST['value'];
	$input	= "INSERT INTO skala (nm_skala, value) VALUES ('$nama', '$value')";
	$query_input =mysqli_query($koneksi, $input);

		if ($query_input) {
			?>
			<script language="JavaScript">
			alert('Data Mahasiswa Berhasil diinput!');
			document.location='alternatif.php';
		</script>
<?php
	} else {
		echo "Input gagal";
	}

	mysqli_close($koneksi);
?>



