<?php
use App\Models\Category;
use App\Libraries\MyClass;
$id=$_REQUEST['id'];
$category=Category::find($id);
if($category==null)
{
    header("location:index.php?option=category&cat=trash");
}
$category->delete();// xoa khoi database
MyClass::set_flash('message',['msg'=>'Xóa khỏi CSDL thành công','type'=>'success']);
header("location:index.php?option=category&cat=trash");