<?php
	$conn = mysqli_connect('localhost','root','','dblogin');


	//ambil data dari form
	if (isset($_POST['bsimpan'])){ //jika tombol update di klik maka akan melakukan pembacaan data yang diinput pad form dan menyimpan pada variabel masing-masing.
		$tkode = $_POST['tkode'];
		$tnama = $_POST['tnama'];
		$tketerangan = $_POST['tketerangan'];
		$tgambar = $_FILES['tgambar']['name'];
		$tkategori = $_POST['tkategori'];
		//set folder untuk menyimpan foto
		$folder = './gambar/';
		//set nama foto
		$sumber = $_FILES['tgambar']['tmp_name'];
		//proses pindah foto
		move_uploaded_file($sumber, $folder.$tgambar);
		//insert ke db
		$insert = mysqli_query($conn, "INSERT INTO tbmasakan VALUES (NULL, '".$tkategori."','".$tkode."','".$tnama."','".$tketerangan."','".$tgambar."')");
		if($insert){ // Cek jika proses simpan ke database sukses atau tidak
		    // Jika Sukses, Lakukan :
			echo '<script>
			window.onload = function(){
				 alert("Input data berhasil");
				 location.href = "index.php"
			}
			</script>';
		  }else{
		    // Jika Gagal, Lakukan :
		    echo '<script>
			window.onload = function(){
				 alert("Input data gagal");
				 location.href = "index.php"
			}
			</script>';
		  }
	
	}
	

?>	
