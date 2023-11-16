<?php
use App\Models\Banner;

$id= $_REQUEST['id'];
 $banner= banner::find($id);

 if($banner==NULL)
 {
    header("location:index.php?option=banner");
 }

?>

<?php require_once '../views/backend/header.php' ;?>

      <!-- CONTENT -->
    <form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật banner</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6 text-left">
                     <a class="btn btn-sm btn-info text-left "
                  href="index.php?option=banner">Tất cả</a>
                  <a class="btn btn-sm btn-warning text-left"
                   href="index.php?option=banner&cat=trash">
                   Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=banner" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                     </a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once '../views/backend/message.php' ;?>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <input type="text" name="id" value="<?=$banner->id;?>" /><br>
                           <label>Tên banner (*)</label>
                           <input type="text" value="<?=$banner->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Hình ảnh</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>link (*)</label>
                           <input type="text" value="<?=$banner->link;?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vị trí (*)</label>
                           <input type="text" value="<?=$banner->position;?>" name="position" class="form-control">
                        </div>
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


  