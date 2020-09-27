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
	          <th>NPWP</th>       
	          <th>Judul</th>     
	          <th>Ukuran</th> 
	          <th>Jumlah Sewa</th>
	          <th>Pajak</th>   
	          <th>Total Bayar</th>
	          <th>Tanggal Bayar</th>  
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
	              <td><?= $laprj['npwpd'];?></td>
	              <td><?= $laprj['judul'];?></td>
	              <td><?= $laprj['ukuran'];?> Meter</td>
	              <td><?= "Rp " . number_format($laprj['jumlah_bayar'],0,',','.').".-";?></td>
	              <td><?= "Rp " . number_format($laprj['pajak'],0,',','.').".-";?></td>
	              <td><?= "Rp " . number_format(($laprj['pajak'] + $laprj['jumlah_bayar']),0,',','.').".-";?></td>
	              <td><?= $laprj['tanggal_bayar'];?></td>
	            
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
	</div>

    <script type="text/javascript">
    	window.print();
    </script>
</body>
</html>