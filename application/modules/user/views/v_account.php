
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				
			</div>
		</div>
	</div>


	<!-- Product -->
	<div class="container">
		<section class="bg0 p-t-23 p-b-140">

			<div class="p-b-10">
				<h3 class="ltext-103 cl5">My Account</h3>
			</div>
			<hr>

			<?= $this->session->flashdata('message'); ?>

			<div class="p-t-18" style="padding-bottom:20px;">
				<button id="upd-akun" class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn1 p-lr-15 trans-04">Update Account</button>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<div class="flex-w flex-sb-m p-b-52">
						<div class="card mb-3" style="max-width: 540px; padding:20px;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<img style="" src="<?= base_url('assets/uploads/profile/') . $user['user_image']; ?>" class="card-img rounded-circle" alt="...">
								</div>
								<div class="col-md-8">
									<div class="card-body">
										<h5 class="card-title font-weight-bold"><?= $user['user_name']; ?></h5>
										<table class="card-text">
											<tr>
												<td width="20%">Email</td>
												<td>: <?= $user['user_email']; ?></td>
											</tr>
											<tr>
												<td>No. Hp</td>
												<td>: <?= $user['user_notelp']; ?></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td>: <?= $user['user_address']; ?></td>
											</tr>
										</table>
									</div>
									<div class="card-footer bg-transparent">
										<p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['user_ctime']); ?></small></p>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<div class="col-lg-6" id="form-akun" style="display:none;">

					<div class="card">
						<div class="card-header" style="background-color:#7c88e3; color:#fff;">
							<h4>Update Account</h4>
						</div>
						<div class="card-body">
							<form action="<?= base_url('user/update_user'); ?>" method="POST" enctype="multipart/form-data" id="form-upd">
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Nama Lengkap</label>
									<div class="col-sm-9">
										<input type="hidden" value="<?= $user['user_id']; ?>" id="id" name="id">
										<input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" value="<?= $user['user_name']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Alamat Lengkap</label>
									<div class="col-sm-9">
										<textarea class="form-control" id="alamat" name="alamat"><?= $user['user_address']; ?></textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Jenis Kelamin</label>
									<div class="col-sm-9">
										<div class="rs1-select2 bor8 bg0">
											<select class="select" class="form-control" style="width: 100%;" data-placeholder="-- Jenis Kelamin --" name="jenkel" id="jenkel">
												<option></option>
												<?php foreach ($jenkel as $t) : ?>
													<?php if ($user['user_jenkel'] == $t['jenkel']) : ?>
														<option value="<?= $t['jenkel']; ?>" selected><?= $t['jenkel']; ?></option>
													<?php else : ?>
														<option value="<?= $t['jenkel']; ?>" <?= set_select('jenkel', $t['jenkel']) ?>><?= $t['jenkel']; ?></option>
													<?php endif; ?>
												<?php endforeach; ?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">No. HP/Telp</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" id="notelp" name="notelp" value="<?= $user['user_notelp']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Foto Profil</label>
									<div class="col-sm-9">
										<input type="file" class="form-control" id="foto" name="foto">
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Alamat Email</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="email" name="email" value="<?= $user['user_email']; ?>" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="font-weight-bold col-sm-3 col-form-label">Password</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" id="password" name="password">
									</div>
								</div>

								<button class="btn btn-primary" style="width:100px; float:right;" type="submit">Update</button>

							</form>
						</div>
					</div>

				</div>
			</div>

		</section>
	</div>