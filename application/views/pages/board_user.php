        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home</small></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="row col-lg-12">
              <!-- Wajib Pajak Card  -->
              <div class="col-xl-12 col-md-12 mb-4">
                <div class="card shadow mb-4" style="margin-right: -25px;">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reklame</h6>
                  </div>
                  <div class="card-body">

                    <form class="user" action="<?= base_url('Public_site/sewa_reklame/'.$_SESSION['id_wp']);?>" method="post">
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <small>Jenis Sewa</small>
                          <select class="form-control" name="jenisreklame" id="jenisreklame" required>
                            <option value=""> ------ Pilih Jenis Sewa ------ </option>
                            <option value="Permanen">Permanen</option>
                            <option value="Insidentil">Insidentil</option>
                          </select>
                        </div>

                        <div class="col-sm-6">
                          <small>Jenis Reklame</small>
                          <select class="form-control" name="id_daftar_sewa" id="reklame" required>
                            <option value=""> ------ Pilih Reklame ------ </option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <small>Kelas</small>
                          <input type="text" class="form-control" name="kelas" id="kelas" value="" required placeholder="-">
                        </div>

                        <div class="col-sm-6">
                          <small>Harga</small>
                          <input type="text" readonly="readonly" class="form-control" name="harga" required id="harga1" value="" placeholder="Rp.">
                          <input type="hidden" class="form-control" name="harga" id="harga" value="" >
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <small>Lokasi</small>
                          <input type="text" class="form-control" name="lokasi" id="lokasi" value="" required placeholder="Jl.">
                        </div>
                        
                        <div class="col-sm-6">
                          <small>Masa Pajak (Bulan)</small>
                          <input type="number" readonly="readonly" class="form-control" name="masa_pajak" required id="masa_pajak" value="" placeholder="/bulan">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <small>Uraian</small>
                        <input type="text" class="form-control" name="uraian" id="uraian" value="" placeholder="Uraian">
                      </div><br/><hr/>
                      
                      <!--<div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                          <small>Tanggal Sewa (12 Bulan)</small><br/>
                          <input type="date" class="form-controll" name="tanggal_sewa" id="tanggal_sewa" value="">
                        </div>
                      </div>-->

                      <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                          <div class="form-group">
                            <small>Judul</small>
                            <input type="text" class="form-control" name="judul" id="judul" value="" placeholder="Judul Reklame / iklan">
                          </div>
                        </div>

                        <div class="col-sm-2 mb-3 mb-sm-0">
                          <small>Panjang /m</small>
                          <input type="number" class="form-control" name="panjang" id="panjang" value="1" required placeholder="/m">
                        </div>

                        <div class="col-sm-2">
                          <small>Lebar /m</small>
                          <input type="number" class="form-control" name="lebar" required id="lebar" value="1" placeholder="/m">
                        </div>

                        <div class="col-sm-2">
                          <small>Jumlah</small>
                          <input type="number" class="form-control" name="jumUnit" required id="jumUnit" value="1" placeholder="pcs">
                        </div>

                        <div class="col-sm-1">
                          <small>&nbsp;</small>
                          <input type="button" onclick="hitungS()" class="btn btn-primary form-control" id="hitung" value="Hitung">
                        </div>

                        <div class="col-sm-3">
                          <small>Nilai Sewa</small>
                          <input type="text" readonly="readonly" class="form-control" name="total" required id="total" value="" placeholder="Rp.">
                        </div>

                        <div class="col-sm-2">
                          <small>Pajak 25%</small>
                          <input type="text" readonly="readonly" class="form-control" name="pajak" required id="pajak" value="" placeholder="Rp.">
                        </div>
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
                            Sewa Sekarang
                          </button>
                        </div>
                      </div>
                    </form>
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

      <script>
        $(document).ready(function(){

          $('#jenisreklame').change(function(){
            var jr = $('#jenisreklame').val();
            if (jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload');?>",
                method:"POST",
                data:{jr:jr},
                success:function(data)
                {
                  $('#reklame').html(data);
                }
              })
            }
          });

          $('#reklame').change(function(){
            var id_jr = $('#reklame').val();
            if (id_jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload_kelas');?>",
                method:"POST",
                data:{id_jr:id_jr},
                success:function(data)
                {
                  document.getElementById("kelas").value = data;
                }
              })
            }
          });

          $('#reklame').change(function(){
            var id_jr = $('#reklame').val();
            if (id_jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload_harga');?>",
                method:"POST",
                data:{id_jr:id_jr},
                success:function(data)
                {
                  var harga = data;
                  var rp_harga = harga.toString(),
                    sisa_harga  = rp_harga.length % 3,
                    rupiah_harga  = rp_harga.substr(0, sisa_harga),
                    ribuan_harga  = rp_harga.substr(sisa_harga).match(/\d{3}/g);

                  if (ribuan_harga) {
                    separator = sisa_harga ? '.' : '';
                    rupiah_harga += separator + ribuan_harga.join('.');
                  }
                  document.getElementById("harga").value = data;
                  document.getElementById("harga1").value = 'Rp. '+rupiah_harga;
                }
              })
            }
          });

          $('#reklame').change(function(){
            var id_jr = $('#reklame').val();
            if (id_jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload_lokasi');?>",
                method:"POST",
                data:{id_jr:id_jr},
                success:function(data)
                {
                  document.getElementById("lokasi").value = data;
                }
              })
            }
          });

          $('#reklame').change(function(){
            var id_jr = $('#reklame').val();
            if (id_jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload_mpajak');?>",
                method:"POST",
                data:{id_jr:id_jr},
                success:function(data)
                {
                  document.getElementById("masa_pajak").value = data;
                }
              })
            }
          });

          $('#reklame').change(function(){
            var id_jr = $('#reklame').val();
            if (id_jr != '') {
              $.ajax({
                url:"<?php echo base_url('Public_site/dr_autoload_uraian');?>",
                method:"POST",
                data:{id_jr:id_jr},
                success:function(data)
                {
                  document.getElementById("uraian").value = data;
                }
              })
            }
          });

        });

      </script>
      <script>
        
        function hitungS(){
          var panjang = document.getElementById("panjang").value;
          var lebar = document.getElementById("lebar").value;
          var harga = document.getElementById("harga").value;
          var jumUnit = document.getElementById("jumUnit").value;
          var jenisSR = document.getElementById("jenisreklame").value;

          if (jenisSR == 'Permanen') 
          {
            var pajak = (((panjang * lebar * jumUnit) * harga) * 0.25);
            var total = ((panjang * lebar) * harga);
          } 
          else 
          {
            var pajak = ((parseInt(harga) * parseInt(jumUnit)) * 0.25);
            var total = (parseInt(harga));
          }

          var rp_pajak = pajak.toString(),
            sisa_pajak  = rp_pajak.length % 3,
            rupiah_pajak  = rp_pajak.substr(0, sisa_pajak),
            ribuan_pajak  = rp_pajak.substr(sisa_pajak).match(/\d{3}/g);

          if (ribuan_pajak) {
            separator = sisa_pajak ? '.' : '';
            rupiah_pajak += separator + ribuan_pajak.join('.');
          }

          var rp_total = total.toString(),
            sisa_total  = rp_total.length % 3,
            rupiah_total  = rp_total.substr(0, sisa_total),
            ribuan_total  = rp_total.substr(sisa_total).match(/\d{3}/g);
              
          if (ribuan_total) {
            separator = sisa_total ? '.' : '';
            rupiah_total += separator + ribuan_total.join('.');
          }

          document.getElementById("pajak").value = 'Rp. '+rupiah_pajak;
          document.getElementById("total").value = 'Rp. '+rupiah_total;
        }

      </script>
    </div>
    <!-- End of Content Wrapper -->