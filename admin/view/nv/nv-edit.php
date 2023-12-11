<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Nhân viên /</span> Sửa nhân viên</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết hồ sơ</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <?php
                        foreach ($NV as $nv) {
                        ?>
                            <form id="nv" method="POST" action="index.php?controller=nv&action=update">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <input type="hidden" name="id" value="<?= $nv['id_employee'] ?>">
                                        <label for="name_nv" class="form-label">Họ và tên</label>
                                        <input class="form-control" type="text" id="name_nv" name="name_nv" value="<?= $nv['name_employee'] ?>" autofocus />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="user_nv" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="user_nv" name="user_nv" value="<?= $nv['username'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="pass_nv" class="form-label">Password</label>
                                        <input class="form-control" type="text" id="pass_nv" name="pass_nv" value="<?= $nv['password'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="email_nv" class="form-label">Email</label>
                                        <input class="form-control" type="email" id="email_nv" name="email_nv" value="<?= $nv['email'] ?>" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phone_nv">Số điện thoại</label>
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text">VN (+84)</span>
                                            <input type="text" id="phone_nv" name="phone_nv" class="form-control" value="<?= $nv['phone_number'] ?>" />
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Sửa</button>
                                    </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=nv"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a>
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