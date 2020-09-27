    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Core_actor');?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pajak <sup>R</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Core_actor');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        UTAMA
      </div> 

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Core_actor/dsewa');?>">
          <i class="fas fa-fw fa-address-card"></i>
          <span>Daftar Nilai Sewa Dan Pajak Reklame</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Core_actor/dwajibpajak');?>">
          <i class="fas fa-fw fa-list"></i>
          <span>Daftar Wajib Pajak</span></a>
      </li>
      <?php
        if ($_SESSION['role'] == 'ADMIN') 
        {
      ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('Core_actor/sewareklame');?>">
              <i class="fas fa-fw fa-dollar-sign"></i>
              <span>Daftar Sewa Dan Pajak Reklame</span></a>
          </li>
      <?php
        } 
        else 
        {
          // code ...
        }
      ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php
        if ($_SESSION['role'] == 'ADMIN') 
        {
      ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Pengguna
      </div>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('Core_actor/st_user');?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Semua Pengguna</span></a>
        </li>
      <?php
        } 
        else 
        {
          // code ...
        }
      ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Lainnya...
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Daftar Reklame :</h6>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapRJwilayah');?>">Per-Wilayah/Kelas</a>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapRJkeseluruhan');?>">Keseluruhan</a>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapRJdisewa');?>">Masih Disewa</a>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapRJbelumdipakai');?>">Belum Dipakai</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Wajib Pajak :</h6>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapWPpengguna');?>">Daftar Wajib Pajak</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Sewa Dan Pajak Reklame :</h6>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapPJwilayah');?>">Per-Wilayah/Kelas</a>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapPJperiode');?>">Per-Periode</a>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapPJkeseluruhan');?>">Keseluruhan</a>
            <div class="collapse-divider" align="center">-------------------------</div>
            <a class="collapse-item" href="<?= base_url('Core_actor/lapSKDP');?>">SKPD</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->