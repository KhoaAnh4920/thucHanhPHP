<?php
if(!isset($_SESSION))
	session_start();
$u = isset($_POST['username'])?$_POST['username']:'';
$p = isset($_POST['Password'])?$_POST['Password']:'';

if($u == 'admin' && $p == '123456'){
	$_SESSION['admin'] = $u;
	header('location:index.php');
	exit;
}
else{
	header('location:login.php');
	exit;
}


?>