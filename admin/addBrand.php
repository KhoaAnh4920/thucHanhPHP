<?php 
//ktra dang nhap. Neu chua -> login.html 
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['admin']))
{
    header('location:login.php');
    exit;
}

?>


<!DOCTYPE html>
<head>
<title>Thêm thương hiệu sản phẩm</title>
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
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="tenDanhMuc">Tên danh mục</label>
                                    <input type="email" class="form-control" name="category_product_name" id="category_product_name" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="moTaDanhMuc">Mô tả danh mục</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" name="category_product_desc" id="category_product_desc" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="hienThi">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="category_product_status">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
        
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            
        </div>


        

        




       


        <!-- page end-->
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
