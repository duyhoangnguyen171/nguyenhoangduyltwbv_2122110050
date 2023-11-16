<?php

use App\Models\User;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $user = new User();
   if ($user == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=category");
   }
   //lấy từ form
   if (($_POST['name']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=user&cat=create");
   } else {
      $user->name = $_POST['name'];
      $user->username = $_POST['username'];
      $user->email = $_POST['email'];
      $user->gender = $_POST['gender'];
      $user->phone = $_POST['phone'];
      $user->roles = $_POST['roles'];
      $user->address = $_POST['address'];
      $user->status = $_POST['status'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/user/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $user->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
         }
      }
      //tự sinh ra
      $user->created_at = date('Y-m-d H:i:s');
      $user->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($user);
      //lưu vào CSDL
      //INSERT INTO ...
      $user->save();
      //huyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=user");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $user = User::find($id);
   if ($_POST['name'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=user");
   } else {
      //lấy từ form
      $user->name = $_POST['name'];
      $user->username = $_POST['username'];
      $user->email = $_POST['email'];
      $user->gender = $_POST['gender'];
      $user->phone = $_POST['phone'];
      $user->roles = $_POST['roles'];
      $user->address = $_POST['address'];
      $user->status = $_POST['status'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/user/";
         unlink($target_dir . $data['image']);
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $user->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
         }
      }
      //tự sinh ra
      $user->updated_at = date('Y-m-d H:i:s');
      $user->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($user);
      //lưu vào CSDL
      //INSERT INTO ...
      $user->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhât thành công', 'type' => 'success']);
      header("location:index.php?option=user");
   }
}
