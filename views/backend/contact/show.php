<?php
use App\Models\Contact;

$id= $_REQUEST['id'];
$contact= Contact::find($id);

if($contact==NULL)
{
   header("location:index.php?option=contact&cat=trash");
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
                     <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                                 <td><?=$contact->id?></td>
                              </tr>
                              <tr>
                                 <td>Name</td>
                                 <td><?=$contact->name?></td>
                              </tr>
                              <tr>
                                 <td>email</td>
                                 <td><?=$contact->email?></td>
                              </tr>
                              <tr>
                                 <td>phone</td>
                                 <td><?=$contact->phone?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>title</td>
                                 <td><?=$contact->title?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>content</td>
                                 <td><?=$contact->content?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>content</td>
                                 <td><?=$contact->content?></td>
                              </tr>
                              <tr>                        
                              <tr>
                                 <td>created_at</td>
                                 <td><?=$contact->created_at?></td>
                              </tr>                             
                              <tr>
                                 <td>updated_at</td>
                                 <td><?=$contact->updated_at?></td>
                              </tr>
                              <tr>
                              <tr>
                                 <td>updated_by</td>
                                 <td><?=$contact->updated_by?></td>
                              </tr>
                                 <td>status</td>
                                 <td><?=$contact->status?></td>
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


  