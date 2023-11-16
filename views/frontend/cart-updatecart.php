<?php
use App\Libraries\Cart;

if (isset($_POST['qty']) && is_array($_POST['qty'])) {
    $arr_qty = $_POST['qty'];

    foreach ($arr_qty as $id => $qty) {
        // Đảm bảo $qty được đặt trước khi cập nhật giỏ hàng
        if (isset($qty)) {
            Cart::updateCart($id, $qty);
        }
    }

    header("location: index.php?option=cart");
} else {
    // Xử lý trường hợp khi 'qty' không được đặt trong $_POST hoặc không phải là mảng
    echo "Dữ liệu số lượng không hợp lệ.";
}