<?php
use App\Libraries\MyClass;
use App\Models\Product; 
 $id= $_REQUEST['id'];
 $product= Product::find($id);

 if($product==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product&cat=trash");
 }
 
 $product->status = 2;

 $product->created_at = date('Y-m-d H:i:s');
 $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
 $product->save();
 MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
 header("location:index.php?option=product&cat=trash");