<?php
//bill
function showBill($sql)
{
    $result = pdo_query_one($sql);
    extract($result);
    echo '
        <div class="checkout__order__products">Mã đơn hàng: <span style="color: green;">' . $id_donHang . '</span></div>
        <hr>
        <div class="checkout__order__products">Tên người nhận: <span <span style="color: green;">' . $tenNguoiNhan . '</span></div>
        <hr>
        <div class="checkout__order__products">Ngày đặt hàng: <span <span style="color: green;">' . $ngayDatHang . '</span></div>
        <hr>
        <div class="checkout__order__products">Địa chỉ: <span <span style="color: green;">' . $diaChi . '</span></div>
        <hr>
        <div class="checkout__order__products">Số điện thoại: <span <span style="color: green;">' . $SDT . '</span></div>
        <hr>
        <div class="checkout__order__products">Phương thức thanh toán: <span <span style="color: green;">' . $pttt . '</span></div>
        <hr>
    ';
}

function showBillProd($sql)
{
    $result = pdo_query($sql);
    foreach ($result as $key) {
        extract($key);
        echo '
            <div class="anh" style="display: flex;">
                <img src="app/admin/uploads/' . $img_path . '" width="80px" height="80px" style=" margin-right: 20px;"><br>
                <div class="thongtin" style="font-size: small; color: gray; ">
                    <label>Sản phẩm: ' . $tenSanPham . '</label><br>
                    <label>Giá: ' . number_format($giaSanPham, 0, ',', '.') . '</label><br>
                    <label>Số lượng: ' . $soLuong . '</label><br>
                    <label>Mô tả: ' . $moTaSanPham . '</label>
                </div>
            </div>
            <hr>
        ';
    }
}

//trang sản phẩm
function showUuDai($sql)
{
    $data = pdo_query($sql);
    foreach ($data as $key) {
        extract($key);
        echo '
            <div class="col-lg-4">
                <div class="product__discount__item">
                    <div class="product__discount__item__pic set-bg" data-setbg="app/admin/uploads/' . $img_path . '">
                        <div class="product__discount__percent">-20%</div>
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__discount__item__text">
                        <span>' . $id_danhmuc . '</span>
                        <h5><a href="#">' . $tenSanPham . '</a></h5>
                        <div class="product__item__price">$30.00 <span>' . $giaSanPham . '</span></div>
                    </div>
                </div>
            </div>
        ';
    }
}

function showSanPham($sql)
{
    $data = pdo_query($sql);
    foreach ($data as $rows) {
        extract($rows);
        echo ' 
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="/duan1/app/admin/uploads/' . $img_path . '">
                        <ul class="product__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="index.php?act=addToCart&id_sanPham=' . $id_sanPham . '"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a style="font-weight: bold; href="#">' . $tenSanPham . '</a></h6>
                        <h5 ><span style="color: red !important;">' . number_format($giaSanPham, 0, ',', '.') . ' ₫</span></h5>
                    </div>
                </div>
            </div>       
        ';
    }
}


// trang đơn mua
function showDonHang($sql)
{
    $result = pdo_query($sql);
    if (empty($result)) {
        echo "Trống !";
    } else {
        foreach ($result as $rows) {
            extract($rows);
            $state = "";
            if ($pttt == "Vnpay") {
                $state = "Đã thanh toán";
            } else {
                $state = "Chưa thanh toán";
            }
            echo '
                <div class="checkout__order__products">
                    <div class="anh" style="display: flex;">
                        <img src="app/home/public/img/icon/box-open.png" width="80px" height="80px" style=" margin-right: 20px;"><br>
                        <div class="thongtin" style="font-size: smaller; color: gray; ">
                            <label class="text-primary">Mã đơn: ' . $id_donHang . '</label><br>
                            <label class="text-primary">Ngày đặt hàng: ' . $ngayDatHang . '</label><br>
                            <label class="text-primary">Trạng thái đơn hàng<span style="color: red;"> :' . $trangThai . '</span></label> <br>
                            <label class="text-primary">Đã thanh toán: ' . $state . '</label><br>
                        </div>
                    </div>
                </div>
                <div class="checkout__order__total" style="color: whitesmoke;">. <span class="bg-yellow">Tổng: ' . number_format((int)$tongGiaDonHang, 0, ',', '.') . ' đ</span></div>
            ';
            if ($trangThai == 'success' || $trangThai == 'canceled') {
                echo '<button type="button" class="site-btn" style="width:170px;">Mua lại</button>';
            }
            if ($trangThai == 'shipped') {
                echo '<button type="button" onclick="confirmOrder(' . $id_donHang . ')" class="site-btn" style="width: 170px; background-color: orangered !important;">Đã nhận hàng</button>';
            }
            echo '
                <button type="button" onclick="goToBill(' . $id_donHang . ')" class="site-btn" style="width:170px;">Chi tiết</button>
                <hr>
            ';
        }
    }
}

function getCartSum($orderID)
{
    $sql = "SELECT tongGiaDonHang FROM donhang WHERE id_donHang = '$orderID'";
    $data = pdo_query_one($sql);
    $x = (int)$data["tongGiaDonHang"];
    if ($x != null) {
        return number_format($x, 0, ',', '.') . ' đ';
    } else {
        return '0 đ';
    }
}

function getOrderID()
{
    $get_orderID = "SELECT MAX(id_donHang) AS orderID FROM donhang";
    $data = pdo_query_one($get_orderID);
    return $data["orderID"];
}

function get_Del_Cart($user, $orderID)
{
    $get_cart = "SELECT * FROM giohang WHERE userName = '$user'";
    $result = pdo_query($get_cart);
    foreach ($result as $rows) {
        extract($rows);
        $prodID = $rows["id_sanPham"];
        $soluong = $rows["soluong"];
        $query = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham) VALUES ('$orderID', '$soluong', '$prodID')";
        pdo_execute($query);
    }
    $del_Cart = "DELETE FROM giohang WHERE userName = '$user'";
    pdo_execute($del_Cart);
}
