<?php

use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;
use App\Models\Page;
use App\Libraries\MyClass;
use App\Libraries\Mystring;
use App\Libraries\MessageArt;

if (isset($_POST['THEMCATEGORY'])) {
   if (isset($_POST['categoryId'])) {
      $listid = $_POST['categoryId'];
      foreach ($listid as $id) {
         $category = Category::find($id);
         $menu = new Menu;

         //lấy từ form
         $menu->name = $category->name;
         $menu->link = 'index.php?option=product&cat=' . $category->slug;
         $menu->type = 'category';
         //xử lí upload file hình ảnh
         //tự sinh ra
         $menu->table_id = $category->id;
         $menu->sort_order = 1;
         $menu->status = 2;
         $menu->position = $_POST['position'];
         $menu->parent_id = 0;
         $menu->created_at = date('Y-m-d H:i:s');
         $menu->created_by = 1;

         $menu->save();
         //chuyển hướng về index

      }
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=menu");
   } else {
      MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn danh much']);
      header("location:index.php?option=menu");
   }
}
if (isset($_POST['THEMBRAND'])) {
   if (isset($_POST['brandId'])) {
      $listid = $_POST['brandId'];
      foreach ($listid as $id) {
         $brand = Brand::find($id);
         $menu = new Menu;

         //lấy từ form
         $menu->name = $brand->name;
         $menu->link = 'index.php?option=brand&cat=' . $brand->slug;
         $menu->type = 'brand';
         //xử lí upload file hình ảnh
         //tự sinh ra
         $menu->table_id = $brand->id;
         $menu->sort_order = 1;
         $menu->status = 2;
         $menu->position = $_POST['position'];
         $menu->parent_id = 0;
         $menu->created_at = date('Y-m-d H:i:s');
         $menu->created_by = 1;
         $menu->save();
      }
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=menu");
   } else { //chuyển hướng về index
      MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn thương hiệu']);
      header("location:index.php?option=menu");
   }
}

if (isset($_POST['THEMTOPIC'])) {
   if (isset($_POST['topicId'])) {
      $listid = $_POST['topicId'];
      foreach ($listid as $id) {
         $topic = Topic::find($id);
         $menu = new Menu;

         //lấy từ form
         $menu->name = $topic->name;
         $menu->link = 'index.php?option=topic&cat=' . $topic->slug;
         $menu->type = 'topic';
         //xử lí upload file hình ảnh
         //tự sinh ra
         $menu->table_id = $topic->id;
         $menu->sort_order = 1;
         $menu->status = 2;
         $menu->position = $_POST['position'];
         $menu->parent_id = 0;
         $menu->created_at = date('Y-m-d H:i:s');
         $menu->created_by = 1;
         $menu->save();
      }
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=menu");
   } else {
      MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn chủ đề']);
      header("location:index.php?option=menu");
   }
}

if (isset($_POST['THEMPAGE'])) {
   if (isset($_POST['pageId'])) {
      $listid = $_POST['pageId'];
      foreach ($listid as $id) {
         $page = Post::find($id);
         $menu = new Menu;

         //lấy từ form
         $menu->name = $page->title;
         $menu->link = 'index.php?option=page&cat=' . $page->slug;
         $menu->type = 'page';
         //xử lí upload file hình ảnh
         //tự sinh ra
         $menu->table_id = $page->id;
         $menu->sort_order = 1;
         $menu->status = 2;
         $menu->position = $_POST['position'];
         $menu->parent_id = 0;
         $menu->created_at = date('Y-m-d H:i:s');
         $menu->created_by = 1;
         $menu->save();
      }
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=menu");
   } else {
      MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa chọn trang đơn']);
      header("location:index.php?option=menu");
   }
}
if (isset($_POST['THEMCUSTOM'])) {

   if(strlen($_POST['name'])> 0 && strlen($_POST['link'])>0){
      $menu = new Menu;

      //lấy từ form
      $menu->name = $_POST['name'];
      $menu->link =  $_POST['link'];
      $menu->type = 'custom';
      //xử lí upload file hình ảnh
      //tự sinh ra
      $menu->sort_order = 1;
      $menu->status = 2;
      $menu->position = $_POST['position'];
      $menu->parent_id = 0;
      $menu->created_at = date('Y-m-d H:i:s');
      $menu->created_by = 1;
      $menu->save();
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=menu");
   }
   else{
      MyClass::set_flash('message', ['type' => 'danger', 'msg' => 'Chưa đủ thông tin']);
   header("location:index.php?option=menu");
   }
   
}


// if (isset($_POST['CAPNHAT'])) {

//    $id = $_POST['id'];
//    $menu = Menu::find($id);
//    if ($menu == NULL) {
//       header("location:index.php?option=menu");
//    }
//    if ($_POST['name'] == NULL) {
//       MyClass::set_flash('message', ['msg' => 'Cập nhật thất bại', 'type' => 'danger']);
//       header("location:index.php?option=menu");
//    } else {
//       //lấy từ form
//       $menu->name = $_POST['name'];
//       $menu->link = $_POST['link'];
//       $menu->position = $_POST['position'];
//       //xử lí upload file hình ảnh
//       //tự sinh ra
//       $menu->updated_at = date('Y-m-d H:i:s');
//       $menu->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
//       var_dump($menu);
//       //lưu vào CSDL
//       //INSERT INTO ...
//       $menu->save();
//       //chuyển hướng về index
//       MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
//       header("location:index.php?option=menu");
//    }
// }
