<?php
	session_start();
	if(isset($_SESSION['login'])) {
		session_start();
		include 'koneksi.php';
		
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		$tempat = isset($_POST['tempat']) ? $_POST['tempat'] : '';
		$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
		$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
		$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
		
		$input = date("Y-m-d H:i:s", time());
		$user = $_SESSION['user_id'];
		
		if (!empty($nama) && !empty($tempat) && !empty($tanggal) && !empty($alamat) && !empty($jenis)){
			mysqli_query($connect,"UPDATE santri SET nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin='$jenis', user_id='$user', tanggal_input='$input' WHERE id='$id'");
			header("location:../santri.php");
		} else {
			echo "<a href='../santri_edit.php'>data</a>nya kurang lengkab boz...!";
		}
	} else {
		echo "<a href='../index.php'>Login</a> boz...!";
	}
?>