<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Hóa đơn chi tiết /</span>Thêm sản phẩm
        </h4>

        <div class="row">
            <!-- Basic Buttons -->
            <div class="col-12">
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Chi tiết hóa đơn</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <?php
                            foreach ($product as $product){
                                ?>
                                <tr>
                                    <td>
                                        <?= $product['id_product'] ?>
                                    </td>
                                    <td>
                                        <?= $product['product_name'] ?>
                                    </td>
                                    <td>
                                        <img style="width: 150px" src="img/<?= $product['image'] ?>" alt="" >
                                    </td>
                                    <td>
                                        <a style="color: white" href="index.php?controller=hoadon&action=add-to-cart&id=<?=$product['id_product']?>"><button type="button" class="btn btn-info">Chọn</button></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        <div style="margin: 20px 20px">
                        <a style="color: white" href="index.php?controller=hoadon&action=information"><button type="button" class="btn btn-secondary">Trở lại</button></a>
                        </div>
                        </div>
                </div>
                <!--/ Basic Bootstrap Table -->
            </div>

