<?php

use App\Models\Order;

$id = $_REQUEST['id'];
$order = Order::find($id);

if ($order == NULL) {
   header("location:index.php?option=order");
}

?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật order</h1>
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
                     <a class="btn btn-sm btn-info " href="index.php?option=order">Tất cả</a>
                     <a class="btn btn-sm btn-warning " href="index.php?option=order&cat=trash">
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=order" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>ID</label>
                        <input type="text" name="id" value="<?= $order->id; ?>" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label>Mã khách hàng</label>
                        <input type="text" value="<?= $order->user_id; ?>" name="user_id" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên người nhận</label>
                        <input type="text" value="<?= $order->deliveryname; ?>" name="deliveryname" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ người nhận</label>
                        <input type="text" value="<?= $order->deliveryaddress; ?>" name="deliveryaddress" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Chưa giao</option>
                           <option value="2">Đã giao</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Email người nhận</label>
                        <input type="text" value="<?= $order->deliveryemail; ?>" name="deliveryemail" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điện thoại người nhận</label>
                        <input type="text" value="<?= $order->deliveryphone; ?>" name="deliveryphone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Code đơn hàng</label>
                        <textarea name="note" class="form-control"><?= $order->note; ?></textarea>
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