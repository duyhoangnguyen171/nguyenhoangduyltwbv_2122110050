<?php
use App\Libraries\MyClass;
use App\Models\User; 
 $id= $_REQUEST['id'];
 $user= User::find($id);

 if($user==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=user&cat=trash");
 }
 
 $user->status = 2;

 $user->created_at = date('Y-m-d H:i:s');
 $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1 ;
 $user->save();
 MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
 header("location:index.php?option=user&cat=trash");