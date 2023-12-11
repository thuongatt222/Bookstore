<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Khách hàng /</span> Thêm khách hàng</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết hồ sơ</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="kh" method="POST" action="index.php?controller=kh&action=store">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="name_kh" class="form-label">Họ và tên</label>
                                    <input class="form-control" type="text" id="name_kh" name="name_kh" value="" autofocus required/>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email_kh" class="form-label">E-mail</label>
                                    <input class="form-control" type="email" id="email_kh" name="email_kh" value="" placeholder="a@gmail.com" required/>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="user_kh" class="form-label">Username</label>
                                    <input class="form-control" type="text" id="user_kh" name="user_kh" value="" placeholder="Nguyen Van A" required/>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="pass_kh" class="form-label">Password</label>
                                    <input class="form-control" type="password" id="pass_kh" name="pass_kh" value="" required/>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phone_kh">Số điện thoại</label>
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text">VN (+84)</span>
                                        <input type="text" id="phone_kh" name="phone_kh" class="form-control" placeholder="000 000 0000" required/>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="address">Địa chỉ</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="address" name="address" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm khách hàng</button>
                                </div>
                        </form>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=kh"><button class="btn btn-outline-secondary">Hủy bỏ</button></a>
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