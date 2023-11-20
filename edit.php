<?php
	include 'koneksi.php';

	if (isset($_GET['hal'])) { //jika tombol diklik
		if($_GET['hal'] == "edit"){ //jika tombol yg diklik adalah tombol edit
			$id = $_GET['id']; //menangkap dan menyimpan id data yang akan diedit

			$tampil = mysqli_query($conn, "SELECT * FROM tbmasakan INNER JOIN tbkategori ON tbmasakan.id_kategori = tbkategori.id_kategori WHERE id_masakan = '$id' ");

			$r = mysqli_fetch_array($tampil);
			if($r){
				$id_masakan = $r['id_masakan'];
				$tkode = $r['kode'];
				$tnama = $r['nama'];
				$tkategori = $r['kategori_masakan'];
				$tketerangan = $r['keterangan'];
				$tgambar = $r['gambar'];				
				}

			}
		
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<!-- form input -->
		<div class="card mt-3">
	  		<div class="card-header bg-primary text-white">
	    	Edit Menu
	  		</div>
		  		<div class="card-body">
		    		<form method="post" action="prosesedit.php" enctype="multipart/form-data">
		    			<div class="form-group">
		    					<label>Kode Masakan</label>
			    				<br>
			    				<input type="text" name="tkode" value="<?php echo ($tkode) ?>" class="form-control" placeholder="Input Kode Masakan!" required>
		    			</div>

		    			<div class="form-group">
		    					<label>Nama Masakan</label>
			    				<br>
			    				<input type="text" name="tnama" value="<?php echo ($tnama) ?>" class="form-control" placeholder="Input Nama Masakan!" required>
		    			</div>
		    			
		    			<div class="form-group">
		    					<label>Kategori Masakan</label>
		    					<br>
			    				<select class="form-control" name="tkategori">
			    					<option></option>
			    					<?php
			    					//menampilkan data pada tabel kategori
			    						include 'koneksi.php';
			    						$query = "SELECT * FROM tbkategori";
			    						$sql = mysqli_query($conn, $query);
			    						while ($data = mysqli_fetch_array($sql)){
			    							echo'<option value= "'.$data['id_kategori'].'"> 
			    							'.$data["kategori_masakan"].'  							
			    							</option>';
			    						}
			    					?>
			    				</select>
		    			</div>

		    			<div class="form-group">
		    					<label>Keterangan</label>
			    				<br>
			    				<textarea name="tketerangan"  class="form-control" placeholder="Tambah keterangan bila perlu!"><?php echo ($tketerangan)?></textarea>
		    			</div>

		    			<div>
		    				<label>
		    					Tambahkan Gambar
		    					<br>
		    					<img src="gambar/<?php echo($tgambar)?>" width="100px"/>
		    					<input type="file" name="tgambar">
		    				</label>		    	
		    			</div>
		    			
		    			<input type="hidden" name="id" value="<?php echo($id_masakan)?>"/>
		    			<button type="submit" class="btn btn-success" name="bupdate">Update</button>
		    			<a href="index.php" class="btn btn-primary">Kembali</a>


		    		</form>
		  		</div>
			</div>
			</div>

			<!--Akhir Form-->
			<script type="text/javascript src="js/bootstrap.min.js></script>
</body>
</html>