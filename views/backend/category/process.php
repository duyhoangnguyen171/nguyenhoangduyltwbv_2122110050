<?php

use App\Models\Category;
use App\Libraries\MyClass;
if(isset($_POST['THEM']))
{
    $category=new Category();
    // laays tu form
    $category->name=$_POST['name'];
    $category->slug=(strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['name']);
    $category->description=$_POST['description'];
    $category->status=$_POST['status'];
    // xu ly uploadfile
    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir="../public/images/category/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg','jpeg','png','gif','webp']))
        {
            $fliename=$category->slug.'.'.$extension;
            move_uploaded_file($category->image=$_FILES['image']['tmp_name'], $target_dir . $fliename);
            $category->image= $fliename;
        }
    }
    
    
    // tu sinh ra
    $category->created_at = date ('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($category);
    
    
    // tu sinh ra
    $category->created_at = date ('Y-m-d H:i:s');
    $category->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($category);
    // luu vao csdl
    //insert to category
    $category->save();
    //chuyen huong trang index
    if($category->name==null)
    {
        MyClass::set_flash('message',['msg'=>'Hãy nhập giá trị cần thêm','type'=>'danger']);
        header("location:index.php?option=category");
       
    }else
    {
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
        header("location:index.php?option=category");
    }
}

if(isset($_POST['CAPNHAT']))
{
    $id=$_POST['id'];
    $category=Category::find($id);
    if($category==null)
    {
    MyClass::set_flash('message',['msg'=>'lỗi trang 404','type'=>'danger']);
    header("location:index.php?option=category");
    }
    // laays tu form
    $category->name=$_POST['name'];
    $category->slug=(strlen($_POST['slug'])>0)?$_POST['slug']:MyClass::str_slug($_POST['name']);
    $category->description=$_POST['description'];
    $category->status=$_POST['status'];
    // xu ly uploadfile
    if(strlen($_FILES['image']['name'])>0)
    {
        //xoa hinh cu


        //them hinh moi
        $target_dir="../public/images/category/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg','jpeg','png','gif','webp']))
        {

            $fliename=$category->slug.'.'.$extension;
            move_uploaded_file($category->image=$_FILES['image']['tmp_name'], $target_dir . $fliename);
            $category->image= $fliename;
        }
    }
    
    
    // // tu sinh ra
    $category->updated_at = date ('Y-m-d H:i:s');
    $category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($category);
    // luu vao csdl
    //insert to category
    $category->save();
    // chuyen huong trang index
    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=category");
}