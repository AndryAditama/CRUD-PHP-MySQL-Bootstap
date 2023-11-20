<!DOCTYPE html>
<html>
<head>
	<title>Login!</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="sampul">
		<div class="form">
			<form action="" method="post">
				<h1>Login</h1>
				<label>
					<p>Email</p>
					<input type="text" name="email" placeholder="Masukkan email">		
				</label>

				<label>
					<p>Password</p>
					<input type="password" name="pass" placeholder="Masukkan password">		
				</label>
				<br>

				<input type="submit" name="masuk" value="Login"/>
			</form>

			<?php
				//proses masuk
				include "koneksi.php";
				if(isset($_POST['masuk'])){ //jika tombol login diklik
					//lakukan pengecekan username dan password apakah tersedia dalam database
					$cek = mysqli_query($conn, "SELECT * FROM user WHERE email = '".$_POST['email']."' AND password = '".$_POST['pass']."'");
					$hasil = mysqli_fetch_array($cek);
					$count = mysqli_num_rows($cek);
					$nama_user = $hasil['nama']; //mengambil nama user yang login
					if($count > 0){
						session_start();
						$_SESSION['nama'] = $nama_user; //jika berhasil login akan diarahkan ke index.php
						header('location:index.php');
					}else{
						echo '<h4>Login gagal!</h4>';
					}
				}
			?>
		</div>
	</div>
</body>
</html>