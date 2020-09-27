<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<img src="<?= base_url('logo/');?>kop1.png" style="width: 100%; height: auto; @media screen and (max-width: 600px) {display: none;}">
	<div style="padding-left: 3%; padding-right: 3%">
		<b>LAPORAN : Reklame Data Pengguna</b>
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
	</div>

    <script type="text/javascript">
    	window.print();
    </script>
</body>
</html>