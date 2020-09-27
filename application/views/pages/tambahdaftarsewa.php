        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Daftar Sewa Reklame/Tambah Data/</small></h1>
            <a href="<?= base_url('Core_actor/dsewa');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Kembali</a>
          </div>

          <?= $this->session->flashdata('message');?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 border-bottom-primary bg-gray-200">
              <h6 class="m-0 font-weight-bold text-primary">Tambah Data</h6>
            </div>
            <div class="card-body">
              <form class="user" action="<?= base_url('Core_actor/insert_dsewa');?>" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="lokasi" id="Lokasi" placeholder="Lokasi">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control" name="jenis_reklame" required id="jenis_reklame" placeholder="Jenis Reklame">
                  </div>
                  <div class="col-sm-6">
                    <input type="number" class="form-control" name="harga" required id="Harga" placeholder="Harga">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="Number" class="form-control" name="masa_pajak" required id="masa_pajak" placeholder="Masa Pajak 1 (bulan)">
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control" name="jenis_sewa" required>
                      <option value="">Jenis Sewa</option>
                      <option value="Permanen">Permanen</option>
                      <option value="Insidentil">Insidentil</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="uraian" id="uraian" placeholder="Uraian">
                </div>
                <hr>
                <div class="row" >
                  <div class="col-xs-6" style="padding-left: 10px; width: 150px; text-align: center;">
                    &nbsp;
                    <button type="reset" class="btn btn-warning btn-user btn-block">
                      Reset
                    </button>
                  </div>
                  <div class="col-xs-6" style="padding-left: 10px; width: 150px; text-align: center;">
                    &nbsp;
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Simpan">
                      Simpan
                    </button>
                  </div>
                </div>
              </form>
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
