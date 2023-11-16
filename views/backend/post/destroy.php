<?php
use App\Libraries\MyClass;
use App\Models\Post; 
 $id= $_REQUEST['id'];
 $post= Post::find($id);

 if($post==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=post&cat=trash");
 }
 $post->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=post&cat=trash");
