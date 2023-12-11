<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="background-color: #7fad39">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Book Store</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Danh mục sản phẩm</h4>
                        <form action="in" method="POST">
                            <ul>
                                <li><a href="index.php?controller=shop-grid">Tất cả</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=2">Sách Thiếu Nhi</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=3">Sách Văn Học</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=4">Sách Kỹ Năng Sống</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=5">Sách Quản Lý Kinh Doanh</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=6">Sách Giáo Khoa - Tham Khảo</a></li>
                                <li><a href="index.php?controller=shop-grid&action=findtl&tl=7">Sách Ngoại Ngữ</a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-12" style="display: grid;grid-template-columns: 33% 33% 33%">
                        <?php
                        if (isset($_GET['tl'])) {
                        foreach ($array['infor'] as $product) {
                            ?>
                            <div class="product__item">
                                <!--                                DANH MỤC SẢN PHẨM -Start-->
                                <div class="product__item__pic set-bg" data-setbg="img/<?= $product['image'] ?>">
                                    <ul class="product__item__pic__hover">
                                        <li>
                                            <a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><i
                                                        class="fa fa-info"></i></a></li>
                                        <li>
                                            <a href="index.php?controller=shop-cart&action=add&id=<?= $product['id_product'] ?>"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>
                                        <a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><?= $product['product_name'] ?></a>
                                    </h6>
                                    <h5 style="color: red"><?= $product['price_product'] ?>.000 VND</h5>
                                </div>
                            </div>
                            <!--                                DANH MỤC SẢN PHẨM - END -->
                            <?php
                        }
                        ?>
                    </div>
                </div>
                    <!--                    CHIA SỐ TRANG-->
                    <div style="display: flex ;justify-content: center ; margin-top: 50px">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <?php
                                for ($i = 1; $i <= $array['page']; $i++) {
                                ?>
                                    <li class="page-item">
                                        <form method="post" action="index.php?controller=shop-grid&page=<?= $i ?>">
                                            <input type="hidden" name="page" value="<?= $i ?>">
                                            <button class="page-link" style="color: #7fad39"><?= $i ?></button>
                                        </form>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                    <?php
                } else {
                    foreach ($array['infor'] as $product) {
                    ?>
                                <div class="product__item">
                                    <!--                                DANH MỤC SẢN PHẨM -Start-->
                                    <div class="product__item__pic set-bg" data-setbg="img/<?= $product['image'] ?>">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><i class="fa fa-info"></i></a></li>
                                            <li><a href="index.php?controller=shop-cart&action=add&id=<?= $product['id_product'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="index.php?controller=shop-details&action=detail&id=<?= $product['id_product'] ?>"><?= $product['product_name'] ?></a></h6>
                                        <h5 style="color: red"><?= $product['price_product'] ?>.000 VND</h5>
                                    </div>
                                </div>
                            <!--                                DANH MỤC SẢN PHẨM - END -->
                    <?php
                    }
                    ?>
            </div>
        </div>
                    <!--                    CHIA SỐ TRANG-->
                    <div style="display: flex ;justify-content: center ; margin-top: 50px">
                        <nav aria-label="...">
                            <ul class="pagination pagination-lg">
                                <?php
                                for ($i = 1; $i <= $array['page']; $i++) {
                                ?>
                                    <li class="page-item">
                                        <form method="post" action="index.php?controller=shop-grid&page=<?= $i ?>">
                                            <input type="hidden" name="search" value="<?= $array['search'] ?>">
                                            <input type="hidden" name="page" value="<?= $i ?>">
                                            <button class="page-link" style="color: #7fad39"><?= $i ?></button>
                                        </form>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                <?php
                }
                ?>
                <!--                    CHIA SỐ TRANG-->
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->