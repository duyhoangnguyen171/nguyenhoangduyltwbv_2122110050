<?php
use App\Libraries\MyClass;
 use App\Models\Brand; 
 $id= $_REQUEST['id'];
 $brand= Brand::find($id);

 if($brand==NULL)
 {
   MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=brand&cat=trash");
 }
 
 $brand->status = 2;

 $brand->created_at = date('Y-m-d H:i:s');
 $brand->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
 $brand->save();
 MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
 header("location:index.php?option=brand&cat=trash");