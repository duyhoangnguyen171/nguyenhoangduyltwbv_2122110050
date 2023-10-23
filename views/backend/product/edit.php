<?php

use App\Models\Product;
use App\Libraries\MyClass;
//select * from product where status!='0' and ... orderby created_at desc...
//status =1 --> hiện trang người dùng
// =2 --? không hiện
// =0 --> rác
$id=$_REQUEST['id'];
$product=Product::find($id);
if($product==null)
{
   MyClass::set_flash('message',['msg'=>'lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product");
}

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
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
         <div class="card-header text-right">
            <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
               <i class="fa fa-save" aria-hidden="true"></i>
               Lưu
            </button>
            <a href="index.php?option=product" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <div class="mb-3">
                     <input type="hidden" name="id" value="<?=$product->id;?>">
                     <label>Tên danh mục (*)</label>
                     <input type="text" value="<?=$product->brand_id;?>" name="brand_id" class="form-control">
                  </div>
                  <div class="mb-3">
                     <input type="hidden" name="id" value="<?=$product->id;?>">
                     <label>Tên sản phẩmc (*)</label>
                     <input type="text" value="<?=$product->name;?>" name="name" class="form-control">
                  </div>
                  <div class="mb-3"> 
                     <label>Gía</label>
                     <input type="text" value="<?=$product->price;?>" name="price" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Mô tả</label>
                     <textarea name="description" class="form-control"><?=$product->description;?></textarea>
                  </div>
                  <div class="mb-3">
                     <label>Hình đại diện</label>
                     <input type="file" name="image" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Trạng thái</label>
                     <select name="status" class="form-control">
                        <option value="1"<?=($product->status==1)?'selected':'';?>>Xuất bản</option>
                        <option value="2"<?=($product->status==2)?'selected':'';?>>Chưa xuất bản</option>
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
<?php require_once "../views/backend/footer.php"; ?>