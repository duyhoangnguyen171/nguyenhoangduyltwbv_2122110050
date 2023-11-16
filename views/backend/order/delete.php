<?php
use App\Libraries\MyClass;
use App\Models\Order; 
 $id= $_REQUEST['id'];
 $order= Order::find($id);

 if($order==NULL)
 {
    MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=order");
 }
 
 $order->status = 0;

 $order->created_at = date('Y-m-d H:i:s');
 $order->save();
 MyClass::set_flash('message',['msg'=>'Xóa thành công','type'=>'success']);
 header("location:index.php?option=order");