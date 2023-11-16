<?php

use App\Models\Customer;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $customer = new Customer();
   if ($customer == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=category");
   }
   //lấy từ form
   if (($_POST['name']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=customer&cat=create");
   } else {
      $customer->name = $_POST['name'];
      $customer->customername = $_POST['customername'];
      $customer->email = $_POST['email'];
      $customer->gender = $_POST['gender'];
      $customer->phone = $_POST['phone'];
      $customer->address = $_POST['address'];
      $customer->status = $_POST['status'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/customer/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $customer->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
         }
      }
      //tự sinh ra
      $customer->created_at = date('Y-m-d H:i:s');
      $customer->created_by = (isset($_SESSION['customer_id'])) ? $_SESSION['customer_id'] : 1;
      var_dump($customer);
      //lưu vào CSDL
      //INSERT INTO ...
      $customer->save();
      //huyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=customer");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $customer = Customer::find($id);
   if ($_POST['name'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=customer");
   } else {
      //lấy từ form
      $customer->name = $_POST['name'];
      $customer->customername = $_POST['customername'];
      $customer->email = $_POST['email'];
      $customer->gender = $_POST['gender'];
      $customer->phone = $_POST['phone'];
      $customer->address = $_POST['address'];
      $customer->status = $_POST['status'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/customer/";
         unlink($target_dir . $data['image']);
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $customer->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $customer->image = $filename;
         }
      }
      //tự sinh ra
      $customer->updated_at = date('Y-m-d H:i:s');
      $customer->updated_by = (isset($_SESSION['customer_id'])) ? $_SESSION['customer_id'] : 1;
      var_dump($customer);
      //lưu vào CSDL
      //INSERT INTO ...
      $customer->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhât thành công', 'type' => 'success']);
      header("location:index.php?option=customer");
   }
}
