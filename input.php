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
	    	Input Menu Baru
	  		</div>
		  		<div class="card-body">
		    		<form method="post" action="prosesinput.php" enctype="multipart/form-data">
		    			<div class="form-group">
		    					<label>Kode Masakan</label>
			    				<br>
			    				<input type="text" name="tkode" class="form-control" placeholder="Input Kode Masakan!" required>
		    			</div>

		    			<div class="form-group">
		    					<label>Nama Masakan</label>
			    				<br>
			    				<input type="text" name="tnama" class="form-control" placeholder="Input Nama Masakan!" required>
		    			</div>
		    			
		    			<div class="form-group">
		    					<label>Kategori Masakan</label>
		    					<br>
			    				<select class="form-control" name="tkategori" required>
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
			    				<textarea name="tketerangan" class="form-control" placeholder="Tambah keterangan bila perlu!"></textarea>
		    			</div>

		    			<div>
		    				<label>
		    					Tambahkan Gambar
		    					<br>
		    					<input type="file" name="tgambar">
		    				</label>		    	
		    			</div>
		    			

		    			<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
		    			<button type="reset" class="btn btn-danger" name="breset">Reset</button>
		    			<a href="index.php" class="btn btn-primary">Kembali</a>


		    		</form>
		  		</div>
			</div>
			</div>
			<!--Akhir Form-->
			<script type="text/javascript src="js/bootstrap.min.js></script>
</body>
</html>