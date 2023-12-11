
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Thiết lập tài khoản /</span> Tài khoản</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Tài khoản</a>
                        </li>
                    </ul>
                    <div class="card mb-4">
                        <h5 class="card-header">Chi tiết hồ sơ</h5>
                        <!-- Account -->
                        <hr class="my-0" />
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Họ và tên</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="firstName"
                                            name="firstName"
                                            value=""
                                            autofocus
                                        />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="email" class="form-label">E-mail</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            id="email"
                                            name="email"
                                            value=""
                                        />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="phoneNumber">số điện thoại</label>
                                        <div class="input-group input-group-merge">
                                            <input
                                                type="text"
                                                id="phoneNumber"
                                                name="phoneNumber"
                                                class="form-control"
                                                value=""
                                            />
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Lưu thay đổi</button>
                                    <button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                    <div class="card">
                        <h5 class="card-header">Xóa tài khoản</h5>
                        <div class="card-body">
                            <div class="mb-3 col-12 mb-0">
                                <div class="alert alert-warning">
                                    <h6 class="alert-heading fw-bold mb-1">Bạn có chắc là muốn cóa tài khoản hay không?</h6>
                                    <p class="mb-0">Sau khi bạn xóa tài khoản của mình, bạn sẽ không thể quay lại. Hãy chắc chắn.</p>
                                </div>
                            </div>
                            <form id="formAccountDeactivation" onsubmit="return false">
                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="accountActivation"
                                        id="accountActivation"
                                    />
                                    <label class="form-check-label" for="accountActivation"
                                    >Tôi xác nhận hủy kích hoạt tài khoản của mình</label
                                    >
                                </div>
                                <button type="submit" class="btn btn-danger deactivate-account">Hủy kích hoạt tài khoản</button>
                            </form>
                        </div>
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

