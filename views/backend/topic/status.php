<?php

use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$topic = Topic::find($id);

if ($topic == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=topic");
}

$topic->status = ($topic->status == 1) ? 2 : 1;

$topic->created_at = date('Y-m-d H:i:s');
$topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$topic->save();
MyClass::set_flash('message', ['msg' => 'Thay đổi trang thái thành công', 'type' => 'success']);
header("location:index.php?option=topic");
