        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Daftar Sewa Reklame/</small></h1>
            <?php
              if ($_SESSION['role'] == 'ADMIN') 
              {
            ?>
              <a href="<?= base_url('Core_actor/tambah_dsewa');?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square fa-sm text-white-50"></i> Tambah Data</a>
            <?php
              } 
              else 
              {
                // code ...
              }
            ?>
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
                      <th class="border-bottom-primary">Kelas</th>
                      <th class="border-bottom-primary">Lokasi</th>
                      <th class="border-bottom-primary">Jenis Reklame</th>
                      <th class="border-bottom-primary">Harga</th>
                      <th class="border-bottom-primary">Masa Pajak</th>
                      <th class="border-bottom-primary">Jenis</th>
                      <th class="border-bottom-primary">Uraian</th>
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th class="border-bottom-primary">Aksi</th>
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
                      <th>Kelas</th>
                      <th>Lokasi</th>
                      <th>Jenis Reklame</th>
                      <th>Harga</th>
                      <th>Masa Pajak</th>
                      <th>Jenis</th>
                      <th style="width: 110px;">Uraian</th>
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th style="width: 110px;">Aksi</th>
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
                      foreach ($data as $sdataSewa) {
                    ?>
                      <tr style="font-size: 12px; text-align: center;">
                        <td><?= $sdataSewa['kelas'];?></td>
                        <td><?= $sdataSewa['lokasi'];?></td>
                        <td><?= $sdataSewa['jenis_reklame'];?></td>
                        <td><?= "Rp " . number_format($sdataSewa['harga'],0,',','.').".-";?></td>
                        <td><?= $sdataSewa['masa_pajak'];?> Bulan</td>
                        <td><?= $sdataSewa['jenis_sewa'];?></td>
                        <td><?= $sdataSewa['uraian'];?></td>
                        <?php
                          if ($_SESSION['role'] == 'ADMIN') 
                          {
                            if ($sdataSewa['status'] == 'Yes') {
                        ?>
                              <td>
                                <a href="<?= base_url('Core_actor/editds/'.$sdataSewa['id_daftar_sewa']);?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="left" title="Edit Data">
                                  <i class="fas fa-edit"></i>
                                </a>
                              </td>
                        <?php
                            } else {
                        ?>
                              <td>
                                <a href="<?= base_url('Core_actor/editds/'.$sdataSewa['id_daftar_sewa']);?>" class="btn btn-info btn-circle" data-toggle="tooltip" data-placement="left" title="Edit Data">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusModal<?= $sdataSewa['id_daftar_sewa'];?>">
                                  <i class="fas fa-trash"></i>
                                </a>
                              </td>
                        <?php
                            }
                          } 
                          else 
                          {
                            // code ...
                          }
                        ?>
                      </tr>

                      <div class="modal fade" id="hapusModal<?= $sdataSewa['id_daftar_sewa'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus data <b><?= $sdataSewa['jenis_reklame'];?></b> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Hapus" untuk menghapus data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-warning" href="<?= base_url('Core_actor/hapusDS/'.$sdataSewa['id_daftar_sewa']);?>">Hapus</a>
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
