        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><small>Home/Management User/</small></h1>
          </div>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message');?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Semua Data</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <form action="<?= base_url('Core_actor/st_user');?>" method="post">
                  <div class="form-group">
                    <div class="input-group" style="width: 400px;">
                      <span class="input-group-addon" style="padding-top: 6px;">USERS : </span>
                      <select class="form-control" name="roles" style="margin-left: 10px;">
                        <option value=""> ----- Pilih Role Pengguna -----</option>
                        <option value="admin">Admin</option>
                        <option value="pimpinan">Pimpinan</option>
                      </select>
                      <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Lihat</button>
                      <a href="#" data-toggle="modal" data-target="#tambahadmin">
                        <button type="button" class="btn btn-success" style="margin-left: 10px;"><i class="fa fa-plus"></i> Tambah Admin</button>
                      </a>
                    </div>
                </form><hr/>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-gray-200">
                    <tr style="font-size: 14px;">
                      <th class="border-bottom-primary">NIP</th>
                      <th class="border-bottom-primary">Nama</th>
                      <th class="border-bottom-primary">Email</th>
                      <th class="border-bottom-primary">Username</th>
                      <th class="border-bottom-primary">Password</th>
                      <th class="border-bottom-primary">Alamat</th>
                      <th class="border-bottom-primary">Role</th>                 
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th class="border-bottom-primary" style="width: 70px;">Aksi</th>
                      <?php
                        } 
                        else 
                        {
                          // code ...
                        }
                      ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr style="font-size: 14px;">
                      <th class="border-bottom-primary">NIP</th>
                      <th class="border-bottom-primary">Nama</th>
                      <th class="border-bottom-primary">Email</th>
                      <th class="border-bottom-primary">Username</th>
                      <th class="border-bottom-primary">Password</th>
                      <th class="border-bottom-primary">Alamat</th>
                      <th class="border-bottom-primary">Role</th>    
                      <?php
                        if ($_SESSION['role'] == 'ADMIN') 
                        {
                      ?>
                        <th class="border-bottom-primary" style="width: 70px;">Aksi</th>
                      <?php
                        } 
                        else 
                        {
                          // code ...
                        }
                      ?>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      foreach ($dataRJ as $sdataAdm) {
                    ?>
                      <tr style="font-size: 12px; text-align: center;">
                        <td><?= $sdataAdm['nip'];?></td>
                        <td><?= $sdataAdm['nama'];?></td>
                        <td><?= $sdataAdm['email'];?></td>
                        <td><?= $sdataAdm['username'];?></td>
                        <td><?= $sdataAdm['password'];?></td>
                        <td><?= $sdataAdm['alamat'];?></td>
                        <td><?= $sdataAdm['role'];?></td>
                        
                        <?php
                          if ($_SESSION['role'] == 'ADMIN') 
                          {
                        ?>
                        <td>
                          <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#hapusModal<?= $sdataAdm['nip'];?>">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash" style="font-size: 14px;"></i>
                            </span>
                            <!-- <span class="text">Hapus</span> -->
                          </a>
                        </td>
                        <?php
                          } 
                          else 
                          {
                            // code ...
                          }
                        ?>
                      </tr>

                      <div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah data ADMIN</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="<?= base_url('Core_actor/addAdmin');?>" method="post">
                                <div class="form-group">
                                  <span>NIP</span>
                                  <input type="text" name="nip" class="form-control" placeholder="Input NIP" required>
                                </div>
                                <div class="form-group">
                                  <span>Nama</span>
                                  <input type="text" name="nama" class="form-control" placeholder="Input Nama" required>
                                </div>
                                <div class="form-group">
                                  <span>Alamat</span>
                                  <input type="text" name="alamat" class="form-control" placeholder="Input Alamat" required>
                                </div>
                                <div class="form-group">
                                  <span>Email</span>
                                  <input type="email" name="email" class="form-control" placeholder="Input Email" required>
                                </div>
                                <div class="form-group">
                                  <span>Username</span>
                                  <input type="text" name="username" class="form-control" placeholder="Input Username" required>
                                </div>
                                <div class="form-group">
                                  <span>Password</span>
                                  <input type="password" name="password" class="form-control" placeholder="Input Password" required>
                                </div>
                                <div class="form-group">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="hapusModal<?= $sdataAdm['nip'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Apakah Anda ingin menghapus data <?= $sdataAdm['nip'];?> ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Klik "Hapus" untuk menghapus data tersebut!.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                              <a class="btn btn-warning" href="<?= base_url('Core_actor/hapusAdmin/'.$sdataAdm['id_admin']);?>">Hapus</a>
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
