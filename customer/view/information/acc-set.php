<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" style="background-color: #7fad39">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Tài khoản</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>CHI TIẾT TÀI KHOẢN</h4>
            <div class="row">

                <div class="col-lg-12 col-md-6">
                    <div class="checkout__order">
                        <h4>THÔNG TIN TÀI KHOẢN</h4>
                        <!--Hiển thị khách hàng-->
                        <div class="card-body">
                            <?php
                            foreach ($KH as $kh) {
                            ?>
                                <form id="kh" method="POST" action="index.php?controller=infor&action=update">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <input type="hidden" name="id" value="<?= $kh['id_customer'] ?>">
                                            <label for="name_kh" class="form-label">Họ và tên</label>
                                            <input class="form-control" type="text" id="name_kh" name="name" value="<?= $kh['name_customer'] ?>" readonly />
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label for="email_kh" class="form-label">E-mail</label>
                                            <input class="form-control" type="text" id="email_kh" name="email" value="<?= $kh['email'] ?>" readonly />
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label for="email_kh" class="form-label">Mật khẩu</label>
                                            <input class="form-control" type="password" id="email_kh" name="password" />
                                        </div>
                                        <div class="mb-3 col-md-6 ">
                                            <label for="email_kh" class="form-label">Nhập lại mất khẩu</label>
                                            <input class="form-control" type="password" id="email_kh" name="re-password" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="phone_kh">số điện thoại</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">VN (+84)</span>
                                                <input type="text" id="phone_kh" name="phone" class="form-control" value="<?= $kh['phone_number'] ?>" />
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="address">Địa chỉ</label>
                                            <div class="input-group input-group-merge">
                                                <input type="text" id="address" name="address" class="form-control" value="<?= $kh['address'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="site-btn">Cập nhật</button>
                                        </div>

                                </form>
                            <?php
                            }
                            ?>
                        </div><div class="col-lg-6">
                                <a href="index.php?controller=infor">
                                    <button class="site-btn">Quay lại</button>
                                </a>
                            </div>
                        <!--Hiển thị khách hàng-->



                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- Checkout Section End -->