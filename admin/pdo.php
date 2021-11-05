<?php 
include_once './config.php';
$objPDO= new PDO('mysql:host=' . HOST.';dbname='.DB  , USER   , PW   );
if (!$objPDO) { echo 'Loi DB';exit;}

$objPDO->query('set names utf8');