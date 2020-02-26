<?php 
include 'lib/library.php';
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nis			= @$_POST['nis'];				
		$nama_lengkap 	= @$_POST['nama_lengkap'];
		$jenis_kelamin	= @$_POST['jenis_kelamin'];
		$kelas			= @$_POST['id_kelas'];
		$alamat         = @$_POST['alamat'];
	    $golongan_darah = @$_POST['golongan_darah'];
		$nama_ibukandung= @$_POST['nama_ibukandung'];
		$foto			= @$_FILES['foto'];
		$file = "";
		
			if (empty($nis)) { // Jika NIS Kosong 
			 flash('error','Mohon masukan NIS dengan benar');

			} else if (empty($nama_lengkap)) { // Jika Nama Lengkap Kosong 
					flash('error','Mohon masukan Nama Lengkap dengan benar');
		    } else {
				// Pada Baris ini, Validasi sudah dilakukan untuk semua field
			

		
		if (!empty($foto) AND $foto['error'] == 0) {
			$path = './media/images/';
			$upload = move_uploaded_file($foto['tmp_name'], $path . $foto['name']);

			if (!$upload){
				flash('error',"Upload file gagal");
				header('location:index.php');
			}
			$file = $foto['name'];
		}

		$sql ="INSERT INTO siswa(nis,nama_lengkap,jenis_kelamin,id_kelas,alamat,golongan_darah,nama_ibukandung,file) VALUES
		('$nis','$nama_lengkap','$jenis_kelamin','$kelas','$alamat','$golongan_darah','$nama_ibukandung','$file')";

		$mysqli->query($sql) or die ($mysqli->error);


		header('location: index.php');
	
		}
	}
	$success = flash('success');
	$error   = flash('error');
		
// Ambil data kelas
$sql = "SELECT * FROM t_kelas";
$dataKelas = $mysqli->query($sql) or die($mysqli->error);
include 'views/v_tambah.php';

?>