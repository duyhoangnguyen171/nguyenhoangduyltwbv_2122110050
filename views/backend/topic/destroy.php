<?php

use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::find($id);

if ($topic == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=topic&cat=trash");
}
$topic->delete(); //xoas khỏi csdl
MyClass::set_flash('message', ['msg' => 'Xóa thành công', 'type' => 'success']);
header("location:index.php?option=topic&cat=trash");
