

    <div class="c-wrapper">

      <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
        <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show"><span class="c-header-toggler-icon"></span></button><a class="c-header-brand d-sm-none" href="#"><img class="c-header-brand" src="{{ url('/assets/brand/coreui-base.svg" width="97" height="46" alt="CoreUI Logo"></a>
        <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true"><span class="c-header-toggler-icon"></span></button>
        <?php
            use App\MenuBuilder\FreelyPositionedMenus;
            if(isset($appMenus['top menu'])){
                FreelyPositionedMenus::render( $appMenus['top menu'] , 'c-header-', 'd-md-down-none');
            }
        ?>
        <div class="c-subheader px-3">
          <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <?php $segments = ''; ?>
            <?php for($i = 1; $i <= count(Request::segments()); $i++): ?>
                <?php $segments .= '/'. Request::segment($i); ?>
                <?php if($i < count(Request::segments())): ?>
                    <li class="breadcrumb-item"><?php echo e(Request::segment($i)); ?></li>
                <?php else: ?>
                    <li class="breadcrumb-item active"><?php echo e(Request::segment($i)); ?></li>
                <?php endif; ?>
            <?php endfor; ?>
          </ol>
        </div>
    </header>
<?php /**PATH D:\Desktop\fit\fitness-nutrition\fitness-test\resources\views/admin/dashboard/shared/header.blade.php ENDPATH**/ ?>