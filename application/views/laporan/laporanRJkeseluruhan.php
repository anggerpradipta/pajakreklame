<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<img src="<?= base_url('logo/');?>kop1.png" style="width: 100%; height: auto; @media screen and (max-width: 600px) {display: none;}">
	<div style="padding-left: 3%; padding-right: 3%">
		<b>LAPORAN : Daftar Reklame Keseluruhan</b>
	    <table class="table table-striped" style="margin-top: 30px; " border="1">
	      <thead>
	        <tr>
	          <th>Kelas</th>
	          <th>Lokasi</th>
	          <th>Jenis Reklame</th>
	          <th>Harga</th>
	          <th>Masa Pajak</th>
	          <th>Jenis Sewa</th>
	          <th>Uraian</th>
	          <!--<th>Status</th>-->
	        </tr>
	      </thead>
	      <tbody>
	        <?php
	          foreach ($dataRJ as $laprj) {
	        ?>  
	            <tr>
	              <td><?= $laprj['kelas'];?></td>
	              <td><?= $laprj['lokasi'];?></td>
	              <td><?= $laprj['jenis_reklame'];?></td>
	              <td><?= $laprj['harga'];?></td>
	              <td><?= $laprj['masa_pajak'];?></td>
	              <td><?= $laprj['jenis_sewa'];?></td>
	              <td><?= $laprj['uraian'];?></td>
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
	          }
	        ?>
	      </tbody>
	    </table>
	</div>

    <script type="text/javascript">
    	window.print();
    </script>
</body>
</html>