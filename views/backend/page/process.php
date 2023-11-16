<?php

use App\Models\Page;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $page = new Page();
   //lấy từ form
   if ($_POST['title'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Thêm thất bại', 'type' => 'danger']);
      header("location:index.php?option=page&cat=create");
   } else {
      $page->title = $_POST['title'] ?? 1;
      $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
      $page->detail = $_POST['detail'];
      $page->topic_id = $_POST['topic_id'];
      $page->type = $_POST['type'] ?? 'page';
      $page->status = $_POST['status'] ?? 1;
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/page/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $page->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
         }
      }
      //tự sinh ra
      $page->created_at = date('Y-m-d H:i:s');
      $page->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($post);
      //lưu vào CSDL
      //INSERT INTO ...
      $page->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=page");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $page = Page::find($id);
   if ($page == NULL) {
      header("location:index.php?option=post");
   }
   //lấy từ form
   if ($_POST['title'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=page");
   } else {
      $page->title = $_POST['title'];
      $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
      $page->detail = $_POST['detail'];
      $page->topic_id = $_POST['topic_id'];
      $page->type = $_POST['type'] ?? 'page';
      $page->status = $_POST['status'] ?? 1;
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/page/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $page->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $page->image = $filename;
         }
      }
      //tự sinh ra
      $page->updated_at = date('Y-m-d H:i:s');
      $page->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($post);
      //lưu vào CSDL
      //INSERT INTO ...
      $page->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=page");
   }
}
