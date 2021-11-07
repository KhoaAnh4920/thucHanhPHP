<?php 
include_once './config.php';//
include_once './pdo.php';
//ktra dang nhap. Neu chua -> login.html 
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['admin']))
{
    header('location:login.php');
    exit;
}

/* 
1./ ket noi (pdo)
2./ viet sql 
3./ thuc thi cau lenh prepare cua ket noi. return Statement 
4./ Thuc thi cau lenh execute cua Statement (truyen vao mang tham so)
5./ Xu ly ket qua: 
	- insert, delete, update: thong bao so dong bi tac dong rowCount()
	- select: lay cac dong trong db, duyet qua

*/
$sql="select sach.*, nhaxb.tennxb, loai.tenloai from sach, nhaxb, loai 
where sach.manxb=nhaxb.manxb and sach.maloai=loai.maloai ";
//$sql='select * from v_sach';
$objStatement = $objPDO->prepare($sql);
$objStatement->execute();
$n = $objStatement->rowCount();

$data = $objStatement->fetchAll(PDO::FETCH_OBJ);
//$data = $objStatement->fetchAll(PDO::FETCH_ASSOC);
//ECHO '<PRE>';print_r($data);

?>


<!DOCTYPE html>
<head>
<title>Liệt kê danh mục sản phẩm</title>
<?php
include('./pages/head.php')
?>
</head>
<body>
<section id="container">
<!--header start-->
<?php
include('./pages/header.php')
?>
<!--header end-->
<!--sidebar start-->
<aside>
    <!--sidebar-->
    <?php
        include('./pages/sidebar.php')
    ?>
    <!--end sidebar-->
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="padding-top:8px">
      <h3>Danh muc sach co <?php echo $n ?> cuon</h3>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Ma sach</th>
					  <th>Ten sach</th>
					  <th>Nha XB</th>
					  <th>Loai sach</th>
					  <th>#</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
        <?php 
				foreach($data as $k=>$row)
				{
					?> 
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td><?= $row->masach ?></td>
            <td><?= $row->tensach ?></td>
            <td><?= $row->tennxb ?></td>
            <td><?= $row->tenloai ?></td>
            
            <td>
              <a href="" class="active" ui-toggle-class=""><i class="fa fa-check text-success text-active"></i></a>
              <a href="sach_delete.php?masach=<?=$row->masach ?>"><i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          <?php
				}
				?>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
<?php
    include('./pages/footer.php')
?>
  <!-- / footer -->
</section>

<!--main content end-->
</section>

<!--start script-->
<?php
    include('./pages/script.php')
?>
<!--end script-->

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
