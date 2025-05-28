<?php $__env->startSection('main-content'); ?>

<div class="card">
    <h5 class="card-header">Kategori Düzenle</h5>
    <div class="card-body">
      <form method="post" action="<?php echo e(route('category.update',$category->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Başlık <span class="text-danger">*</span></label>
          <input id="inputTitle" type="text" name="title" placeholder="Başlık girin"  value="<?php echo e($category->title); ?>" class="form-control">
          <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
          <label for="summary" class="col-form-label">Özet</label>
          <textarea class="form-control" id="summary" name="summary"><?php echo e($category->summary); ?></textarea>
          <?php $__errorArgs = ['summary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
          <label for="is_parent">Ana Kategori mi?</label><br>
          <input type="checkbox" name='is_parent' id='is_parent' value='<?php echo e($category->is_parent); ?>' <?php echo e((($category->is_parent==1)? 'checked' : '')); ?>> Evet
        </div>
      <div class="form-group <?php echo e((($category->is_parent==1) ? 'd-none' : '')); ?>" id='parent_cat_div'>
          <label for="parent_id">Üst Kategori</label>
          <select name="parent_id" class="form-control">
              <option value="">--Kategori seçin--</option>
              <?php $__currentLoopData = $parent_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$parent_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value='<?php echo e($parent_cat->id); ?>' <?php echo e((($parent_cat->id==$category->parent_id) ? 'selected' : '')); ?>><?php echo e($parent_cat->title); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>

        <div class="form-group">
          <label for="inputPhoto" class="col-form-label">Fotoğraf</label>
          <div class="input-group">
              <span class="input-group-btn">
                  <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                  <i class="fa fa-picture-o"></i> Seç
                  </a>
              </span>
          <input id="thumbnail" class="form-control" type="text" name="photo" value="<?php echo e($category->photo); ?>">
        </div>
        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
          <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Durum <span class="text-danger">*</span></label>
          <select name="status" class="form-control">
              <option value="active" <?php echo e((($category->status=='active')? 'selected' : '')); ?>>Aktif</option>
              <option value="inactive" <?php echo e((($category->status=='inactive')? 'selected' : '')); ?>>Pasif</option>
          </select>
          <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-danger"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Güncelle</button>
        </div>
      </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('backend/summernote/summernote.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="<?php echo e(asset('backend/summernote/summernote.min.js')); ?>"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
    $('#summary').summernote({
      placeholder: "Kısa açıklama yazın.....",
        tabsize: 2,
        height: 150
    });
    });
</script>
<script>
  $('#is_parent').change(function(){
    var is_checked=$('#is_parent').prop('checked');
    // alert(is_checked);
    if(is_checked){
      $('#parent_cat_div').addClass('d-none');
      $('#parent_cat_div').val('');
    }
    else{
      $('#parent_cat_div').removeClass('d-none');
    }
  })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Ecommerce-Laravel\Ecommerce-Laravel\resources\views/backend/category/edit.blade.php ENDPATH**/ ?>