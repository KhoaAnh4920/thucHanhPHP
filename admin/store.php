<?php 
include './pdo.php';
$m = isset($_POST['maSach'])?$_POST['maSach']:'';
$ts = isset($_POST['tenSach'])?$_POST['tenSach']:'';
$gia = isset($_POST['gia'])?$_POST['gia']:'';
$mota = isset($_POST['moTaSach'])?$_POST['moTaSach']:'';
$t = isset($_POST['tenNhaXuatBan'])?$_POST['tenNhaXuatBan']:'';
$l = isset($_POST['tenLoai'])?$_POST['tenLoai']:'';

$h ='';
if ($m==''){ header('location:index.php'); exit;}
if (isset($_FILES['hinhSach']))
{
    if ($_FILES['hinhSach']['error']==0) //ok
    {
        $h = $_FILES['hinhSach']['name'];
        move_uploaded_file($_FILES['hinhSach']['tmp_name'], "images/book/$h");
    }
}


$sql="select nhaxb.manxb, loai.maloai from nhaxb, loai WHERE nhaxb.tennxb='$t' AND loai.tenloai='$l'";

$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute();//ket qua truy van
$data = $objStatement->fetchAll(PDO::FETCH_OBJ);
//var_dump($data);


foreach($data as $k=>$row)
{
    $maxb = $row->manxb; // lấy mã nhà xuất bản
    $maloai = $row->maloai; // lấy mã loại sách
}

// Insert //
$sql="insert into sach(masach, tensach, mota, gia, hinh, manxb, maloai ) values(?, ?, ?, ?, ?, ?, ?) ";
$a =[$m, $ts, $mota, $gia, $h, $maxb, $maloai];
$objStatement= $objPDO->prepare($sql);//return B
$objStatement->execute($a);//ket qua truy van
header('location:index.php');

