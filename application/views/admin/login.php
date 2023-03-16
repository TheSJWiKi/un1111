<div class="container">
  <!-- Outer Row: -->
  <div class="row justify-content-center align-items-center h-100-vh">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body: -->
          <div class="row">
            <div class="col-12">
              <form class="user" method="post" action="<?php echo env_url(); ?>admin/actions/user/login">
                <div class="response-message">
                  <?php echo alert_message(); ?>
                </div>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                  <!-- /.text-center -->
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" name="email_address" placeholder="Email Address" required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="InputPassword" name="password" placeholder="Password" required>
                  </div>
                  <!-- /.form-group -->
                  <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo env_url(); ?>admin/forgot_password">Forgot Password?</a>
                  </div>
                  <!-- /.text-center -->
                </div>
                <!-- /.p-5 -->
              </form>
            </div>
            <!-- /col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->