<?php
use App\Models\Menu;

$id= $_REQUEST['id'];
 $menu= Menu::find($id);

 if($menu==NULL)
 {
    header("location:index.php?option=menu");
 }

?>



<?php require_once '../views/backend/header.php' ;?>

      <!-- CONTENT -->
    <form action="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật menu</h1>
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
                        href="index.php?option=menu">Tất cả</a>
                        <a class="btn btn-sm btn-warning "
                         href="index.php?option=menu&cat=trash">
                         Thùng rác</a>
                     </div>
                     <div class="col-md-6 text-right ">
                     <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                     <a href="index.php?option=menu" class="btn btn-sm btn-info">
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
                           <input type="text" name="id" value="<?=$menu->id;?>" /><br>
                           <label>Tên menu</label>
                           <input type="text" value="<?=$menu->name;?>" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Link</label>
                           <input type="text" value="<?=$menu->link;?>" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Vị trí</label>
                           <textarea name="position" class="form-control"><?=$menu->position;?></textarea>
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


  