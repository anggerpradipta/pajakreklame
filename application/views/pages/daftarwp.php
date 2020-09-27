        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Daftar Wajib Pajak/</small></h1>
          </div>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-gray-200">
                    <tr style="font-size: 14px;">
                      <th class="border-bottom-primary">No. Formulir</th>
                      <th class="border-bottom-primary">Email</th>
                      <th class="border-bottom-primary">Nama Instansi</th>
                      <th class="border-bottom-primary">Alamat Instansi</th>
                      <th class="border-bottom-primary">No Telp Instansi</th>
                      <th class="border-bottom-primary">Kode Pos Instansi</th>
                      <th class="border-bottom-primary">No Surat Izin</th>
                      <th class="border-bottom-primary">Tanggal Reg</th>
                      <th class="border-bottom-primary">Bidang Usaha</th>
                      <th class="border-bottom-primary">Nama Pemilik</th>
                      <th class="border-bottom-primary">Jabatan</th>
                      <th class="border-bottom-primary">Alamat Pemilik</th>
                      <th class="border-bottom-primary">No Telp Pemilik</th>
                      <th class="border-bottom-primary">Kode Pos Pemilik</th>
                      <th class="border-bottom-primary">NPWP</th>                      
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th class="border-bottom-primary" style="width: 70px;">Aksi</th>
                      <?php
                        } 
                        else 
                        {
                          // code ...
                        }
                      ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="font-size: 14px;">
                      <th>No. Formulir</th>
                      <th>Email</th>
                      <th>Nama Instansi</th>
                      <th>Alamat Instansi</th>
                      <th>No Telp Instansi</th>
                      <th>Kode Pos Instansi</th>
                      <th>No Surat Izin</th>
                      <th>Tanggal Reg</th>
                      <th>Bidang Usaha</th>
                      <th>Nama Pemilik</th>
                      <th>Jabatan</th>
                      <th>Alamat Pemilik</th>
                      <th>No Telp Pemilik</th>
                      <th>Kode Pos Pemilik</th>
                      <th>NPWPD</th>
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th style="width: 70px;">Aksi</th>
                      <?php
                        } 
                        else 
                        {
                          // code ...
                        }
                      ?>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      foreach ($data as $sdataWP) {
                    ?>
                      <tr style="font-size: 12px; text-align: center;">
                        <td><?= $sdataWP['no_formulir'];?></td>
                        <td><?= $sdataWP['email'];?></td>
                        <td><?= $sdataWP['nama_instansi'];?></td>
                        <td><?= $sdataWP['alamat_instansi'];?></td>
                        <td><?= $sdataWP['notelp_instansi'];?></td>
                        <td><?= $sdataWP['kodepos_instansi'];?></td>
                        <td><?= $sdataWP['no_suratizin_instansi'];?></td>
                        <td><?= $sdataWP['tgl'];?></td>
                        <td><?= $sdataWP['bidang_usaha'];?></td>
                        <td><?= $sdataWP['nama_pemilik'];?></td>
                        <td><?= $sdataWP['jabatan'];?></td>
                        <td><?= $sdataWP['alamat_pemilik'];?></td>
                        <td><?= $sdataWP['notelp_pemilik'];?></td>
                        <td><?= $sdataWP['kodepos_pemilik'];?></td>
                        <td><?= $sdataWP['npwpd'];?></td>
                        
                        <?php
                          if ($_SESSION['role'] == 'ADMIN') 
                          {
                        ?>
                        <td>
                          <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapusModal<?= $sdataWP['id_wp'];?>">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash" style="font-size: 14px;"></i>
                            </span>
                            <!-- <span class="text">Hapus</span> -->
                          </a>
                        </td>
                        <?php
                          } 
                          else 
                          {
                            // code ...
                          }
                        ?>
                      </tr>

                      <div class="modal fade" id="hapusModal<?= $sdataWP['id_wp'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus data <?= $sdataWP['no_formulir'];?> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Hapus" untuk menghapus data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-warning" href="<?= base_url('Core_actor/hapusWP/'.$sdataWP['id_wp']);?>">Hapus</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
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
