<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_SESSION["username"];
    $name = $_POST["name"];
    $location = $_POST["location"];
    $phone = $_POST["phone"];
    $sum = $_POST["sum"];
    $push_order = "INSERT INTO `donhang`(`userName`, `ngayDatHang`, `tongGiaDonHang`, `pttt`, `tenNguoiNhan`, `diaChi`, `SDT`) 
        VALUES ('$user', NOW(), '$sum', 'TTKNH', '$name', '$location', '$phone');
    ";
    include "../models/pdo.php";
    pdo_execute($push_order);

    $get_orderID = "SELECT MAX(id_donHang) AS orderID FROM donhang";
    $data = pdo_query_one($get_orderID);
    extract($data);
    if (isset($_POST["prodID"])) {
        $prodID = $_POST["prodID"];
        $_getProd = "SELECT * FROM sanpham WHERE id_sanPham = '$prodID'";
        $result = pdo_query_one($_getProd);
        extract($result);
        $push_ctdh = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham) VALUES ('$orderID', '1', '$prodID')";
        pdo_execute($push_ctdh);
    } else {
        $get_cart = "SELECT * FROM giohang WHERE userName = '$user'";
        $result = pdo_query($get_cart);
        foreach ($result as $rows) {
            extract($rows);
            $prodID = $rows["id_sanPham"];
            $soluong = $rows["soluong"];
            $push_ctdh = "INSERT INTO chitietdonhang(id_donHang, soLuong, id_sanPham) VALUES ('$orderID', '$soluong', '$prodID')";
            pdo_execute($push_ctdh);
            $del_Cart = "DELETE FROM giohang WHERE userName = '$user'";
            pdo_execute($del_Cart);
        }
    }
    header('Content-Type: application/json');
    echo json_encode(['orderID' => $orderID]);
} else {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
