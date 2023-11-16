<?php
use App\Libraries\MyClass;
use App\Models\Product; 
 $id= $_REQUEST['id'];
 $product= Product::find($id);

 if($product->name==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=product&cat=trash");
 }
 $product->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=product&cat=trash");
