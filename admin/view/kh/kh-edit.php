<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Khách hàng /</span> Sửa khách hàng</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết hồ sơ</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <?php
                        foreach ($KH as $kh) {
                        ?>
                            <form id="kh" method="POST" action="index.php?controller=kh&action=update">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <input type="hidden" name="id" value="<?= $kh['id_customer'] ?>">
                                        <label for="name_kh" class="form-label">Họ và tên</label>
                                        <input class="form-control" type="text" id="name_kh" name="name_kh" value="<?= $kh['name_customer'] ?>" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="email_kh" class="form-label">E-mail</label>
                                        <input class="form-control" type="text" id="email_kh" name="email_kh" value="<?= $kh['email'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="user_kh" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="user_kh" name="user_kh" value="<?= $kh['username'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="pass_kh" class="form-label">Password</label>
                                        <input class="form-control" type="text" id="pass_kh" name="pass_kh" value="<?= $kh['password'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phone_kh">số điện thoại</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">VN (+84)</span>
                                            <input type="text" id="phone_kh" name="phone_kh" class="form-control" value="<?= $kh['phone_number'] ?>" />
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="address">Địa chỉ</label>
                                        <div class="input-group input-group-merge">
                                            <input type="text" id="address" name="address" class="form-control" value="<?= $kh['address'] ?>" />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Sửa khách hàng</button>
                                    </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=kh"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->