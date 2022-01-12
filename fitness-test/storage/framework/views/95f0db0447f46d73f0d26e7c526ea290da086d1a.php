<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card">
                <div class="card-header"><strong>Меню №1</strong></div>
                <div class="card-body">
                    <div id="app">
                        <Todolist></Todolist>
                    </div>
                    <div class="card-footer footer-edit card-footer-edit">
                        <button class="btn btn-sm btn-primary" type="submit"> Сохранить</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Назад</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.dashboard.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Desktop\fit\fitness-nutrition\fitness-test\resources\views/admin/dashboard/menu/menuOneEditForm.blade.php ENDPATH**/ ?>