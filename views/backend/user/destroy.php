<?php
use App\Libraries\MyClass;
use App\Models\User; 
 $id= $_REQUEST['id'];
 $user= User::find($id);

 if($user->name==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=user&cat=trash");
 }
 $user->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=user&cat=trash");
