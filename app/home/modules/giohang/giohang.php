<!-- Breadcrumb Section Begin -->
<!-- <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Breadcrumb Section End -->
<?php
session_start();
?>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION["username"])) {
                                $username = $_SESSION["username"];
                                $sql = "SELECT giohang.*, sanpham.*
                                FROM giohang
                                JOIN sanpham ON giohang.id_sanPham = sanpham.id_sanPham
                                WHERE giohang.userName = '$username';
                                ";
                                include "../models/pdo.php";
                                $data = pdo_query($sql);
                                foreach ($data as $rows) {
                                    extract($rows);
                                    echo '
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="app/admin/uploads/' . $img_path . '" style="height: 200px;width: auto;">
                                            <h5>' . $tenSanPham . '</h5>
                                        </td>
                                        <td class="shoping__cart__price" style="color: red;">' . number_format($giaSanPham, 0, ',', '.') . ' Vnđ</td>                                            
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="' . $soLuong . '">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">' . $soLuong * $giaSanPham . '</td>                                                                              
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close"></span>
                                        </td>
                                    </tr>
                                    ';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Upadate Cart</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>Discount Codes</h5>
                        <form action="#">
                            <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">APPLY COUPON</button>
                        </form>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Thanh toán</h5>
                    <ul>
                        <?php
                        // if (isset($_SESSION["username"])) {
                        //     $id = $_SESSION["username"];
                        //     $sql = "SELECT SUM(sanpham.giaSanPham) AS sumCart
                        //     FROM giohang
                        //     JOIN sanpham ON giohang.id_sanpham = sanpham.id_sanpham
                        //     WHERE `giohang.userName` = '$id';";
                        //     $data = pdo_query($sql);
                        //     echo '<li>Tổng <span>' . $data["sumCart"] . '</span></li>';
                        // }
                        ?>
                        <li>Tổng <span></span></li>
                    </ul>
                    <a href="#" class="primary-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->