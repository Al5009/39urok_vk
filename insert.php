<?php
	session_start();
	$folder = 'img/';
	$file_upload = $folder . basename($_FILES['photo']['name']);
	move_uploaded_file($_FILES['photo']['tmp_name'], $file_upload );

	$connect = mysqli_connect("127.0.0.1", "root", "", "39urok");
	$ins = "INSERT INTO posts (text, img, id_user) VALUES ('{$_POST['text']}', '{$file_upload}', '{$_SESSION['id']}')";
	mysqli_query($connect, $ins);
	header('Location: account.php');
?>