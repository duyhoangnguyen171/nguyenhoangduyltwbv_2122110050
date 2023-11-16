<?php
use App\Models\Post;

$id= $_REQUEST['id'];
 $post= Post::find($id);

 if($post==NULL)
 {
    header("location:index.php?option=post");
 }

?>



<?php require_once '../views/backend/header.php' ;?>

      <!-- CONTENT -->
    <form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
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
                     <a class="btn btn-sm btn-info "
                        href="index.php?option=post">Tất cả</a>
                        <a class="btn btn-sm btn-warning "
                         href="index.php?option=post&cat=trash">
                         Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=post" class="btn btn-sm btn-info">
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
                           <input type="text" name="id" value="<?=$post->id;?>" /><br>
                           <label>Tiêu đề bài viết(*)</label>
                           <input type="text" value="<?=$post->title;?>" name="title" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Tên danh mục</label>
                           <input type="text" value="<?=$post->slug;?>" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label>Chi tiết</label>
                        <textarea name="detail" class="form-control"><?= $post->detail; ?></textarea>
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

<?php require_once '../views/backend/footer.php' ;?>


  