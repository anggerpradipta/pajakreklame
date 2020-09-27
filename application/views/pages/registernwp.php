<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrasi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('vendor/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
    <?php
      // print_r($noForm);
    $jum = 1 + (int)str_replace("FRM-","",$noForm->no_formulir);
    $no_form = "FRM-".$jum;
    ?>
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">FORMULIR PENDAFTARAN</h1><hr/>
              </div>
              <form class="user" action="<?= base_url('Public_site/new_wajibpajak');?>" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" value="<?= $no_form?>" name="no_formulir" id="no_form" readonly="readonly">
                  </div>
                  <div class="col-sm-6">
                  </div>
                </div><br/>
                <small><b>Akun :</b></small><br/><br/>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="email" class="form-control form-control-user" id="email" name="email" required placeholder="Email">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="pass" name="password" required placeholder="Password">
                  </div>
                </div><br/><br/>
                <small><b>Instansi/Perusahaan :</b></small><br/><br/>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="nama_instansi" required placeholder="Nama Instansi">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="text" name="alamat_instansi" required placeholder="Alamat Instansi">
                  </div>
                  <div class="col-sm-2">
                    <input type="number" class="form-control form-control-user" id="text" name="kodepos_instansi" required placeholder="Kode Pos Instansi">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="number" class="form-control form-control-user" id="text" name="notelp_instansi" required placeholder="No Telepon Instansi">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="text" name="no_suratizin_instansi" required placeholder="No Surat Izin Instansi">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="bidang_usaha" required placeholder="Bidang Usaha">
                  </div>
                </div><br/><br/>
                <small><b>Pemilik/Pemegang :</b></small><br/><br/>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="nama_pemilik" required placeholder="Nama Pemilik">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="jabatan" required placeholder="Jabatan">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="alamat_pemilik" required placeholder="Alamat Pemilik">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="number" class="form-control form-control-user" id="text" name="notelp_pemilik" required placeholder="No Telepon Pemilik">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="number" class="form-control form-control-user" id="text" name="kodepos_pemilik" required placeholder="Kode Pos Pemilik">
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user" id="text" name="npwpd" required placeholder="NPWPD">
                  </div>
                </div>
                <hr/>
                <button type="submit" name="submit" value="daftar" class="btn btn-primary btn-user btn-block">
                  Buat akun
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>