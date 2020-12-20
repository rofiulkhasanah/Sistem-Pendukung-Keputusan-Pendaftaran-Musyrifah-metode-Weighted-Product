<!DOCTYPE html>
<html>
<head>
	<title>Mahad Sunan Ampel Al-Aly</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
 
	<h1>Mahad Sunan Ampel Al-Aly <br/> UIN Maulana Malik Ibrahim Malang </h1>
 
	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}

	if(isset($_POST['nama_lengkap']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
		$user = new User();

		$nama_lengkap = $_POST['nama_lengkap'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];

		$qry = $user->Register($nama_lengkap, $username, $password, $email);
		if ($qry){
			echo "<script language='javascript'>alert('Register berhasil, silahkan login');document.location='index.php'</script>";
		}else{
			echo "<script language='javascript'>alert('Gagal');document;location='index.php'</script>";
		}
	}
	?>
 
	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="user_nama" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="user_password" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

</body>
</html>