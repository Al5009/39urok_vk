<?php 
$folder = 'img/';
$file_upload = $folder . basename($_FILES['photo']['name']);
move_uploaded_file($_FILES['photo']['tmp_name'], $file_upload );

$connect = mysqli_connect("127.0.0.1", "root", "", "39urok");
$query1 = mysqli_query($connect, "UPDATE users SET avatar='{$file_upload}' WHERE id='{$_POST['id']}'");
header("Location: account.php");
?>