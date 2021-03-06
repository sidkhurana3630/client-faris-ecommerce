
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
                    <h6 class="m-0 font-weight-bold text-primary">Edit Produk</h6>
                </div>
                <div class="card-body">                    
                    <form action="<?= base_url('admin/update_barang'); ?>" method="POST" enctype="multipart/form-data" id="form-upd">
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-5">
                                <input type="hidden" value="<?= $all_produk['produk_id'] ?>" name="id" readonly>
                                <input type="text" class="form-control" id="nm_produk" name="nm_produk" value="<?= $all_produk['produk_nama'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Deskripsi Produk</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $all_produk['produk_deskripsi']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="size" required>
                                    <option selected>-- Pilih Size --</option>
                                    <?php foreach ($size as $t) : ?>
                                        <?php if ($all_produk['produk_size'] == $t['size']) : ?>
                                            <option value="<?= $t['size']; ?>" selected><?= $t['size']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t['size']; ?>" <?= set_select('size', $t['size']) ?>><?= $t['size']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Harga Produk</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="harga" name="harga" value="<?= $all_produk['produk_harga'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Gambar Produk</label>
                            <div class="col-sm-5">
                                <input type="file" class="form-control" id="foto1" name="foto1"><br>
                                <input type="file" class="form-control" id="foto2" name="foto2"><br>
                                <input type="file" class="form-control" id="foto3" name="foto3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Kategori Barang</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="kategori_brg" required>
                                    <option selected>-- Pilih --</option>
                                    <?php foreach ($kategori as $t) : ?>
                                        <?php if ($all_produk['produk_kategori_id'] == $t['kategori_id']) : ?>
                                            <option value="<?= $t['kategori_id']; ?>" selected><?= $t['kategori_nama']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t['kategori_id']; ?>" <?= set_select('kategori_nama', $t['kategori_nama']) ?>><?= $t['kategori_nama']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="font-weight-bold col-sm-2 col-form-label">Kategori Pemakai</label>
                            <div class="col-sm-5">
                                <select class="custom-select" name="kategori_pengguna" required>
                                    <option selected>-- Pilih --</option>
                                    <?php foreach ($pengguna as $t) : ?>
                                        <?php if ($all_produk['produk_pengguna_id'] == $t['pengguna_id']) : ?>
                                            <option value="<?= $t['pengguna_id']; ?>" selected><?= $t['pengguna']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $t['pengguna_id']; ?>" <?= set_select('pengguna', $t['pengguna']) ?>><?= $t['pengguna']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" style="width:200px; height: 50px;" type="submit">Edit</button>

                    </form>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->