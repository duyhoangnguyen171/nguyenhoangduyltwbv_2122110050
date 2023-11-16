<?php
use App\Libraries\MyClass;
use App\Models\Menu; 
 $id= $_REQUEST['id'];
 $menu= Menu::find($id);

 if($menu==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=menu&cat=trash");
 }
 $menu->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=menu&cat=trash");
