        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home</small></h1>
            <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-6">
              <div class="row">
              <!-- Wajib Pajak Card  -->
                <div class="col-xl-6 col-md-6 mb-4">
                  <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Wajib Pajak</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumDataWP->jumwp;?> <small>Pengguna</small></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Lokasi -->
                <div class="col-xl-6 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lokasi Pemasangan Reklame</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumDataDSR->jumdsr;?> <small>Tempat</small></div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Content Row -->
              <div class="row">

                <!-- Content Column -->
                <div class="col-lg-12 mb-4">

                  <!-- Project Card Example -->
                  <!--<div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Layanan Pemasangan Iklan</h6>
                    </div>
                    <div class="card-body">
                      <h4 class="small font-weight-bold">FRM-000005 <span class="float-right">20% Pemasangan</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h4 class="small font-weight-bold">FRM-000004 <span class="float-right">40% Pemasangan</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h4 class="small font-weight-bold">FRM-000003 <span class="float-right">60% Pemasangan</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h4 class="small font-weight-bold">FRM-000002 <span class="float-right">80% Pemasangan</span></h4>
                      <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h4 class="small font-weight-bold">FRM-000001 <span class="float-right">Selesai!</span></h4>
                      <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>-->

                </div>
              </div>

            </div>

            <div class="row col-lg-6">
              <!-- Wajib Pajak Card  -->
              <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow mb-4" style="margin-right: -25px;">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Administrator</h6>
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?= base_url('vendor/');?>img/undraw_posting_photo.svg" alt="">
                    </div>
                    <p>Admin adalah pekerjaan dalam sebuah instansi atau perusahaan yang bersifat administratif atau bersifat teknis ketatausahaan tergantung dari perusahaan dalam bidang tertentu seperti mencakup data entry, filing, dsb.</p>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->