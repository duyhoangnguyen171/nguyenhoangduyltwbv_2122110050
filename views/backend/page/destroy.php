<?php
use App\Libraries\MyClass;
use App\Models\Page; 
 $id= $_REQUEST['id'];
 $page= Page::find($id);

 if($page==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=page&cat=trash");
 }
 $page->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=page&cat=trash");
