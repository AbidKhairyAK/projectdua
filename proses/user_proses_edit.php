<?php
	session_start();
	if(isset($_SESSION['login'])) {
		session_start();
		include 'koneksi.php';
		
		$id = isset($_POST['id']) ? $_POST['id'] : '';
		$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pass = isset($_POST['pass']) ? md5($_POST['pass']) : '';
		
		if (!empty($nama) && !empty($email) && !empty($pass)){
			mysqli_query($connect,"UPDATE user SET nama='$nama', email='$email', password='$pass' WHERE id='$id'");
			header("location:../user.php");
		} else if (!empty($nama) && !empty($email)){
			mysqli_query($connect,"UPDATE user SET nama='$nama', email='$email' WHERE id='$id'");
			header("location:../user.php");
		} else {
			echo "<a href='../user_edit.php'>data</a>nya kurang lengkab boz...!";
		}
	} else {
		echo "<a href='../index.php'>Login</a> boz...!";
	}
?>