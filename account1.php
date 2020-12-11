<?php 
session_start();
$con = mysqli_connect('127.0.0.1', 'root', '', '39urok');
$query = mysqli_query($con, "SELECT * FROM users WHERE phone={$_POST['phone']} AND password={$_POST['password']}");
$stroka = $query->fetch_assoc();
$_SESSION['id'] = $stroka['id'];
$num = mysqli_num_rows($query);
if($num>0){
	header("Location: account.php");
} else{
	header("Location: index.php?lol=Nein");
}
?>