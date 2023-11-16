<?php

use App\Libraries\MyClass;
use App\Models\Customer;


?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật sản phẩm</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a class="btn btn-sm btn-info " href="index.php?option=customer">Tất cả</a>
                     <a class="btn btn-sm btn-warning " href="index.php?option=customer&cat=trash">
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=customer" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <?php require_once '../views/backend/message.php'; ?>
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Họ và tên (*)</label>
                        <input type="text" placeholder="Nhập họ và tên" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" placeholder="Nhập tên đăng nhập" name="customername" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" placeholder="Nhập email" name="email" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">

                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" placeholder="Nhập số điện thoại" name="phone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ</label>
                        <input type="text" placeholder="Nhập địa chỉ" name="address" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control">
                           <option value="1">Nam </option>
                           <option value="2">Nữ</option>
                        </select>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1">Ẩn </option>
                              <option value="2">Hiện</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->

<?php require_once '../views/backend/footer.php'; ?>