<div class="container">
  <!-- Outer Row: -->
  <div class="row justify-content-center align-items-center h-100-vh">
    <div class="col-xl-5 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body: -->
          <div class="row">
            <div class="col-12">
              <form class="user" method="post" action="<?php echo env_url(); ?>admin/actions/user/forgot_password">
                <div class="response-message"></div>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Forgot Password?</h1>
                    <p class="mb-4">We get it, stuff happens. Just enter your email address below and we'll send you a link to reset your password!</p>
                  </div>
                  <!-- /.text-center -->
                  
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="InputEmail" aria-describedby="emailHelp" placeholder="Email Address" name="email_address" required>
                    </div>
                    <!-- /.form-group -->
                    <button type="submit" class="btn btn-primary btn-user btn-block">Reset Password</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?php echo env_url(); ?>admin">Already have an account? Login</a>
                  </div>
                  <!-- /.text-center -->
                </div>
                <!-- /.p-5 -->
              </div>
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