<?php

use App\Models\Page;

$id = $_REQUEST['id'];
$page = Page::find($id);

if ($page == NULL) {
   header("location:index.php?option=page");
}

?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật thương hiệu</h1>
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
                     <a class="btn btn-sm btn-info " href="index.php?option=page">Tất cả</a>
                     <a class="btn btn-sm btn-warning " href="index.php?option=page&cat=trash">
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Cập nhật
                     </button>
                     <a href="index.php?option=page" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <input type="text" name="id" value="<?= $page->id; ?>" /><br>
                        <label>Tiêu đề bài viết(*)</label>
                        <input type="text" value="<?= $page->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên danh mục</label>
                        <input type="text" value="<?= $page->slug; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết</label>
                        <textarea name="detail" class="form-control"><?= $page->detail; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Hình ảnh</label>
                        <input type="file" name="image" class="form-control">
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