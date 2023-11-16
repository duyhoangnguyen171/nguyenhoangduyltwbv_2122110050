<?php

use App\Models\Post;
//SELECT * FROM category WHERE  status!=0 AND .... ORDERBY create_by DESC
//status==1 --> hiện trang người dùng
//status==2 --> không hiện
//status==0 --> rác
$list = Post::where('status', '!=', 0)
   ->orderBY('created_at', 'DESC')
   ->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả bài viết</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               <div class="row">
               <div class="col-md-6">
                  <a class="btn btn-sm btn-info " href="index.php?option=post">Tất cả</a>
                  <a class="btn btn-sm btn-warning " href="index.php?option=post&cat=trash">
                     Thùng rác</a>
               </div>
               <div class="col-md-6 text-right">
                  <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
               </div>
               </div>
            </div>
            <div class="card-body p-2">
               <?php require_once '../views/backend/message.php'; ?>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Tiêu đề bài viết</th>
                        <th>Tên danh mục</th>
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
                                 <img class="img-fluid w-100" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $item->title; ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($item->status == 1) : ?>
                                       <a href="index.php?option=post&cat=status&id=<?= $item->id; ?>" class="btn btn-success btn-xs">
                                          <i class="fas fa-toggle-on"></i> Hiện</a>
                                    <?php else : ?>
                                       <a href="index.php?option=post&cat=status&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                          <i class="fas fa-toggle-on"></i> Ẩn</a>
                                    <?php endif; ?>
                                    <a href="index.php?option=post&cat=edit&id=<?= $item->id; ?>" class="btn btn-warning btn-xs">
                                       <i class="fas fa-edit"></i> Chỉnh sửa</a>
                                    <a href="index.php?option=post&cat=show&id=<?= $item->id; ?>" class="btn btn-info btn-xs">
                                       <i class="fas fa-eye"></i> Chi tiết</a>
                                    <a href="index.php?option=post&cat=delete&id=<?= $item->id; ?>" class="btn btn-danger btn-xs">
                                       <i class="fas fa-trash"></i> Xoá</a>
                                 </div>
                              </td>
                              <td><?= $item->slug; ?></td>
                           </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>