<?php

use App\Models\Product;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
   $product = new Product();
   if ($product == NULL) {
      MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
      header("location:index.php?option=category");
   }
   //lấy từ form
   if (($_POST['name']) == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=product&cat=create");
   } else {
      $product->name = $_POST['name'];
      $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
      $product->detail = $_POST['detail'];
      $product->status = $_POST['status'];
      $product->brand_id = $_POST['brand_id'];
      $product->category_id = $_POST['category_id'];
      $product->price = $_POST['price'];
      $product->pricesale = $_POST['pricesale'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/product/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $product->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
         }
      }
      //tự sinh ra
      $product->created_at = date('Y-m-d H:i:s');
      $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($product);
      //lưu vào CSDL
      //INSERT INTO ...
      $product->save();
      //huyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
      header("location:index.php?option=product");
   }
}

if (isset($_POST['CAPNHAT'])) {

   $id = $_POST['id'];
   $product = product::find($id);
   if ($_POST['name'] == NULL) {
      MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
      header("location:index.php?option=product");
   } else {
      //lấy từ form
      $product->name = $_POST['name'];
      $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
      $product->detail = $_POST['detail'];
      $product->status = $_POST['status'] ?? 1;
      $product->brand_id = $_POST['brand_id'];
      $product->category_id = $_POST['category_id'];
      $product->price = $_POST['price'];
      $product->pricesale = $_POST['pricesale'];
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         $target_dir = "../public/images/product/";
         unlink($target_dir . $data['image']);
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $product->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
         }
      }
      //tự sinh ra
      $product->updated_at = date('Y-m-d H:i:s');
      $product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($product);
      //lưu vào CSDL
      //INSERT INTO ...
      $product->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhât thành công', 'type' => 'success']);
      header("location:index.php?option=product");
   }
}
