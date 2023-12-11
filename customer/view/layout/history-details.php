<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="background-color: #7fad39">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Lịch sử mua hàng</h2>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="col-lg-2">Ảnh</th>
                                <th class="col-lg-3">Tên sản phẩm</th>
                                <th class="col-lg-3">Tác giả</th>
                                <th class="col-lg-2">Số lượng</th>
                                <th class="col-lg-2">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($history['product'] as $his) {
                            ?>
                                <!--                                    dùng PHP để hiển thị giỏ-->
                                <tr>
                                    <td>
                                        <img src="img/<?= $his['image'] ?>" alt="" width="150px" height="150px">
                                    </td>
                                    <td>
                                        <h5><a href="index.php?controller=shop-details" style="color: black"><?= $his['product_name'] ?></a></h5>
                                    </td>
                                    <td>
                                        <?= $his['name_author'] ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <?= $his['amount'] ?>
                                    </td>
                                    <td class="shoping__cart__price">
                                            <?= $his['price_product'] ?>.000 VNĐ
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <table class="shoping__cart__table">
                        <thead>
                            <tr>
                                <th>Phương thức thanh toán</th>
                                <th>Phương thức vận chuyển</th>
                                <th>Ngày mua</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($history['infor'] as $his) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $his['name_payment']; ?>
                                    </td>
                                    <td>
                                        <?= $his['name_shipping']; ?>
                                    </td>
                                    <td>
                                        <?= $his['purchase_date']; ?>
                                    </td>
                                    <td>
                                        <?php if ($his['status'] == 0) {
                                            echo "Chờ xử lý";
                                        } elseif($his['status'] == 1) {
                                            echo "Đang xử lý";
                                        }elseif($his['status'] == 2) {
                                            echo "Đang giao";
                                        }elseif($his['status'] == 3) {
                                            echo "Đang đã giao";
                                        }elseif($his['status'] == 4) {
                                            echo "Đã hủy";
                                        }?>
                                    </td>

                                    <td style="color: red"><b>
                                        <?= $his['total']; ?>.000 VNĐ
                                        </b>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a style="color: white" href="index.php?controller=check-out&action=delete-bill&id=<?=$his['id_bill']?>" class="site-btn">Hủy đơn</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <a href="index.php?controller=check-out&action=history"><button class="site-btn">Trở lại</button></a>
                
            </div>
        </div>
    </div>

</section>
<!-- Shoping Cart Section End -->