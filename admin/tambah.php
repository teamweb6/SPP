<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "spp");

//ambil data dari tabel siswa
$result = mysqli_query($conn, "SELECT * FROM siswa");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="judul">	
	</div>
	
	<br/>
 
	<a href="data_siswa.php">Lihat Semua Data</a>
 
	<br/>
	<h3>Input data baru</h3>
	<form action="tambah.php" method="post">		
		<table>
			<tr>
				<td>Nisn</td>
				<td><input type="text" name="nisn"></td>					
			</tr>	
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama"></td>					
			</tr>	
			<tr>
				<td>Kelas</td>
				<td><input type="text" name="kelas"></td>					
			</tr>	
	<tr>
				<td>Jurusan</td>
				<td><input type="text" name="jurusan"></td>					
			</tr>	
	<tr>
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>					
			</tr>	
			<tr>
				<td></td>



				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
</body>
</html>