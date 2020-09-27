<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-7 col-md-9">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Session!</h1>
                </div>

                <?= $this->session->flashdata('message');?>
                <form class="user" method="post" action="<?= base_url('Public_site/form_login');?>">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="email" name="email" required placeholder="Enter email...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    <?= form_error('password', '<small class="pl-3" style="color: red;">','</small>');?>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                  <hr>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('Public_site/lupapass')?>">Forgot Password?</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>