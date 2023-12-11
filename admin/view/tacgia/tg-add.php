<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tác giả /</span> Thêm tác giả</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="tg" method="POST" action="index.php?controller=tacgia&action=store">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="tg" class="form-label">Tên tác giả</label>
                                    <input class="form-control" type="text" id="tg" name="tg" value="" autofocus required />
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm tác giả</button>
                                </div>
                        </form>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=tacgia"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a>
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