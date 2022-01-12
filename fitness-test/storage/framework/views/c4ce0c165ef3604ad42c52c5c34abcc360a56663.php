<?php $__env->startSection('content'); ?>

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header"> Bootstrap Alerts
                      <div class="card-header-actions"><a class="card-header-action" href="http://coreui.io/docs/components/bootstrap-alerts/" target="_blank"><small class="text-muted">docs</small></a></div>
                    </div>
                    <div class="card-body">
                      <div class="alert alert-primary" role="alert">This is a primary alert—check it out!</div>
                      <div class="alert alert-secondary" role="alert">This is a secondary alert—check it out!</div>
                      <div class="alert alert-success" role="alert">This is a success alert—check it out!</div>
                      <div class="alert alert-danger" role="alert">This is a danger alert—check it out!</div>
                      <div class="alert alert-warning" role="alert">This is a warning alert—check it out!</div>
                      <div class="alert alert-info" role="alert">This is a info alert—check it out!</div>
                      <div class="alert alert-light" role="alert">This is a light alert—check it out!</div>
                      <div class="alert alert-dark" role="alert">This is a dark alert—check it out!</div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header"> Bootstrap Alerts<small>use<code>.alert-link</code> to provide links</small></div>
                    <div class="card-body">
                      <div class="alert alert-primary" role="alert">This is a primary alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-secondary" role="alert">This is a secondary alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-success" role="alert">This is a success alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-danger" role="alert">This is a danger alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-warning" role="alert">This is a warning alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-info" role="alert">This is a info alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-light" role="alert">This is a light alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                      <div class="alert alert-dark" role="alert">This is a dark alert with<a class="alert-link" href="#">an example link</a>. Give it a click if you like.</div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header"> Bootstrap Alerts<small>additional content</small></div>
                    <div class="card-body">
                      <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-lg-6">
                  <div class="card">
                    <div class="card-header"> Bootstrap Alerts<small>dismissing</small></div>
                    <div class="card-body">
                      <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.row-->
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Desktop\fit\fitness-nutrition\fitness-test\resources\views/admin/dashboard/notifications/alerts.blade.php ENDPATH**/ ?>