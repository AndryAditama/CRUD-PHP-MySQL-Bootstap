<?php
	include "koneksi.php";
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['nama'])){ //mengecek apakah sudah ada user yg login
		echo 'Anda Belum Login!
		<p><a href="masuk.php">Login disini</a></p>';
		//jika tidak ada user yg login tidak akan tampil menu
	}else{
		//jika sudah aa user yg login maka akan menampilkan menu index.php

?>	

<!DOCTYPE html>
<html>
<head>
	<title>Daftar Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">SELAMAT DATANG</h1>
		<h2 class="text-center"><?php echo $_SESSION['nama']; ?></h2>

		
					

				<!-- Tabel tampilan -->
			<div class="card mt-3">
		  		<div class="card-header bg-success text-white">
		    		Daftar Menu Masakan
		  		</div>
			  		<div class="card-body">
			  			<div>
							<br>
							<form class="form-inline" action="" method="post">
								<div>
									<input type="text" name="cari" class="form-control" placeholder="Cari Data..">
									<button type="submit" name="bcari" class="btn btn-primary">Cari</button>
									<br>
									<br>
									<a href="input.php" class="btn btn-success">Tambah Baru</a>
								</div>
							</form>
							<br>
						</div>
			    		<table class="table table-bordered table-striped">
			    			<thead>
			    				<tr>
				    				<th>No.</th>
				    				<th>Kode Masakan</th>
				    				<th>Nama Masakan</th>
				    				<th>Kategori</th>
				    				<th>Gambar</th>
				    				<th>Keterangan</th>
				    				<th>Action</th>
			    				</tr>
			    			</thead>
			    			<tbody>
			    				<?php
			    				//proses menampilkan, pencarian, dan pagination
			    					
			    					$batas = 4; //batas data yang ditampilkan
			    					$start = 0; //start data yang ditampilkan berdasarkan array
			    					$no = 1; //untuk mendefinisikan nomor baris data
			    					$page = isset($_GET['hal']) ? (int)($_GET['hal']) : 1;//sama dengan pengkodisian (if)

			    					if($page > 1){ //jika halaman lebih dari 1 halaman atau bukan pada halaman 1
			    						$start = ($page * $batas) - $batas; //menghitung mulai dari array/baris ke berapa data yg akan ditampilkan
			    					}else{
			    						$start = 0; //jika pada halaman 1 maka data yg ditampilkan dimulai pada array 0
			    					}

			    					//proses membuat pencarian
			    					$cari = $_POST['cari'];//membaca inputan pada box pencarian dan menampung pada variabel
			    					if($cari != ''){ //jika tidak ada data yang dicari maka tampilkan semua data yg ada

			    						$query = "SELECT * FROM tbmasakan INNER JOIN tbkategori ON tbmasakan.id_kategori = tbkategori.id_kategori WHERE nama LIKE '%".$cari."%' OR kategori_masakan LIKE '%".$cari."%' ORDER BY nama LIMIT $start, $batas";
			    					}else{ //jika ada data yg dicari maka hanya menampilkan data yg dicari

			    						$query = "SELECT * FROM tbmasakan INNER JOIN tbkategori ON tbmasakan.id_kategori = tbkategori.id_kategori ORDER BY nama LIMIT $start, $batas";

			    					}
			    					
			    					$tampil = mysqli_query ($conn, $query) or die (mysqli_error($conn));
			    					//melakukan looping untuk menampilkan data dengan array
			    					while($data = mysqli_fetch_array($tampil)): //mengubah query menjadi array untuk ditampilkan
			    				?>
			    				<tr>
			    					<td><?=$no++;?></td>
			    					<td><?=$data['kode']?></td>
			    					<td><?=$data['nama']?></td>
			    					<td><?=$data['kategori_masakan']?></td>
			    					<td><img src="gambar/<?php echo $data['gambar']; ?>" style="width: 150px"/></td>
			    					<td><?=$data['keterangan']?></td>
			    					<td>

			    						<a href="edit.php?hal=edit&id=<?=$data['id_masakan']?>"  class="btn btn-warning">Edit</a>

			    						<a href="proseshapus.php?hal=hapus&id=<?=$data['id_masakan']?>" onclick="return confirm('Apakah yakin ingin menghapus?')" class="btn btn-danger">Hapus</a>
			    					</td>
			    				</tr>
			    			<?php endwhile; ?>
			    			</tbody>
			    		</table>

			    		<?php
			    			//membuat tombol pagination
			    			$data = mysqli_query($conn, "SELECT * FROM tbmasakan"); //memanggil data pada db
			    			$total = mysqli_num_rows($data);//menghitung jumlah array/baris data pada tabel
			    			$pages = ceil ($total / $batas); //ceil berfungsi untuk membulatkan pembagian

			    			for($i = 1; $i<=$pages; $i++){
			    				echo "<a href='?hal=$i' class='btn btn-warning'>$i</a>";
			    				
			    			}
			    			
			    		?>

			    		
			  		</div>
			  		
				</div>
				<!--Akhir Tabel-->


		<br>
		<a href="keluar.php" class="btn btn-primary">Keluar</a>
		</div>
	

	<script type="text/javascript src="js/bootstrap.min.js></script>
</body>
</html>
<?php
	}
?>