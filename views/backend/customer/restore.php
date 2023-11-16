<?php
use App\Libraries\MyClass;
use App\Models\Customer; 
 $id= $_REQUEST['id'];
 $customer= Customer::find($id);

 if($customer==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=customer&cat=trash");
 }
 
 $customer->status = 2;

 $customer->created_at = date('Y-m-d H:i:s');
 $customer->created_by = (isset($_SESSION['customer_id'])) ? $_SESSION['customer_id'] : 1 ;
 $customer->save();
 MyClass::set_flash('message',['msg'=>'Khôi phục thành công','type'=>'success']);
 header("location:index.php?option=customer&cat=trash");