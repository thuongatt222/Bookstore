<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn chi tiết /</span>Hiển thị
        </h4>

        <div class="row">
            <div class="card">

                <div class="col-12">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            foreach ($bill['customer'] as $infor) {
                            ?>
                                <div class="mb-3 col-md-6 ">
                                    <label for="email" class="form-label">Tên khách hàng</label>
                                    <input class="form-control" type="text" id="email" value="<?= $infor['name_customer'] ?>" readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Địa chỉ</label>
                                    <input class="form-control" type="text" id="total" value="<?= $infor['address'] ?>" readonly />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="total" class="form-label">Số điện thoại</label>
                                    <input class="form-control" type="text" id="total" value="<?= $infor['phone_number'] ?>" readonly />
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <h5 class="card-header">Sản phẩm</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php
                                foreach ($bill['product'] as $product) {
                                ?>
                                    <tr>
                                        <td><?= $product['product_name'] ?></td>
                                        <td><img src="img/<?= $product['image'] ?>" alt="" width="150px" height="150px"></td>
                                        <td><?= $product['price_product'] ?></td>
                                        <td><?= $product['amount'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </table>
                    <div class="row">
                        <?php
                        foreach ($bill['employee'] as $infor) {
                        ?>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Nhân viên</label>
                                <input class="form-control" type="text" id="email" name="email" value="<?= $infor['name_employee'] ?>" readonly />
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        foreach ($bill['customer'] as $infor) {
                        ?>
                            <div class="mb-3 col-md-6 ">
                                <label for="email" class="form-label">Ngày mua</label>
                                <input class="form-control" type="date" id="email" name="email" value="<?= $infor['purchase_date'] ?>" readonly />
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="total" class="form-label">Tổng giá</label>
                                <input class="form-control" type="text" id="total" name="total" value="<?= $infor['total'] ?>" readonly />
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="total" class="form-label">Phương thức thanh toán</label>
                                <input class="form-control" type="text" id="total" name="total" value="<?= $infor['name_payment'] ?>" readonly />
                            </div>
                            <div class="mb-3 col-md-6 ">
                                <label for="total" class="form-label">Phương thức vận chuyển</label>
                                <input class="form-control" type="text" id="total" name="total" value="<?= $infor['name_shipping'] ?>" readonly />
                            </div>
                            <form id="formAccountSettings" method="POST" action="index.php?controller=hoadon&action=update">
                                <div class="mb-3 col-md-6">
                                    <input type="hidden" name="id_bill" value="<?= $infor['id_bill'] ?>">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="0" <?= ($infor['status'] == 0) ? 'selected' : '' ?>>Chờ xử lý</option>
                                        <option value="1" <?= ($infor['status'] == 1) ? 'selected' : '' ?>>Đang xử lý</option>
                                        <option value="2" <?= ($infor['status'] == 2) ? 'selected' : '' ?>>Đang giao</option>
                                        <option value="3" <?= ($infor['status'] == 3) ? 'selected' : '' ?>>Đã giao hàng</option>
                                        <option value="4" <?= ($infor['status'] == 4) ? 'selected' : '' ?>>Đã hủy</option>
                                    </select>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" name="update" class="btn btn-primary me-2">Cập nhật</button>

                            </form>
                            <a style="color: #8592a3" href="index.php?controller=hoadon"><button class="btn btn-outline-secondary">Hủy bỏ</button></a>
                    </div>
                <?php
                        }
                ?>

                </div>
            </div>
        </div>