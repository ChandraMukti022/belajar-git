<?php 
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$nis			= @$_POST['nis'];				
		$nama       	= @$_POST['nama_lengkap'];
		$kelas			= @$_POST['id_kelas'];
		$jurusan        = @$_POST['jurusan'];
		
	    $sql ="INSERT INTO t_siswa(nis,nama,kelas,jurusan) VALUES
		('$nis','$nama','$kelas','$jurusan')";

		$mysqli->query($sql) or die ($mysqli->error);


		header('location: index.php');
	
		}
	}
	$success = flash('success');
	$error   = flash('error');


?>