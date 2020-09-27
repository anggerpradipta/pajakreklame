<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar SEWA REKLAME</title>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('Public_site');?>" style="color: white;">SEWA REKLAME</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('Public_site');?>" style="color: white;">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <a href="<?= base_url('Public_site/registrasi');?>"><button class="btn btn-info my-2 my-sm-0" type="button"><i class="fa fa-user"></i>Register</button></a>&emsp;
                    <a href="<?= base_url('Public_site/form_login');?>"><button class="btn btn-success my-2 my-sm-0" type="button"><i class="fa fa-user"></i>Login</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="padding: 10px; margin-top: 10px;">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Lokasi</th>
                    <th>Jenis Reklame</th>
                    <th>Harga</th>
                    <th>Masa Pajak</th>
                    <th>Jenis</th>
                    <th>Uraian</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                    foreach ($dataDS as $ds) {
                ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?= $ds['kelas'];?></td>
                        <td><?= $ds['lokasi'];?></td>
                        <td><?= $ds['jenis_reklame'];?></td>
                        <td><?= "Rp " . number_format($ds['harga'],0,',','.').".-";?></td>
                        <td><?= $ds['masa_pajak'];?> Bulan</td>
                        <td><?= $ds['jenis_sewa'];?></td>
                        <td><?= $ds['uraian'];?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Kelas</th>
                    <th>Lokasi</th>
                    <th>Jenis Reklame</th>
                    <th>Harga</th>
                    <th>Masa Pajak</th>
                    <th>Jenis</th>
                    <th>Uraian</th>
                </tr>
            </tfoot>
        </table>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
</body>
</html>