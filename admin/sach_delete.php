<?php 
$masach = isset($_GET['masach'])?$_GET['masach']:'';
include './pdo.php';
if ($masach !='')
{
    $sql="delete from sach where masach =?";
    $a =[$masach];
    $stm = $objPDO->prepare($sql);
    $stm->execute($a);
}

header('location:allCategory.php');