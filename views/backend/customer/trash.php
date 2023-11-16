<?php

use App\Models\Customer;
//SELECT * FROM category WHERE  status!=0 AND .... ORDERBY create_by DESC
//status==1 --> hiện trang người dùng
//status==2 --> không hiện
//status==0 --> rác
$list = Customer::where('status', '=', 0)
   ->orderBY('created_at', 'DESC')
   ->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả thành viên</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-6 text-left">
                  <a class="btn btn-sm btn-info " href="index.php?option=customer">Tất cả</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=customer&cat=create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <?php require_once '../views/backend/message.php'; ?>
            <table class="table table-bordered" id="mytable">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th class="text-center" style="width:130px;">Hình ảnh</th>
                     <th>Họ tên</th>
                     <th>Điện thoại</th>
                     <th>Email</th>
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
                              <img class="img-fluid w-100" src="../public/images/customer<?= $item->image; ?>" alt="<?= $item->image; ?>">
                           </td>
                           <td>
                              <div class="name">
                                 <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                                 <a href="index.php?option=customer&cat=restore&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                    <i class="fas fa-eye"></i> Khôi phục</a>
                                 <a href="index.php?option=customer&cat=destroy&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                    <i class="fas fa-trash"></i> Xóa vĩnh viễn</a>
                              </div>
                           </td>
                           <td><?= $item->phone; ?></td>
                           <td><?= $item->email; ?></td>
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
<?php require_once '../views/backend/footer.php'; ?>