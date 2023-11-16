<?php

use App\Models\Post;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $post = new Post();
   //lấy từ form
   if ($_POST['title'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Thêm thất bại', 'type' => 'danger']);
      header("location:index.php?option=post&cat=create");
   } else {
      $post->title = $_POST['title'];
      $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
      $post->detail = $_POST['detail'];
      $post->topic_id = $_POST['topic_id'];
      $post->type = $_POST['type'] ?? 'page';
      $post->status = $_POST['status'] ?? 1;
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/post/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
         }
      }
      //tự sinh ra
      $post->created_at = date('Y-m-d H:i:s');
      $post->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($post);
      //lưu vào CSDL
      //INSERT INTO ...
      $post->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=post");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $post = Post::find($id);
   if ($post == NULL) {
      header("location:index.php?option=post");
   }
   //lấy từ form
   if ($_POST['title'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=post");
   } else {
      $post->title = $_POST['title'];
      $post->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['title']);
      $post->detail = $_POST['detail'];
      $post->topic_id = $_POST['topic_id'];
      $post->type = $_POST['type'] ?? 'page';
      $post->status = $_POST['status'] ?? 1;
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/post/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $post->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $post->image = $filename;
         }
      }
      //tự sinh ra
      $post->updated_at = date('Y-m-d H:i:s');
      $post->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($post);
      //lưu vào CSDL
      //INSERT INTO ...
      $post->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=post");
   }
}
