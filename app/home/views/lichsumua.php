<div class="container">

    <div class="hedderls" style="background-color: #c1c1c1;"> <!-- Checkout Section Begin -->

        <div class="row">
            <div class="col-lg-6">
                <nav class="header__menu" style="padding-left: 37px; ">
                    <ul style="display: flex; width:1000px;">
                        <li><a href="#">Tất cả</a></li>
                        <li><a href="#">Đang chờ xử lý</a></li>
                        <li><a href="#">Đang xử lý</a></li>
                        <li><a href="#">Đang vận chuyển</a></li>
                        <!-- <li><a href="index.php?act=tintuc">Tư vấn</a></li> -->
                        <li><a href="#">Hoàn thành</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>





<section class="checkout spad" style="padding-top: 10px; padding-bottom: 10px;">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order" style="width: 1140px;">
                            <div class="checkout__order__products" style="display: flex; justify-content: space-between;font-size: medium; color:black;">
                                <h4>Đơn hàng của bạn</h4>
                                <p>Trạng thái:</p>
                            </div>
                            <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; ">5.000.000</span>
                                <div class="anh" style="display: flex;">
                                    <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                    <div class="thongtin" style="font-size: small; color: gray; ">

                                        <label for="">laptop1</label><br>
                                        <label for="">Phân loại:</label><br>
                                        <label for="">x1</label>
                                    </div>
                                </div>
                            </div>


                            <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; ">5.000.000</span>
                                <div class="anh" style="display: flex;">
                                    <img src="app/admin/uploads/637901915720184032_macbook-air-m2-2022-den-dd.jpg-2.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                    <div class="thongtin" style="font-size: small; color: gray; ">

                                        <label for="">laptop1</label><br>
                                        <label for="">Phân loại:</label><br>
                                        <label for="">x1</label>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="checkout__order__total">Thành tiền<span>5.000.000</span></div>
                            <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                            <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>



<section class="checkout spad" style="padding-top: 10px;">
    <div class="container">
        <div class="row">
        </div>
        <div class="checkout__form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="checkout__order" style="width: 1150px;">
                            <div class="checkout__order__products" style="display: flex; justify-content: space-between;font-size: medium; color:black;">
                                <h4>Đơn hàng của bạn</h4>
                                <p>Trạng thái:</p>
                            </div>
                            <div class="checkout__order__products"> <span style="margin-top: 30px; font-size: small; color: red; ">5.000.000</span>
                                <div class="anh" style="display: flex;">
                                    <img src="app/admin/uploads/638096353283711618_macbook-pro-16-2023-m2-pro-xam-dd.jpg.webp" width="80px" height="80px" style=" margin-right: 20px;"><br>
                                    <div class="thongtin" style="font-size: small; color: gray; ">

                                        <label for="">laptop1</label><br>
                                        <label for="">Phân loại:</label><br>
                                        <label for="">x1</label>
                                    </div>
                                </div>
                            </div>


                           

                            <hr>
                            <div class="checkout__order__total">Thành tiền<span>5.000.000</span></div>
                            <button type="submit" class="site-btn" style="width:170px; ">Mua lại</button>
                            <button type="submit" class="site-btn" style="width:170px; ">Chi tiết</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<!-- Checkout Section End -->

<style>
    .header__menu ul li {
        cursor: pointer;

    }

    .header__menu ul li.active {}


    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const menuItems = document.querySelectorAll(".header__menu ul li");

        menuItems.forEach(item => {
            item.addEventListener("click", function() {
                // Remove "active" class from all items
                menuItems.forEach(item => item.classList.remove("active"));
                // Add "active" class to the clicked item
                this.classList.add("active");
            });
        });
    });
</script>