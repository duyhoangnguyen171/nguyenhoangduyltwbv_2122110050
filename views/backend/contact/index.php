<?php
use App\Models\Contact;
//SELECT * FROM category WHERE  status!=0 AND .... ORDERBY create_by DESC
//status==1 --> hiện trang người dùng
//status==2 --> không hiện
//status==0 --> rác
$list = Contact::where('status','!=',0)
  ->orderBY('created_at','DESC')
  ->get();
?>
<?php require_once '../views/backend/header.php';?>
      <!-- CONTENT -->
    <form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
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
               <div class="card-header ">
                     <div class="col-md-6 text-left">
                        <a class="btn btn-sm btn-info "
                        href="index.php?option=contact">Tất cả</a>
                        <a class="btn btn-sm btn-warning "
                         href="index.php?option=contact&cat=trash">
                         Thùng rác</a>
                     </div>
               </div>
               <div class="card-body">
               <?php require_once '../views/backend/message.php' ;?>
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th> Họ và tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Tiêu đề</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(count($list)>0):?>
                       <?php foreach($list as $item): ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                              <?= $item->name;?>
                              </div>
                              <div class="function_style">
                              <?php if($item->status==1):?>
                                       <a  href="index.php?option=contact&cat=status&id=<?= $item->id;?>" class="btn btn-success btn-xs" >
                                       <i class="fas fa-toggle-on"></i> Hiện</a>
                                       <?php else : ?>
                                       <a  href="index.php?option=contact&cat=status&id=<?= $item->id;?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-toggle-on"></i> Ẩn</a>
                                       <?php endif;?>
                                       <a  href="index.php?option=contact&cat=edit&id=<?= $item->id;?>" class="btn btn-warning btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa</a> 
                                       <a href="index.php?option=contact&cat=show&id=<?= $item->id;?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết</a> 
                                       <a href="index.php?option=contact&cat=delete&id=<?= $item->id;?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá</a>
                                    </div>
                           </td>
                           <td><?= $item->phone;?></td>
                           <td><?= $item->email;?></td>
                           <td><?= $item->content;?></td>
                        </tr>
                        <?php endforeach;?>
                              <?php endif;?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php';?>