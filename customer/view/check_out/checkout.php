 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" style="background-color: #7fad39">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Kiểm tra hóa đơn</h2>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Section End -->

 <!-- Checkout Section Begin -->
 <section class="checkout spad">
     <div class="container">
         <div class="checkout__form">
             <h4>CHI TIẾT THANH TOÁN</h4>
             <form action="index.php?controller=check-out&action=add-to-db" method="POST">
                 <div class="row">
                     <div class="col-lg-12 col-md-6">
                         <div class="checkout__order">
                             <h4>HÓA ĐƠN CỦA BẠN</h4>
                             <!--Hiển thị khách hàng-->
                             <div class="card-body">
                                 <?php
                                 foreach ($KH['users'] as $kh) {
                                 ?>
                                 <div class="row">
                                     <div class="mb-3 col-md-6">
                                         <input type="hidden" name="id" value="<?= $kh['id_customer'] ?>">
                                         <label for="name_kh" class="form-label">Họ và tên</label>
                                         <input class="form-control" type="text" id="name_kh" name="name_kh"
                                                value="<?= $kh['name_customer'] ?>" readonly/>
                                     </div>
                                     <div class="mb-3 col-md-6 ">
                                         <label for="email_kh" class="form-label">E-mail</label>
                                         <input class="form-control" type="text" id="email_kh" name="email_kh"
                                                value="<?= $kh['email'] ?>" readonly/>
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label class="form-label" for="phone_kh">số điện thoại</label>
                                         <div class="input-group input-group-merge">
                                             <span class="input-group-text">VN (+84)</span>
                                             <input type="text" id="phone_kh" name="phone_kh" class="form-control"
                                                    value="<?= $kh['phone_number'] ?>" readonly/>
                                         </div>
                                     </div>
                                     <div class="mb-3 col-md-6">
                                         <label class="form-label" for="address">Địa chỉ</label>
                                         <div class="input-group input-group-merge">
                                             <input type="text" id="address" name="address" class="form-control"
                                                    value="<?= $kh['address'] ?>" />
                                         </div>
                                     </div>

                                     <?php
                                     }
                                     ?>
                                 </div>
                                 <!--Hiển thị khách hàng-->

                                 <div class="checkout__order__products">Sản phẩm</div>

                                 <!--                                Hiển thị sản phẩm và giá -->
                                 <div class="col-lg-12">
                                     <table class="col-lg-12">
                                         <thead>
                                         <tr>
                                             <th class="shoping__product">Tên sản phẩm</th>
                                             <th>Ảnh</th>
                                             <th>Giá</th>
                                             <th>Số lượng</th>
                                             <th></th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <?php
                                         foreach ($KH['cart'] as $product_id => $value) {
                                             ?>
                                             <!--  dùng PHP để hiển thị giỏ-->
                                             <tr>
                                                 <td><?= $value['product_name'] ?>
                                                 </td>
                                                 <td class="shoping__cart__item">
                                                     <img src="img/<?= $value['image'] ?>" alt="" width="150px"
                                                          height="150px">
                                                 </td>
                                                 <td class="shoping__cart__price">
                                                     <?= $value['price'] ?>.000 VNĐ
                                                 </td>
                                                 <td class="shoping__cart__quantity">
                                                     <?= $value['amount']; ?>
                                                 </td>
                                             </tr>
                                             <?php
                                         }
                                         ?>
                                         </tbody>
                                     </table>
                                 </div>
                                 <!--                                Hiển thị sản phẩm và giá - END  -->
                                 <hr>

                                 <!--                                hiển thị tổng tiền -->
                                 <div class="checkout__order__total">Tổng tiền <span><input type="hidden" name="total"
                                                                                            value="<?= $KH['total'] ?>"
                                                                                            readonly><?= $KH['total'] ?>.000 VNĐ</span></div>

                                 <div class="card-body">
                                     <form id="kh" method="POST" action="index.php?controller=kh&action=store">
                                         <div class="row">
                                             <div class="mb-3 col-md-6">
                                                 <p for="price" class="form-label">Chọn phương thức thanh toán:</p>
                                                 <select type="text" id="price" name="id_payment"
                                                         style="margin-bottom: 10px">
                                                     <option value=""> - Chọn -</option>
                                                     <?php
                                                     foreach ($KH['payment'] as $payment) {
                                                         ?>
                                                         <option value="<?= $payment['id_payment'] ?>">
                                                             <?= $payment['name_payment'] ?>
                                                         </option>
                                                         <?php
                                                     }
                                                     ?>
                                                 </select>
                                             </div>

                                             <div class="mb-3 col-md-6">
                                                 <p for="price" class="form-label">Chọn phương thức vận chuyển:</p>
                                                 <select type="text" id="price" name="id_shipping"
                                                         style="margin-bottom: 10px">
                                                     <option value=""> - Chọn -</option>
                                                     <?php
                                                     foreach ($KH['shipping'] as $shipping) {
                                                         ?>
                                                         <option value="<?= $shipping['id_shipping'] ?>">
                                                             <?= $shipping['name_shipping'] ?>
                                                         </option>
                                                         <?php
                                                     }
                                                     ?>
                                                 </select>
                                             </div>
                                         </div>
                                     </form>
                                 </div>

                             </div>
                             <input type="hidden" name="id_employee" value="2">
                             <!--                                Chọn phương thức thanh toán -->
                             <button type="submit" class="site-btn">Đặt hàng</button>
                         </div>
                     </div>
                 </div>
             </form>
     </div>
     </div>
 </section>
 <!-- Checkout Section End -->