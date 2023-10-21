<?php

use App\Models\Contact;
//select * from Contact where status!='0' and ... orderby created_at desc...
//status =1 --> hiện trang người dùng
// =2 --? không hiện
// =0 --> rác
$list = Contact::where('status', '!=', 0)
   ->select('status', 'id', 'phone', 'name', 'email', 'title')
   ->orderBy('created_at', 'DESC')
   ->get();

?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả liên hệ</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            Noi dung
         </div>
         <div class="card-body">
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th>Họ tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
                     <th>Tiêu đề</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($list) > 0) : ?>
                     <?php foreach ($list as $item) : ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                                 <?php if ($item->status == 1) : ?>
                                    <a class="text-success" href="index.php?option=product&cat=status*id= <?= $item->id; ?>">Hiện</a> |
                                 <?php else : ?>
                                    <a class="text-danger" href="index.php?option=product&cat=status*id= <?= $item->id; ?>">Ẩn</a> |
                                 <?php endif; ?>
                                 <a href="index.php?option=product&cat=edit&id= <?= $item->id; ?>">Chỉnh sửa</a> |
                                 <a href="index.php?option=product&cat=show&id= <?= $item->id; ?>">Chi tiết</a> |
                                 <a href="index.php?option=product&cat=delete&id= <?= $item->id; ?>">Xoá</a>
                              </div>
                           </td>
                           <td><?= $item->phone; ?></td>
                           <td><?= $item->email; ?></td>
                           <td><?= $item->title; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>