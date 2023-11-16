<?php

use App\Libraries\MyClass;
use App\Models\Customer;

$id = $_REQUEST['id'];
$customer = Customer::find($id);

if ($customer == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=customer");
}

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
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
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
                        <label>ID</label>
                        <input type="text" name="id" value="<?= $customer->id; ?>" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label>Họ và tên (*)</label>
                        <input type="text" value="<?= $customer->name; ?>" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" value="<?= $customer->customername; ?>" name="customername" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <textarea name="email" class="form-control"><?= $customer->email; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Giới tính</label>
                        <input type="text" value="<?= $customer->gender; ?>" name="gender" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <textarea name="phone" class="form-control"><?= $customer->phone; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ</label>
                        <textarea name="address" class="form-control"><?= $customer->address; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($customer->status == 1) ? 'selected' : ''; ?>>Ẩn </option>
                           <option value="2" <?= ($customer->status == 2) ? 'selected' : ''; ?>>Hiện</option>
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