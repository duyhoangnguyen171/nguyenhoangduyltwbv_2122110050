<?php

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = Contact::find($id);

if ($contact == NULL) {
   header("location:index.php?option=contact");
}

?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật contact</h1>
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
                     <a class="btn btn-sm btn-info " href="index.php?option=contact">Tất cả</a>
                     <a class="btn btn-sm btn-warning " href="index.php?option=contact&cat=trash">
                        Thùng rác</a>
                  </div>
                  <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                        <input type="text" name="id" value="<?= $contact->id; ?>" class="form-control" />
                     </div>
                     <div class="mb-3">
                        <label>Họ và tên</label>
                        <input type="text" value="<?= $contact->name; ?>" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điên thoại</label>
                        <input type="text" value="<?= $contact->phone; ?>" name="phone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" value="<?= $contact->email; ?>" name="email" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Tiêu đề</label>
                        <input type="text" value="<?= $contact->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết</label>
                        <input type="text" value="<?= $contact->content; ?>" name="content" class="form-control">
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