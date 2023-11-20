<?php
//proses hapus
		include 'koneksi.php';
		if (isset($_GET['hal'])){ //jika tombol diklik
			if ($_GET['hal'] == "hapus"){ //jika tombol yang diklik adalah tombol hapus
				
				//query hapus untuk menghapus data berdasarkan id
				$hapus = mysqli_query($conn, "DELETE FROM tbmasakan WHERE id_masakan = '$_GET[id]' ");
				//cek hapus
				if($hapus){
					echo "<script>
						alert('Hapus Data Sukses!!');
						document.location='index.php';
					</script>";
				}
			}
		}
?>