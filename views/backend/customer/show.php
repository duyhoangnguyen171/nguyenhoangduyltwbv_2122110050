<?php

use App\Models\Customer;

$id = $_REQUEST['id'];
$customer = Customer::find($id);

if ($customer == NULL) {
   header("location:index.php?option=customer&cat=trash");
}
?>



<?php require_once '../views/backend/header.php'; ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Chi tiết thành viên</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            <div class="row">
               <div class="col-md-12 text-right ">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Tên trường</th>
                           <th>giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>ID</td>
                           <td><?= $customer->id ?></td>
                        </tr>
                        <tr>
                           <td>Họ và tên</td>
                           <td><?= $customer->name ?></td>
                        </tr>
                        <tr>
                           <td>Tên đăng nhập</td>
                           <td><?= $customer->customername ?></td>
                        </tr>
                        <tr>
                           <td>Hình ảnh</td>
                           <td>
                              <img class="img-fluid w-100" src="../public/images/customer/<?= $customer->image; ?>" alt="<?= $customer->image; ?>">
                           </td>
                        </tr>
                        <tr>
                           <td>Email</td>
                           <td><?= $customer->email ?></td>
                        </tr>
                        <tr>
                           <td>Giới tính</td>
                           <td><?= $customer->gender ?></td>
                        </tr>
                        <tr>
                           <td>Điện thoại</td>
                           <td><?= $customer->phone ?></td>
                        </tr>
                        <tr>
                           <td>Địa chỉ</td>
                           <td><?= $customer->address ?></td>
                        </tr>
                        <tr>
                           <td>created_at</td>
                           <td><?= $customer->created_at ?></td>
                        </tr>
                        <tr>
                           <td>created_by</td>
                           <td><?= $customer->created_by ?></td>
                        </tr>
                        <tr>
                           <td>updated_at</td>
                           <td><?= $customer->updated_at ?></td>
                        </tr>
                        <tr>
                        <tr>
                           <td>updated_by</td>
                           <td><?= $customer->updated_by ?></td>
                        </tr>
                        <td>status</td>
                        <td><?= $customer->status ?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->

<?php require_once '../views/backend/footer.php'; ?>