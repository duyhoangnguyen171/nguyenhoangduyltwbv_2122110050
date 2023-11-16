<?php

use App\Models\Topic;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $topic = new Topic();
   //lấy từ form
   if (($_POST['name']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=topic");
   } else {
      $topic->name = $_POST['name'];
      $topic->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
      $topic->metadesc = $_POST['metadesc'];
      $topic->status = $_POST['status'];
      //tự sinh ra
      $topic->created_at = date('Y-m-d H:i:s');
      $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($topic);
      if ($topic->name == NULL) {
         header("location:index.php?option=topic");
      }

      //lưu vào CSDL
      //INSERT INTO ...
      $topic->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=topic");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $topic = Topic::find($id);
   if ($topic == NULL) {
      header("location:index.php?option=topic");
   }
   if (($_POST['name']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại!', 'type' => 'danger']);
      header("location:index.php?option=topic");
   } else {
      //lấy từ form
      $topic->name = $_POST['name'];
      $topic->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
      $topic->metadesc = $_POST['metadesc'];
      $topic->status = $_POST['status'];
      //tự sinh ra
      $topic->updated_at = date('Y-m-d H:i:s');
      $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($topic);
      //lưu vào CSDL
      //INSERT INTO ...
      $topic->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=topic");
   }
}
