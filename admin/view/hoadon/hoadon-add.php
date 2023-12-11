<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div>
        <?php
        $test = 0;
        if ($test == 1) {
            echo "<div style='color:red' >This name already exists!</div>";
        }
        ?>
    </div>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hóa đơn /</span> Thêm hóa đơn</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">

                    <div style="display: flex ;justify-content: right; margin-top: 15px; margin-right: 20px">
                        <ul class="nav nav-pills flex-column flex-md-row mb-3">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?controller=hoadon&action=hd-sp-ct"><i
                                            class="bx bx-plus"></i>Thêm sản phẩm</a>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-0"/>
                    <h5 class="card-header">Hóa đơn</h5>
                    <form action="index.php?controller=hoadon&action=add-order-db" method="POST">
                        <hr class="my-0"/>
                        <div>
                            <!--                 Danh sách sản phẩm -START  -->
                            <div class="card">
                                <h5 class="card-header">Danh sách sản phẩm</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        <?php
                                        foreach ($infor['cart'] as $product_id => $value) {
                                            ?>
                                            <tr>
                                                <td required>
                                                    <?= $value['id_product'] ?>
                                                </td>
                                                <td required>
                                                    <?= $value['product_name'] ?>
                                                </td>
                                                <td required>
                                                    <img style="width: 150px" src="img/<?= $value['image'] ?>" alt="">
                                                </td>
                                                <td required>
                                                    <?= $value['amount']; ?>
                                                </td>
                                                <td required>
                                                    <?= $value['price'] ?> VNĐ
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <!--                Danh sách sản phẩm - END    -->

                            <!--                            Thông tin đơn hàng - START-->
                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3 col-md-6 ">
                                        <label for="customer" class="form-label">Tên khách hàng</label>
                                        <select class="form-control" type="text" id="id_customer" name="id_customer">
                                            <option value="" required> - Chọn -</option>
                                            <?php
                                            foreach ($infor['customer'] as $customer) {
                                                ?>
                                                <option value="<?= $customer['id_customer'] ?>">
                                                    <?= $customer['name_customer'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="employee" class="form-label">Tên nhân viên xử lý đơn</label>
                                        <select class="form-control" type="text" id="id_employee" name="id_employee">
                                            <option value="" required> - Chọn -</option>
                                            <?php
                                            foreach ($infor['employee'] as $employee) {
                                                ?>
                                                <option value="<?= $employee['id_employee'] ?>">
                                                    <?= $employee['name_employee'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="payment" class="form-label">Phương thức thanh toán</label>
                                        <select class="form-control" type="text" id="id_payment" name="id_payment">
                                            <option value="" required> - Chọn -</option>
                                            <?php
                                            foreach ($infor['payment'] as $payment) {
                                                ?>
                                                <option value="<?= $payment['id_payment'] ?>">
                                                    <?= $payment['name_payment'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="shipping" class="form-label">Phương thức vận chuyển</label>
                                        <select class="form-control" type="text" id="id_shipping" name="id_shipping">
                                            <option value="" required> - Chọn -</option>
                                            <?php
                                            foreach ($infor['shipping'] as $shipping) {
                                                ?>
                                                <option value="<?= $shipping['id_shipping'] ?>">
                                                    <?= $shipping['name_shipping'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6 ">
                                        <label for="total" class="form-label">Tổng giá</label>
                                        <input class="form-control" type="text" id="total" name="total"
                                               value="<?= $infor['total'] ?>" readonly/>
                                    </div>
                                </div>
                                <!--                            Thông tin đơn hàng -END -->

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Thêm hóa đơn</button>
                                </div>
                            </div>
                    </form>
                </div>
                <div style="display: flex; justify-content: space-between; margin: 0 20px 20px 20px">
                    <a style="color: #8592a3" href="index.php?controller=hoadon&action=change-amount">
                        <button class="btn btn-outline-secondary">Thay đổi số lượng sản phẩm</button>
                    </a>
                    <a style="color: #8592a3" href="index.php?controller=hoadon&action=delete-cart">
                        <button class="btn btn-outline-secondary">Hủy bỏ</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
    <div class="content-backdrop fade"></div>
</div>
</div>
</div>
<div class="layout-overlay layout-menu-toggle"></div>
</div>