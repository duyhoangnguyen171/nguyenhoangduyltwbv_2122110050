<?php

use App\Libraries\MyClass;
?>
<?php if(MyClass::has_flash('message')):?>
    <?php $arr = MyClass:: get_flash('message');?>
    <div class="alert alert-<?=$arr['type'];?>">
 
    <strong>Thông báo!</strong>  <?= $arr['msg']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif;

