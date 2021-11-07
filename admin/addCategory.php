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

?>


<!DOCTYPE html>

<head>
    <title>Thêm danh mục sản phẩm</title>
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
                                    Thêm danh mục sách
                                </header>
                                <div class="panel-body">
                                    <div class="position-center">
                                        <form action="store.php" role="form" method="post"
                                            enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="tenDanhMuc">Mã sách</label>
                                                <input type="text" class="form-control" name="maSach"
                                                    id="category_product_name" placeholder="Tên danh mục">
                                            </div>
                                            <div class="form-group">
                                                <label for="tenDanhMuc">Tên sách</label>
                                                <input type="text" class="form-control" name="tenSach"
                                                    id="category_product_name" placeholder="Tên danh mục">
                                            </div>
                                            <div class="form-group">
                                                <label for="tenDanhMuc">Giá</label>
                                                <input type="number" name="gia" class="form-control" name="giaSach"
                                                    id="category_book_price" placeholder="Giá"> <br>                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="tenDanhMuc">Hình</label>
                                                <input type="file" class="form-control" name="hinhSach"
                                                    id="category_book_images" name="hinh"> <br>
                                            </div>
                                            <div class="form-group">
                                                <label for="moTaDanhMuc">Mô tả sách</label>
                                                <textarea style="resize: none;" rows="5" class="form-control"
                                                    name="moTaSach" id="category_product_desc"
                                                    placeholder="Mô tả danh mục"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="hienThi">Nhà xuất bản</label>
                                                <select class="form-control input-sm m-bot15"
                                                    name="tenNhaXuatBan">
                                                    // <?php 
                                   //$sql="select sach.*, nhaxb.tennxb, loai.tenloai from sach, nhaxb, loai where sach.manxb=nhaxb.manxb and sach.maloai=loai.maloai ";
                                   $sql='select * from nhaxb';
                                   $objStatement = $objPDO->prepare($sql);
                                   $objStatement->execute();
                                   
                                   $data = $objStatement->fetchAll(PDO::FETCH_OBJ);
                                    foreach($data as $k=>$row)
				                    {
					                ?>
                                                    <option value="<?= $row->tennxb ?>"><?= $row->tennxb ?></option>
                                                    <?php
				                    }
				                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="hienThi">Loại</label>
                                                <select class="form-control input-sm m-bot15"
                                                    name="tenLoai">
                                                    // <?php 
                                   //$sql="select sach.*, nhaxb.tennxb, loai.tenloai from sach, nhaxb, loai where sach.manxb=nhaxb.manxb and sach.maloai=loai.maloai ";
                                   $sql='select * from loai';
                                   $objStatement = $objPDO->prepare($sql);
                                   $objStatement->execute();
                                   
                                   $data = $objStatement->fetchAll(PDO::FETCH_OBJ);
                                    foreach($data as $k=>$row)
				                    {
					                ?>
                                                    <option value="<?= $row->tenloai ?>"><?= $row->tenloai ?></option>
                                                    <?php
				                    }
				                    ?>
                                                </select>
                                            </div>

                                            <button type="submit" name="themSach" class="btn btn-info">Thêm
                                                sách</button>
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