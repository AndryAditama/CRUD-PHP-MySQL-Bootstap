<?php
			include 'koneksi.php';
				if(isset($_POST['bupdate'])){ //jika tombol update di klik maka akan melakukan pembacaan data yang diinput pad form dan menyimpan pada variabel masing-masing.

					$id = $_POST['id'];
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
					
					
					//proses update data berdasarkan id
					$edit = mysqli_query($conn, "UPDATE tbmasakan SET id_kategori = '".$tkategori."',
																		kode = '".$tkode."',
																		nama = '".$tnama."',
																		keterangan = '".$tketerangan."',
																		gambar = '".$tgambar."'
																		WHERE id_masakan = '".$id."'

																	");

					if($edit){ // Cek jika proses simpan ke database sukses atau tidak
					    // Jika Sukses, Lakukan :
						echo '<script>
						window.onload = function(){
							 alert("edit data berhasil");
							 location.href = "index.php"
						}
						</script>';
					  }else{
					    // Jika Gagal, Lakukan :
					    echo '<script>
						window.onload = function(){
							 alert("edit data gagal");
							 location.href = "edit.php"
						}
						</script>';
					  }
				}
			?>