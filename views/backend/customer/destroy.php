<?php
use App\Libraries\MyClass;
use App\Models\Customer; 
 $id= $_REQUEST['id'];
 $customer= Customer::find($id);

 if($customer->name==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=customer&cat=trash");
 }
 $customer->delete();//xoas khỏi csdl
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=customer&cat=trash");
