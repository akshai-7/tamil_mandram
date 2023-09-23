<?php if (Session::has('success')) : ?>
    <div class="container" style="margin-top: 15px;">
        <div class="alert alert-success">
            <?php echo e(Session::get('success')); ?>

        </div>
    </div>
<?php endif; ?>


<?php if (Session::has('error')) : ?>
    <div class="container" style="margin-top: 15px;">
        <div class="alert alert-danger">
            <?php echo e(Session::get('error')); ?>

        </div>
    </div>
<?php endif; ?>
