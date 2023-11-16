T<?php

   use App\Models\Banner;
   use App\Libraries\MyClass;

   if (isset($_POST['CAPNHAT'])) {

      $id = $_POST['id'];
      $banner = Banner::find($id);
      if ($banner == NULL) {
         MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
         header("location:index.php?option=banner");
      }
      //lấy từ form
      $banner->name = $_POST['name'];
      $banner->link = $_POST['link'];
      $banner->position = $_POST['position'];
      $banner->status = $_POST['status'] ?? 1;
      //xử lí upload file hình ảnh
      if (strlen($_FILES['image']['name']) > 0) {
         //xóa hình cũ

         //thêm hình mới
         $target_dir = "../public/images/banner/";
         $target_file = $target_dir . basename($_FILES["image"]["name"]);
         $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
         if (in_array($extension, ['jpg', 'jpeg', 'png' . 'gif', 'webp'])) {
            $filename = $banner->slug . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $banner->image = $filename;
         }
      }
      //tự sinh ra
      $banner->updated_at = date('Y-m-d H:i:s');
      $banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
      var_dump($banner);
      //lưu vào CSDL
      //INSERT INTO ...
      $banner->save();
      //chuyển hướng về index
      MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
      header("location:index.php?option=banner");
   }
