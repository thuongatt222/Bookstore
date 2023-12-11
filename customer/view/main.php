<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/vanhoc0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=3">Sách Văn Học</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/thieunhi0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=2">Sách Thiếu Nhi</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/kns0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=4">Sách Kỹ Năng Sống</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/qlkd0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=5">Quản Lý Kinh Doanh</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/sgk0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=6">Sách Giáo Khoa - Tham Khảo</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg">
                        <img src="img/nn0.png" alt="">
                        <h5><a href="index.php?controller=shop-grid&action=findtl&tl=7">Sách Ngoại Ngữ</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Xu Hướng Mua Sắm</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active"><a href="index.php?controller=" style="color: black">Tất cả</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=2" style="color: black">Sách Thiếu Nhi</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=3" style="color: black">Sách Văn Học</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=4" style="color: black">Sách Kỹ Năng Sống</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=5" style="color: black">Sách Quản Lý Kinh Doanh</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=6" style="color: black">Sách Giáo Khoa - Tham Khảo</a></li>
                        <li><a href="index.php?controller=&action=findtl&tl=7" style="color: black">Sách Ngoại Ngữ</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <?php
            if (isset($_GET['tl'])) {
                foreach ($array['infor'] as $product) {
            ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="img/<?= $product['image'] ?>">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><i class="fa fa-info"></i></a></li>
                                    <li><a href="index.php?controller=shop-cart&action=add&id=<?= $product['id_product'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">

                                <h6><a href="index.php?controller=shop-details"><?= $product['product_name'] ?></a></h6>
                                <h5 style="color: red"><?= $product['price_product'] ?>.000 VNĐ</h5>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                foreach ($array['infor'] as $product) {
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="img/<?= $product['image'] ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><i class="fa fa-info"></i></a></li>
                                <li><a href="index.php?controller=shop-cart&action=add&id=<?= $product['id_product'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">

                            <h6><a href="index.php?controller=shop-details"><?= $product['product_name'] ?></a></h6>
                            <h5 style="color: red"><?= $product['price_product'] ?>.000 VNĐ</h5>
                        </div>
                    </div>
                </div>
            <?php
            }}
            ?>
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
</section>
<!-- Latest Product Section End -->