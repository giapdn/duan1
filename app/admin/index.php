<?php
include "models/pdo.php";
include "views/default/header.php";
if (isset($_GET["act"])) {
    $action = $_GET["act"];
    switch ($action) {
        case 'home':
            echo "<script>window.location.href = '/duan1/index.php';</script>";
            break;
        case 'listDanhMuc':
            include "views/category-list.php";
            break;
        case 'ctgryAddForm':
            include "controllers/category-add.php";
        case 'themdanhmuc':
            if (isset($_POST["data-send"])) {
                $categoryName = $_POST["categoryName"];
                $sql = "INSERT INTO `danhmuc`(`tendanhmuc`) VALUES ('$categoryName')";
                try {
                    if ($categoryName == "") {
                        echo "<script>alert('Dữ liệu không được để trống !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=ctgryAddForm';</script>";
                    } else {
                        pdo_execute($sql);
                        echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                        echo "<script>window.location.href='../admin/index.php?act=ctgryAddForm';</script>";
                    }
                } catch (\mysqli_sql_exception $th) {
                    echo "OOP !: " . $th->getMessage();
                }
            }
            break;
        case 'categoryDel':
            if (isset($_POST["categoryID"])) {
                $category_id = $_POST["categoryID"];
                $sql = "DELETE FROM `danhmuc` WHERE `id_danhmuc` = '$category_id'";
                pdo_execute($sql);
                echo "<script>alert('Xoá thành công !')</script>";
                echo "<script>window.location.href='../admin/index.php?act=listDanhMuc';</script>";
            }
            break;
        case 'categoryChange':
            include "controllers/category-change.php";
            break;
        case 'productAddForm':
            include "controllers/prodAdd.php";
            break;
        case 'prodList':
            include "views/product-list.php";
            break;
        case 'addSp':
            echo 1;
            // $prodID = $_POST["prodID"];
            $prodName = $_POST["prodName"];
            $prodPrice = $_POST["prodPrice"];
            $prodDesc = $_POST["prodDesc"];
            $prodImg = $_FILES["prodImg"]["name"];
            $prodCategory = $_POST["productCategory"];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["prodImg"]["name"]);
            $sql = "INSERT INTO `sanpham`(`tenSanPham`, `giaSanPham`, `moTaSanPham`, `img_path`, `id_danhmuc`, `dateAdd`)
            VALUES ('$prodName','$prodPrice','$prodDesc','$prodImg','$prodCategory', NOW())";
            try {
                pdo_execute($sql);
                echo "<script>alert('Nạp dữ liệu thành công !')</script>";
                echo "<script>window.location.href='index.php?act=productList';</script>";
            } catch (\PDOException $th) {
                echo $th->getMessage();
            }          
            break;
        case 'prodDel':
            if (isset($_POST["prod-delete-btn"])) {
                $prodID = $_GET["id"];
                $sql = "DELETE FROM `sanpham` WHERE `id_sanPham` = '$prodID'";
                try {
                    pdo_execute($sql);
                    echo "<script>alert('Xoá thành công !')</script>";
                    echo "<script>window.location.href='../admin/index.php?act=prodList';</script>";
                } catch (\PDOException $th) {
                    die("Something went wrong !");
                }
            }
            break;
        case 'prodChange':
            include "controllers/prodChange.php";
            break;
        case 'prodChangeProcess':
            $productCode = $_POST["productCode"];
            $productName = $_POST["productName"];
            $productPrice = $_POST["productPrice"];
            $productDescription = $_POST["productDescription"];
            $productImage = $_FILES["productImage"]["name"];
            $productCategory = $_POST["productCategory"];
            $sql = "UPDATE `products` SET `prodName`='$productName',`prodPrice`='$productPrice',`prodDescription`='$productDescription',
                `prodImg`='$productImage',`category_id`='$productCategory' WHERE `prodID`='$productCode'";

            break;
        case 'userList':
            include "views/userList.php";
            break;
        case 'commentList':
            include "views/commentList.php";
            break;

        case 'commentDel':
            if (isset($_GET["id_binhLuan"])) {
                $id = $_GET["id_binhLuan"];
                $sql = "DELETE FROM `binhluan` WHERE `id_binhLuan` = '$id'";
                include "models/pdo.php";
                if ($conn->query($sql)) {
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="../admin/index.php?act=comments"</script>';
                }
            }
            break;

        case 'userDel':
            if (isset($_GET["name"])) {
                $name = $_GET["name"];
                $sql = "DELETE FROM `users` WHERE `username` = '$name'";
                include "models/database.php";
                if ($conn->query($sql)) {
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="../admin/index.php?act=customers"</script>';
                }
            }
            break;
        case 'userChange':
            include "controllers/userChange.php";
            break;
        case 'commentDel':
            if (isset($_GET["id"])) {
                $id = $_GET["id"];
                $sql = "DELETE FROM `comments` WHERE `id` = '$id'";
                include "models/database.php";
                if ($conn->query($sql)) {
                    echo '<script>alert("Xoá thành công");</script>';
                    echo '<script>window.location.href="../admin/index.php?act=comments"</script>';
                }
            }
            break;
        case 'report':
            include "views/static.php";
            break;
        default:
            include "views/static.php";
            break;
    }
} else {
    include "views/static.php";
}
include "views/default/footer.php";
