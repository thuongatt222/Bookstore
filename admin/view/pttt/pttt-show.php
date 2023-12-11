<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Phương thức thanh toán /</span>Hiển thị
        </h4>

        <div class="row">
            <!-- Basic Buttons -->

            <div class="col-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?controller=pttt&action=add"><i class="bx bx-plus"></i>Thêm phương thức thanh toán</a>
                    </li>
                </ul>

                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Danh sách phương thức thanh toán</h5>

                    <!--Tìm kiếm-->
                    <form action="index.php?controller=pttt&action=" method="post">
                        <div style="display: flex;justify-content: right">
                            <div class="mb-3 col-md-3">
                                <input class="form-control" type="text" id="name" name="search" value="" autofocus/>
                            </div>
                            <button type="submit" class="mb-3" style="display: block;color: #697a8d;
    background-color: #fff;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;">
                                <i class="bx bx-search fs-4 lh-0"></i>
                            </button>
                        </div>
                    </form>
                    <!--Tìm kiếm-->

                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên phương thức thanh toán</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($array['infor'] as $pttt) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $pttt['id_payment'] ?>
                                        </td>
                                        <td>
                                            <?= $pttt['name_payment'] ?>
                                        </td>
                                        <td>
                                            <a style="color: white" href="index.php?controller=pttt&action=edit&id=<?= $pttt['id_payment'] ?>"><button type="button" class="btn btn-info">Sửa</button></a>
                                            <a style="color: white" href="index.php?controller=pttt&action=destroy&id=<?= $pttt['id_payment'] ?>"><button type="button" class="btn btn-danger">Xóa</a></button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                        <!--                        Chia số trang-->
                        <div class="" style="display: flex ;justify-content: center ; margin-top: 50px">
                            <nav aria-label="...">
                                <ul class="pagination pagination-lg">
                                    <?php
                                    for ($i = 1; $i <= $array['page']; $i++) {
                                        ?>
                                        <li class="page-item">
                                            <form method="post" action="index.php?controller=pttt&page=<?= $i ?>">
                                                <input type="hidden" name="search" value="<?= $array['search'] ?>">
                                                <input type="hidden" name="page" value="<?= $i ?>">
                                                <button class="page-link"><?= $i ?></button>
                                            </form>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <!--                        Chia số trang-->

                    </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>