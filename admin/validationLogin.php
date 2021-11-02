<?php
if(!isset($_SESSION))
	session_start();
$email = isset($_POST['Email'])?$_POST['Email']:'';
$p = isset($_POST['Password'])?$_POST['Password']:'';

if($email == 'admin@gmail.com' && $p == '123456'){
	$_SESSION['admin'] = $email;
	header('location:index.php');
	exit;
}
else{
	header('location:login.php');
	exit;
}


?>