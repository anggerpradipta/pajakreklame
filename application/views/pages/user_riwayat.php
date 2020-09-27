        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Riwayat Sewa/</small></h1>
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
                      <th class="border-bottom-primary">Jenis Reklame</th>
                      <th class="border-bottom-primary">Lokasi</th>       
                      <th class="border-bottom-primary">NPWPD</th>       
                      <th class="border-bottom-primary">Judul</th>     
                      <th class="border-bottom-primary">Ukuran</th> 
                      <th class="border-bottom-primary">Nilai Sewa</th>
                      <th class="border-bottom-primary">Total Pajak</th>
                      <th class="border-bottom-primary">Tanggal Mulai Sewa</th>
                      <th class="border-bottom-primary">Tanggal Selesai Sewa</th>   
                      <!-- <th class="border-bottom-primary">Total Bayar</th> -->
                      <th class="border-bottom-primary">Bukti Bayar</th>
                      <th class="border-bottom-primary">Tanggal Bayar</th>   
                      <th class="border-bottom-primary" style="width: 70px;">Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="font-size: 14px;">
                      <th>Nama Instansi</th>
                      <th>Jenis Reklame</th>
                      <th>Lokasi</th>   
                      <th>NPWPD</th>       
                      <th>Judul</th>     
                      <th>Ukuran</th> 
                      <th>Nilai Sewa</th>
                      <th>Total Pajak</th>
                      <th>Tanggal Mulai Sewa</th>
                      <th>Tanggal Selesai Sewa</th>   
                      <!-- <th>Total Bayar</th> -->
                      <th>Bukti Bayar</th>
                      <th>Tanggal Bayar</th>  
                      <th style="width: 160px;">Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      foreach ($data as $sdataSR) {
                    ?>
                      <tr style="font-size: 12px; text-align: center;">
                        <td><?= $sdataSR['nama_instansi'];?></td>
                        <td><?= $sdataSR['jenis_reklame'];?></td>
                        <td><?= $sdataSR['lokasi'];?></td>
                        <td><?= $sdataSR['npwpd'];?></td>
                        <td><?= $sdataSR['judul'];?></td>
                        <td><?= $sdataSR['ukuran'];?> m</td>
                        <td><?= "Rp " . number_format($sdataSR['jumlah_bayar'],0,',','.').".-";?></td>
                        <td><?= "Rp " . number_format($sdataSR['pajak'],0,',','.').".-";?></td>
                        <!-- <td><?= "Rp " . number_format(($sdataSR['pajak'] + $sdataSR['jumlah_bayar']),0,',','.').".-";?></td> -->
                        <td><?= date ('d M Y', strtotime ($sdataSR['tanggal_sewa']));?></td>
                        <td><?= date ('d M Y', strtotime ($sdataSR['tanggal_selesai_sewa']));?></td>
                        <td><a href="<?= base_url('bukti_bayar/'.$sdataSR['bukti_bayar']);?>" target="_blank"><img src="<?= base_url('bukti_bayar/'.$sdataSR['bukti_bayar']);?>" style="width: 50px; height: auto;"></a></td>
                        <td><?= $sdataSR['tanggal_bayar'];?></td>
                        
                        <?php
                            if ($sdataSR['status_verifikasi'] == 'Proses') {
                        ?>
                              <td>
                                <b style="color: red;">Pesanan Anda sedang diproses</b><br/>
                                <p><small>Silahkan Tunggu Verifikasi Dari Bagian Administrasi</small></p>
                              </td>
                        <?php
                            }
                            elseif ($sdataSR['status_verifikasi'] == 'Ditolak') {
                        ?>
                              <td>
                                <b style="color: red;">Pesanan Anda di Batalkan</b><br/>
                                <p><small>Karena jalan yang Anda pilih sudah digunakan, silahkan pesan kembali di jalan yang berbeda.</small></p>
                              </td>
                        <?php
                            }elseif ($sdataSR['status_verifikasi'] == 'No') {
                        ?>
                              <td>
                                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#Verifikasi<?= $sdataSR['id_pembayaran'];?>">
                                  <span class="icon text-white-50">
                                    <i class="fas fa-check-circle" style="font-size: 14px;"></i>
                                  </span>
                                  <span class="text">Verfikasi</span>
                                  <!-- <span class="text">Hapus</span> -->
                                </a>
                              </td>
                        <?php
                            } else {
                        ?>
                              <td>
                                <b>Sudah di verifikasi</b>
                              </td>
                        <?php
                            }                        ?>
                      </tr>

                      <div class="modal fade" id="Verifikasi<?= $sdataSR['id_pembayaran'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Verifikasi pembayaran untuk  <?= $sdataSR['jenis_reklame'];?> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?= form_open_multipart('Public_site/konfirmasi_up/'.$sdataSR['id_pembayaran']); ?>
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user" id="bank" name="bank" placeholder="Nama Bank">
                                </div>
                                <div class="form-group">
                                  <input type="text" class="form-control form-control-user" id="norek" name="norek" placeholder="Nomor Rekening">
                                </div>
                                <div class="form-group">
                                  <small>Upload bukti transfer (Max : 3Mb)</small><br/>
                                  <input type="file" id="images" name="images">
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                  Kirim
                                </button>
                                <hr>
                              </form>

                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
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
