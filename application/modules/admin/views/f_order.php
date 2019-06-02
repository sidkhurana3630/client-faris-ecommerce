
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>



      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['user_name']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/uploads/profile/') . $user['user_image']; ?>">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <a class="dropdown-item" href="#">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
      </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Member</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_member; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Produk</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_barang; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Order Pending</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_order_pending; ?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Order Sukses</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jum_order_sukses; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update Order</h6>
                </div>
                <div class="card-body">                    
                    <form action="<?= base_url('admin/update_orderan'); ?>" method="POST" id="form-upd-order">
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Kode Transaksi</label>
                            <div class="col-sm-5">
                                <input type="hidden" value="<?= $all_order['order_id'] ?>" name="id" readonly>
                                <input type="text" class="form-control" id="kd_transaksi" name="kd_transaksi" value="<?= "ORDER-".$all_order['order_id'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Status Order</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="status_order" required>
                                    <option selected>-- Pilih --</option>
                                    <option value="Pengecekan Bukti TF">Pengecekan Bukti TF</option>
                                    <option value="Pembayaran Diterima">Pembayaran Diterima</option>
                                    <option value="Sudah Terkirim">Sudah Terkirim</option>
                                </select>
                            </div>
                        </div>                                             
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Status Pembayaran</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="status_payment" required>
                                    <option selected>-- Pilih --</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>                                    
                                </select>
                            </div>
                        </div>                                             
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">No. Resi</label>
                            <div class="col-sm-5">                                
                                <input type="text" class="form-control" id="no_resi" name="no_resi" value="<?= $all_order['order_resi'] ?>" required>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" style="width:200px; height: 50px;" type="submit">Update</button>

                    </form>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->