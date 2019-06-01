<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Lupa Password</h1>
                                </div>
                                <div class="alert alert-info alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    Silahkan masukkan email anda
                                </div>
                                <form class="user" id="forgetform" method="POST" action="<?= base_url('auth/forgetPass'); ?>">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="emailHelp" placeholder="Alamat Email">
                                    </div>                                    
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Lupa Password
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya Akun? Silahkan Login</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Belum punya akun? Buat disini!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>