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
 $brand->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa khổi csdl thành công','type'=>'success']);
 header("location:index.php?option=brand&cat=trash");
