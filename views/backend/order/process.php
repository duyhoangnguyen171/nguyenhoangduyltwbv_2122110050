<?php

use App\Models\Order;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $order = new Order();
   //lấy từ form
   if (($_POST['user_id']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Thêm thất bại', 'type' => 'danger']);
      header("location:index.php?option=order&cat=create");
   } else {
      $order->user_id = $_POST['user_id'];
      $order->deliveryaddress    = $_POST['deliveryaddress'];
      $order->deliveryname = $_POST['deliveryname'];
      $order->deliveryphone = $_POST['deliveryphone'];
      $order->deliveryemail = $_POST['deliveryemail'];
      $order->note = $_POST['note'];
      $order->status = $_POST['status']??1;
      //tự sinh ra
      $order->created_at = date('Y-m-d H:i:s');
      var_dump($order);
      //lưu vào CSDL
      //INSERT INTO ...

      $order->save();
      //huyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=order");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $order = order::find($id);
   if ($_POST['user_id'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=order");
   } else {
      //lấy từ form
      $order->user_id = $_POST['user_id'];
      $order->deliveryaddress    = $_POST['deliveryaddress'];
      $order->deliveryname = $_POST['deliveryname'];
      $order->deliveryphone = $_POST['deliveryphone'];
      $order->deliveryemail = $_POST['deliveryemail'];
      $order->note = $_POST['note'];
      $order->status = $_POST['status']??1;
      //tự sinh ra
      $order->updated_at = date('Y-m-d H:i:s');
      $order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($order);
      //lưu vào CSDL
      //INSERT INTO ...
      $order->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhât thành công', 'type' => 'success']);
      header("location:index.php?option=order");
   }
}
