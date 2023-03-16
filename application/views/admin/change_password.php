<div class="container">
  <!-- Outer Row: -->
  <div class="row justify-content-center align-items-center h-100-vh">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body: -->
          <div class="row">
            <div class="col-12">
              <form class="user" method="post" action="<?php echo env_url(); ?>admin/actions/user/change_password">
                <div class="response-message"></div>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Change Password</h1>
                    <p class="mb-4">You are near to reset your password, please fill the password input fields below:</p>
                  </div>
                  <!-- /.text-center -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="InputPassword" placeholder="Password" name="password" required>
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="InputConfirmPassword" placeholder="Confirm Password" name="c_password" required>
                  </div>
                  <!-- /.form-group -->
                  <input type="hidden" name="auth_token" value="<?php echo $token; ?>">
                  <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
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