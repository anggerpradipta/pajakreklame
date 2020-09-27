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
                      <th class="border-bottom-primary">Nama Instansi</th>
                      <th class="border-bottom-primary">Nama Pemilik</th>
                      <th class="border-bottom-primary">NPWPD</th> 
                      <th class="border-bottom-primary">Jenis Reklame</th>       
                      <th class="border-bottom-primary">Judul</th>     
                      <th class="border-bottom-primary">Lokasi</th>     
                      <th class="border-bottom-primary">Ukuran</th> 
                      <th class="border-bottom-primary">Nilai Sewa</th>
                      <th class="border-bottom-primary">Pajak</th>   
                      <th class="border-bottom-primary">Tanggal Mulai Sewa</th>
                      <th class="border-bottom-primary">Tanggal Selesai Sewa</th>
                      <th class="border-bottom-primary">Bukti Bayar</th>
                      <th class="border-bottom-primary">Tanggal Bayar</th>   
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
                      <th>Nama Instansi</th>
                      <th>Nama Pemilik</th>
                      <th>NPWPD</th>
                      <th>Jenis Reklame</th>      
                      <th>Judul</th>       
                      <th>Lokasi</th>     
                      <th>Ukuran</th> 
                      <th>Nilai Sewa</th>
                      <th>Pajak</th>   
                      <th>Tanggal Mulai Sewa</th>
                      <th>Tanggal Selesai Sewa</th>
                      <th>Bukti Bayar</th>
                      <th>Tanggal Bayar</th>  
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th style="width: 160px;">Aksi</th>
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
                      foreach ($data as $sdataSR) {
                    ?>
                      <tr style="font-size: 12px; text-align: center;">
                        <td><?= $sdataSR['nama_instansi'];?></td>
                        <td><?= $sdataSR['nama_pemilik'];?></td>
                        <td><?= $sdataSR['npwpd'];?></td>
                        <td><?= $sdataSR['jenis_reklame'];?></td>
                        <td><?= $sdataSR['judul'];?></td>
                        <td><?= $sdataSR['lokasi'];?></td>
                        <td><?= $sdataSR['ukuran'];?></td>
                        <td><?= "Rp " . number_format($sdataSR['jumlah_bayar'],0,',','.').".-";?></td>
                        <td><?= "Rp " . number_format($sdataSR['pajak'],0,',','.').".-";?></td>
                        <!--<td><?= "Rp " . number_format(($sdataSR['pajak'] + $sdataSR['jumlah_bayar']),0,',','.').".-";?></td>-->
                        <td><?= date ('d M Y', strtotime ($sdataSR['tanggal_sewa']));?></td>
                        <td><?= date ('d M Y', strtotime ($sdataSR['tanggal_selesai_sewa']));?></td>
                        <td><a href="<?= base_url('bukti_bayar/'.$sdataSR['bukti_bayar']);?>" target="_blank"><img src="<?= base_url('bukti_bayar/'.$sdataSR['bukti_bayar']);?>" style="width: 50px; height: auto;"></a></td>
                        <td><?= $sdataSR['tanggal_bayar'];?></td>
                        
                        <?php
                          if ($_SESSION['role'] == 'ADMIN') 
                          {
                            if ($sdataSR['status_verifikasi'] == 'Proses') {
                        ?>
                              <td>
                                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#Setujui<?= $sdataSR['id_pembayaran'];?>">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check-circle" style="font-size: 14px;"></i>
                                  </span>
                                  <span class="text">Setujui</span>
                                  <!-- <span class="text">Hapus</span> -->
                                </a><hr/>
                                <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#Tolak<?= $sdataSR['id_pembayaran'];?>">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check-circle" style="font-size: 14px;"></i>
                                  </span>
                                  <span class="text">Tolak</span>
                                  <!-- <span class="text">Hapus</span> -->
                                </a>
                              </td>
                        <?php
                            } elseif ($sdataSR['status_verifikasi'] == 'Ditolak') {
                        ?>
                              <td>
                                <b style="color: red;">Pesanan Ditolak</b><br/>
                                <p><small>Karena jalan yang dipilih sudah digunakan.</small></p>
                              </td>
                        <?php
                            }
                            elseif ($sdataSR['status_verifikasi'] == 'No') {
                        ?>
                              <td>
                                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Verifikasi<?= $sdataSR['id_pembayaran'];?>">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check-circle" style="font-size: 14px;"></i>
                                  </span>
                                  <span class="text">Verifikasi</span>
                                  <!-- <span class="text">Hapus</span> -->
                                </a>
                              </td>
                        <?php
                            } else {
                        ?>
                              <td>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#DisVerifikasi<?= $sdataSR['id_pembayaran'];?>">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-times-circle" style="font-size: 14px;"></i>
                                  </span>
                                  <span class="text">Dis-Verifikasi</span>
                                  <!-- <span class="text">Hapus</span> -->
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

                      <div class="modal fade" id="Setujui<?= $sdataSR['id_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah No Formulir <?= $sdataSR['no_formulir'];?> akan diproses?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Setujui" untuk melanjutkan pembayaran pada data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-success" href="<?= base_url('Core_actor/setujui/'.$sdataSR['id_pembayaran']);?>">Setujui</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="Tolak<?= $sdataSR['id_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah No Formulir <?= $sdataSR['no_formulir'];?> akan ditolak?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Tolak" untuk memberikan informasi kepada pemesan bahwa pesanannya pada yang dipilih sudah digunakan!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-success" href="<?= base_url('Core_actor/tolak/'.$sdataSR['id_pembayaran']);?>">Tolak</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="Verifikasi<?= $sdataSR['id_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah Anda mem-Verifikasi pembayaran <?= $sdataSR['no_formulir'];?> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Verifikasi" untuk memverifikasi data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-success" href="<?= base_url('Core_actor/verifikasi/'.$sdataSR['id_pembayaran']);?>">Verifikasi</a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="DisVerifikasi<?= $sdataSR['id_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah Anda akan Dis-Verifikasi pembayaran <?= $sdataSR['no_formulir'];?> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Dis-Verifikasi" untuk membatalkan veridikasi data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-danger" href="<?= base_url('Core_actor/disverifikasi/'.$sdataSR['id_pembayaran']);?>">Dis-Verifikasi</a>
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
