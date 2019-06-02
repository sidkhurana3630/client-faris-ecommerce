
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
          <h6 class="m-0 font-weight-bold text-primary">Table Order</h6>
        </div>
        <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th width="4%">No</th>
                  <th>Tgl. Transaksi</th>
                  <th>Kode Transaksi</th>
                  <th>Total Harga</th>                                    
                  <th>Status Order</th>
                  <th>Status Pembayaran</th>
                  <th>Bukti TF</th>
                  <th>No. Resi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach($all_order as $t) : ?>
                <tr>
                  <td class="text-center"><?= $no; ?></th>
                  <td><?= date('d F Y', $t['order_date']); ?></td>
                  <td class="text-center"><?= "ORDER-".$t['order_id']; ?></th>
                  <td><?= "Rp. ".$t['order_total']; ?></th>                  
                  <td><?= $t['order_status']; ?></th>
                  <td class="<?= ($t['order_payment'] == 'Lunas') ? 'text-success' : 'text-danger' ?>"><?= $t['order_payment']; ?></th>
                  <td><a target="_blank" href="<?= base_url('assets/uploads/transfer/').$t['order_bukti_tf']; ?>"><?= $t['order_bukti_tf']; ?></a></th>
                  <td><?= $t['order_resi']; ?></th>                  
                  <td class="text-center"><a class="btn btn-primary" href="<?= base_url('admin/update_order/'.$t['order_id']); ?>">Update</a></td>
                </tr>
                <?php 
                $no++;
                endforeach; ?>
              </tbody>               
            </table>
          </div>
        </div>
      </div>
      
      <!-- DataTales Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Table Order Detail</h6>
        </div>
        <div class="card-body">        
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
              <thead>
                <tr class="text-center">
                  <th width="4%">No</th>                  
                  <th>Kode Transaksi</th>
                  <th>Produk</th>                                    
                  <th>Qty</th>
                  <th>Harga (pcs)</th>                  
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach($all_order_detail as $t) : ?>
                <tr>
                  <td class="text-center"><?= $no; ?></th>                  
                  <td class="text-center"><?= "ORDER-".$t['order_id']; ?></th>                  
                  <td><?= $t['order_detail_produk']; ?></th>
                  <td><?= $t['order_detail_qty']; ?></th>
                  <td><?= $t['order_detail_harga']; ?></th>                  
                </tr>
                <?php 
                $no++;
                endforeach; ?>
              </tbody>               
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->