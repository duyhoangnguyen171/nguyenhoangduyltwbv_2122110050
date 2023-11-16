<?php

use App\Libraries\MyClass;
use App\Models\Product;

$id = $_REQUEST['id'];
$product = Product::find($id);

if ($product == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=product");
}

?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
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
                     <a class="btn btn-sm btn-info " href="index.php?option=product">Tất cả</a>
                     <a class="btn btn-sm btn-warning " href="index.php?option=product&cat=trash">
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=product" class="btn btn-sm btn-info">
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
                        <input type="text" name="id" value="<?= $product->id; ?>" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label>Tên sản phẩm (*)</label>
                        <input type="text" value="<?= $product->name; ?>" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên danh mục</label>
                        <input type="text" value="<?= $product->slug; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết</label>
                        <textarea name="detail" class="form-control"><?= $product->detail; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <div class="mb-3">
                           <label>Thương hiệu (*)</label>
                           <select name="category_id" class="form-control">
                              <option value="<?= $product->category_id; ?>"><?= $product->category_id; ?></option>
                              <option value="3">Samsung</option>
                              <option value="4">Oppo</option>
                              <option value="5">Apple(Iphone)</option>
                              <option value="6">Realme</option>
                              <option value="11">Apple(MacBook)</option>
                              <option value="12">Dell</option>
                              <option value="13">HP</option>
                           </select>
                        </div>
                     </div>
                     <div class="mb-3">
                        <label>Chi nhánh (*)</label>
                        <select name="brand_id" class="form-control">
                           <option value="1">Việt Nam</option>
                           <option value="2">Hàn Quốc</option>
                           <option value="3">Thái Lan</option>
                           <option value="4">Nhật Bản</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Giá bán</label>
                        <input type="text" value="<?= $product->price; ?>" name="price" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Giá sale</label>
                        <textarea name="pricesale" class="form-control"><?= $product->pricesale; ?></textarea>
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