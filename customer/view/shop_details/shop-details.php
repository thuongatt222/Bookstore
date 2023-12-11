<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" style="background-color: #7fad39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chi tiết sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php
        foreach($product as $pro){
    ?>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="img/<?=$pro['image']?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <!--                        dùng php để hiện thị thông tin sản phẩm-->
                        <h3><?=$pro['product_name']?></h3>
                        <h4 class="text-danger"><?=$pro['price_product']?>.000 VND</h4>
                        <h6><?=$pro['describes']?></h6>
                        <!-- <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="amount[<?=$pro['id_product']?>]">
                                </div>
                            </div>
                        </div> -->
                        <div>
                            <a href="index.php?controller=shop-cart&action=add&id=<?=$pro['id_product']?>" class="primary-btn">Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        }
    ?>
    <!-- Product Details Section End -->
