<?php
use App\Models\Order;

$id= $_REQUEST['id'];
$order= Order::find($id);

if($order==NULL)
{
   header("location:index.php?option=order&cat=trash");
}
?>



<?php require_once '../views/backend/header.php' ;?>

      <!-- CONTENT -->
  <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thương hiệu</h1>
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
                     <a href="index.php?option=order" class="btn btn-sm btn-info">
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
                                 <td><?=$order->id?></td>
                              </tr>
                              <tr>
                                 <td>user_id</td>
                                 <td><?=$order->user_id?></td>
                              </tr>
                              <tr>
                                 <td>deliveryaddress</td>
                                 <td><?=$order->deliveryaddress?></td>
                              </tr>
                              <tr>
                                 <td>deliveryname</td>
                                 <td><?=$order->deliveryname?></td>
                              </tr>
                              <tr>
                                 <td>deliveryphone</td>
                                 <td><?=$order->deliveryphone?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>deliveryemail</td>
                                 <td><?=$order->deliveryemail?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>note</td>
                                 <td><?=$order->note?></td>
                              </tr>
                              <tr>                        
                              <tr>
                                 <td>created_at</td>
                                 <td><?=$order->created_at?></td>
                              </tr>                             
                              <tr>
                                 <td>updated_at</td>
                                 <td><?=$order->updated_at?></td>
                              </tr>
                              <tr>
                                 <td>updated_by</td>
                                 <td><?=$order->updated_by?></td>
                              </tr>
                                 <td>status</td>
                                 <td><?=$order->status?></td>
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

<?php require_once '../views/backend/footer.php' ;?>


  