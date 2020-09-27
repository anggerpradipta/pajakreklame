<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<img src="<?= base_url('logo/');?>kop1.png" style="width: 100%; height: auto; @media screen and (max-width: 600px) {display: none;}">
	<div style="padding-left: 3%; padding-right: 3%">
		<b>LAPORAN : Pajak Per-Wilayah / Kelas</b>
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
                      <!--<th>Status</th>-->
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
                          <!--<td>
                            <?php
                              if ($laprj['status'] == 'Yes') {
                            ?>
                              <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-times"></i>
                                </span>
                                <span class="text">Disewa</span>
                              </a>
                            <?php
                              } else {
                            ?>
                              <a href="#" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                  <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Ready</span>
                              </a>
                            <?php
                              }
                            ?>
                             
                           </td>-->
                        </tr>
                    <?php
                      $kelas = $laprj['kelas'];
                      $t_pendapatan = $t_pendapatan + $laprj['pajak'];
                      }
                    ?>
                  </tbody>
                </table><hr/>
                <div align="right">
                  <strong>Total Pendapatan Pajak : </strong><?= "Rp " . number_format($t_pendapatan,0,',','.').".-";?>
                </div>
	</div>

    <script type="text/javascript">
    	window.print();
    </script>
</body>
</html>