        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Laporan/</small></h1>
          </div>
            
          <?= $this->session->flashdata('message');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Laporan Sewa Dan Pajak Reklame Per-Wilayah</h6>
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
                <form action="<?= base_url('Core_actor/lapPJwilayah');?>" method="post">
                  <div class="form-group">
                    <div class="input-group" style="width: 400px;">
                      <span class="input-group-addon" style="padding-top: 6px;">LAPORAN : </span>
                      <select class="form-control" name="kelas" style="margin-left: 10px;">
                        <option value=""> --- Pilih Wilayah / Kelas ---</option>
                        <option value="UTAMA">UTAMA</option>
                        <option value="GOL A">GOL A</option>
                        <option value="GOL B">GOL B</option>
                      </select>
                      <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Lihat</button>
                    </div>
                </form>
                <table class="table table-striped" style="margin-top: 30px;">
                  <thead>
                    <tr>
                      <th>No. Formulir</th>
                      <th>Nama Instansi</th>
                      <th>Nama Pemilik</th>
                      <th>NPWPD</th>
                      <th>Jenis Reklame</th>  
                      <th>Lokasi</th>  
                      <th>Judul</th>     
                      <th>Ukuran</th> 
                      <th>Nilai Sewa</th>
                      <th>Pajak</th>   
                      <!--<th>Total Bayar</th>-->
                      <th>Tanggal Mulai Sewa</th>  
                      <th>Tanggal Selesai Sewa</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $t_pendapatan = 0;
                      foreach ($dataRJ as $laprj) {
                    ?>  
                        <tr>
                          <td><?= $laprj['no_formulir'];?></td>
                          <td><?= $laprj['nama_instansi'];?></td>
                          <td><?= $laprj['nama_pemilik'];?></td>
                          <td><?= $laprj['jenis_reklame'];?></td>
                          <td><?= $laprj['lokasi'];?></td>
                          <td><?= $laprj['npwpd'];?></td>
                          <td><?= $laprj['judul'];?></td>
                          <td><?= $laprj['ukuran'];?> Meter</td>
                          <td><?= "Rp " . number_format($laprj['jumlah_bayar'],0,',','.').".-";?></td>
                          <td><?= "Rp " . number_format($laprj['pajak'],0,',','.').".-";?></td>
                          <!--<td><?= "Rp " . number_format(($laprj['pajak'] + $laprj['jumlah_bayar']),0,',','.').".-";?></td>-->
                          <td><?= $laprj['tanggal_sewa'];?></td>
                          <td><?= $laprj['tanggal_selesai_sewa'];?></td>
                        
                        <?php
                            if ($laprj['status_verifikasi'] == 'No') {
                        ?>
                              <td>
                                Belum Dikonfirmasi
                              </td>
                        <?php
                            } else {
                        ?>
                              <td>
                                Sudah Dikonfirmasi
                              </td>
                        <?php
                            $kelas = $laprj['kelas'];
                            }
                        ?>
                        </tr>
                    <?php
                        $t_pendapatan = $t_pendapatan + $laprj['pajak'];
                      }
                    ?>
                  </tbody>
                </table><hr/>
                <div align="right">
                  <strong>Total Pendapatan Pajak : </strong><?= "Rp " . number_format($t_pendapatan,0,',','.').".-";?>
                </div>
                <div align="right" style="margin-top: 50px;">
                  <hr/>
                  <?php
                    if (isset($kelas)) {
                      $kelas = $kelas;
                    } else {
                      $kelas = '';
                    }
                  ?>
                  <a href="<?= base_url('Core_actor/printPJwilayah/'.$kelas);?>" target="_blank" class="btn btn-primary btn-icon-split">
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
    <script>
      $(document).ready(function(){

        load_data();

        function load_data(query)
        {
          $.ajax({
            url:"<?= base_url('core_actor/fetch');?>",
            method:"POST",
            data:{query:query},
            success:function(data){
              $('#result').html(data);
            }
          })
        }
      })
    </script>
