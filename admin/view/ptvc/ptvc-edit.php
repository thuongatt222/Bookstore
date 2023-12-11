
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Phương thức vận chuyển /</span> Sửa phương thức vận chuyển</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Chi tiết</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <?php
                        foreach($PTVC as $ptvc){
                        ?>
                        <form id="ptvc" method="POST" action="index.php?controller=ptvc&action=update">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="id" value="<?= $ptvc['id_shipping'] ?>">
                                    <label for="ptvc" class="form-label">Tên phương thức vận chuyển</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="ptvc"
                                        name="ptvc"
                                        value="<?= $ptvc['name_shipping'] ?>"
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Sửa phương thức vận chuyển</button>
                                </div>
                        </form>
                            <?php
                        }
                        ?>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=ptvc"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a>
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

