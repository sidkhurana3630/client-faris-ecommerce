<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-store"></i>
      </div>
      <div class="sidebar-brand-text mx-3"><img src="<?= base_url('assets/vendor/cozastore/') ?>images/icons/logo-01.png" alt="IMG-LOGO"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($this->uri->uri_string() == 'admin') ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('admin'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Produk
    </div>    

    <!-- Nav Item - Charts -->
    <li class="nav-item  <?= ($this->uri->uri_string() == 'admin/tambah') ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('admin/tambah'); ?>">
        <i class="fas fa-fw fa-tshirt"></i>
        <span>Tambah</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item  <?= ($this->uri->segment(2) == 'edit' ) ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('admin/edit'); ?>">
        <i class="fas fa-fw fa-tshirt"></i>
        <span>Edit | Hapus</span></a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Member
    </div>    

    <!-- Nav Item - Charts -->
    <li class="nav-item  <?= ($this->uri->uri_string() == 'admin/member') ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('admin/member'); ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Lihat</span></a>
    </li>    
    
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Order
    </div>    

    <!-- Nav Item - Charts -->
    <li class="nav-item  <?= ($this->uri->uri_string() == 'admin/order') ? 'active' : '' ?>">
      <a class="nav-link" href="<?= base_url('admin/order'); ?>">
        <i class="fas fa-fw fa-clipboard-list"></i>
        <span>Cek</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->