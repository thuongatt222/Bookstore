<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <?php
    $check = 0;
        if($check == 1){
            echo "<div style='color:red' >This name already exists!</div>";
        }
    ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Sản phẩm /</span> Sửa sản phẩm</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Sản phẩm</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                    <?php
                        foreach ($array1['products'] as $product){
                    ?>
                        <form id="formAccountSettings" method="POST" action="index.php?controller=sp&action=update">
                            <div class="row">
                            <input type="hidden" name="id" value="<?= $product['id_product'] ?>">
                                <div class="mb-3 col-md-6">
                                    <label for="name" class="form-label">Tên sản phẩm</label>
                                    <input class="form-control" type="text" id="name" name="name" value="<?=$product['product_name']?>" autofocus />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="page" class="form-label">Số trang</label>
                                    <input class="form-control" type="text" id="page" name="page" value="<?=$product['number_of_pages']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Giá</label>
                                    <input class="form-control" type="text" id="price" name="price" value="<?=$product['price']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="size" class="form-label">Kích cỡ</label>
                                    <input class="form-control" type="text" id="size" name="size" value="<?=$product['size']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="date" class="form-label">Ngày sản xuất</label>
                                    <input class="form-control" type="date" id="date" name="date" value="<?=$product['publication_date']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="describes" class="form-label">Mô tả</label>
                                    <input class="form-control" type="text" id="describes" name="describes" value="<?=$product['describes']?>" />
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Thể loại</label>
                                    <select class="form-control" type="text" id="price" name="category_id">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($array1['category'] as $category) {
                                        ?>
                                            <option value="<?= $category['id_category'] ?>" 
                                            <?php
                                                if ($category['id_category'] == $product['id_category']) {
                                                    echo 'selected';
                                                    }
                                            ?>>
                                                <?= $category['name_category'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Tác giả</label>
                                    <select class="form-control" type="text" id="price" name="author_id">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($array1['author'] as $author) {
                                        ?>
                                            <option value="<?= $author['id_author'] ?>" 
                                            <?php
                                                if ($author['id_author'] == $product['id_author']) {
                                                    echo 'selected';
                                                    }
                                            ?>>
                                                <?= $author['name_author'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6 ">
                                    <label for="price" class="form-label">Nhà xuất bản</label>
                                    <select class="form-control" type="text" id="price" name="publis_id">
                                        <option value=""> - Chọn - </option>
                                        <?php
                                        foreach ($array1['publis'] as $publis) {
                                        ?>
                                            <option value="<?= $publis['id_publishing_company'] ?>" 
                                            <?php
                                                if ($publis['id_publishing_company'] == $product['id_publishing_company']) {
                                                    echo 'selected';
                                                    }
                                            ?>>
                                                <?= $publis['publishing_company_name'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">Ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="img" id="inputGroupFile01" />
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Sửa sản phẩm</button>
                                </div>
                        </form>
                    <?php
                        }
                    ?>
                    </div>
                    <a style="color: #8592a3" href="index.php?controller=sp"><button type="reset" class="btn btn-outline-secondary">Hủy bỏ</button></a>
                    <!-- /Account -->
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