<?php

	include 'koneksi.php';
	
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pass = isset($_POST['password']) ? md5($_POST['password']) : '';
	
	if (!empty($email) && !empty($pass)){
		$sql = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND password='$pass'");
		$result = mysqli_num_rows($sql);
		if ($result){
			$row = mysqli_fetch_array($sql);
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['user_id'] = $row['id'];
			
			header("location:../home.php");
		} else {
			echo "Email Dan Password Salah. <a href='../index.php'>Back?</a>";
		}
	} else {
		echo "Please <a href='../index.php'>Login</a> First";
	}
	
?>