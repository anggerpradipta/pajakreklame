        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Laporan/</small></h1>
          </div>
            
          <?= $this->session->flashdata('message');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Daftar Wajib Pajak</h6>
            </div>
            <div class="card-body" width="100%">
              <!-- <div class="row">
                <div class="col-md-2" style="padding-left: 50px;">
                  <img src="<?= base_url('logo/');?>madiun.png" style="width: 100px; height: auto;">
                </div>
                <div class="col-md-10">
                  <b style="font-size: 20px;">PEMERINTAHAN DAERAH KOTA MADIUN</b><br/>
                  <b style="font-size: 30px;">BADAN PENDAPATAN DAERAH</b>
                  <p>JL. SOEKARNO-HATTA NO.17 Madiun 63136 Jawa Timur<br/>No. Telp : (0351) 464085 Fax. : (0351) 464253 Email : bapenda17mdn@gmail.com</p>
                </div>
              </div> -->
              <img src="<?= base_url('logo/');?>kop1.png" style="width: 100%; height: auto; @media screen and (max-width: 600px) {display: none;}">
              <div class="table-responsive" style="padding-left: 5%; padding-right: 5%;">
                <b>LAPORAN :</b>
                <table class="table table-striped" style="margin-top: 30px;">
                  <thead>
                    <tr>
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
                      <th>Jawaban</th>
                      <th>Alamat Pemilik</th>
                      <th>No Telp Pemilik</th>
                      <th>Kode Pos Pemilik</th>
                      <th>NPWP</th>    
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($dataRJ as $laprj) {
                    ?>  
                        <tr>
                          <td><?= $laprj['no_formulir'];?></td>
                          <td><?= $laprj['email'];?></td>
                          <td><?= $laprj['nama_instansi'];?></td>
                          <td><?= $laprj['alamat_instansi'];?></td>
                          <td><?= $laprj['notelp_instansi'];?></td>
                          <td><?= $laprj['kodepos_instansi'];?></td>
                          <td><?= $laprj['no_suratizin_instansi'];?></td>
                          <td><?= $laprj['tgl'];?></td>
                          <td><?= $laprj['bidang_usaha'];?></td>
                          <td><?= $laprj['nama_pemilik'];?></td>
                          <td><?= $laprj['jabatan'];?></td>
                          <td><?= $laprj['alamat_pemilik'];?></td>
                          <td><?= $laprj['notelp_pemilik'];?></td>
                          <td><?= $laprj['kodepos_pemilik'];?></td>
                          <td><?= $laprj['npwpd'];?></td>
                        </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
                <div align="right" style="margin-top: 50px;">
                  <hr/>
                  <a href="<?= base_url('Core_actor/printWPpengguna/');?>" target="_blank" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                  </a>
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
