	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
					<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						Silahkan Transfer ke no. rekening <b class="text-primary">85962122321354</b> (Bank DKI)
					</div>
					<div class="row">
						<div class="col-lg-6">
							<?= $this->session->flashdata('message'); ?>
							<h4>Upload Bukti Transfer :</h4>
							<hr>
							<form action="<?= base_url('user/upload_tf'); ?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group row">
											<label for="" class="font-weight-bold col-sm-3 col-form-label">Kode Transaksi</label>
											<div class="col-sm-8">
												<div class="rs1-select2 bor8 bg0">
													<select class="select" class="form-control" style="width: 100%;" data-placeholder="-- Kode Transaksi --" name="order_id" id="order_id">
														<option></option>
														<?php
														foreach ($order as $item) : ?>
															<option value="<?= $item['order_id']; ?>"><?= "ORDER-" . $item['order_id']; ?></option>
														<?php endforeach; ?>
													</select>
													<div class="dropDownSelect2"></div>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<label for="" class="font-weight-bold col-sm-3 col-form-label">Nama Pengirim</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="nm_pengirim" name="nm_pengirim" value="<?= $user['user_name']; ?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="" class="font-weight-bold col-sm-3 col-form-label">Nama BANK</label>
											<div class="col-sm-8">
												<input type="text" class="form-control" id="nm_bank" name="nm_bank" placeholder="Contoh : BANK DKI" required>
											</div>
										</div>
										<div class="form-group row">
											<label for="" class="font-weight-bold col-sm-3 col-form-label">Upload Bukti TF</label>
											<div class="col-sm-8">
												<input type="file" class="form-control" id="file" name="file" required>
											</div>
										</div>

										<button class="btn btn-primary" style="width:100px;" type="submit">Upload</button>

										<hr>

									</div>
								</div>
							</form>
						</div>

						<div class="col-lg-6">
							<h4>Catatan :</h4>
							<hr>
							<ul>
								<li>- No. Rekening DISTRO CAMOC hanya <b class="text-primary">85962122321354</b> (Bank DKI)</li>
								<li>- Rekening hanya atas nama <b class="text-primary">Bambang Sutejo</b> (Bank DKI)</li>
								<li>- Silahkan transfer sesuai dengan nominal <b>Total Harga</b> pada tabel My Order</li>
								<li>- Apabila mengalami kendala saat upload bukti Transfer, silahkan kirim bukti TF ke WA <b class="text-primary">081281229893</b></li>
								<li>- No. Resi akan muncul pada tabel My Order ketika barang sudah dikirimkan</li>
							</ul>
						</div>
					</div>

					<hr>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">My Order</h6>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class="text-center" width="4%">No</th>
											<th class="text-center">Tgl. Transaksi</th>
											<th class="text-center">Kode Transaksi</th>
											<th class="text-center">Total Harga</th>
											<th class="text-center">Status Order</th>
											<th class="text-center">Status Pembayaran</th>
											<th class="text-center">Upload Bukti TF</th>
											<th class="text-center">No. Resi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										foreach ($order as $item) : ?>
											<tr>
												<td class="text-center"><?= $i; ?></td>
												<td class="text-center"><?= date('d F Y', $item['order_date']); ?></td>
												<td class="text-center"><?= "ORDER-" . $item['order_id']; ?></td>
												<td class="text-center">Rp. <?= number_format($item['order_total'], 0, ",", "."); ?></td>
												<th class="text-center"><?= $item['order_status']; ?></th>
												<th class="text-center"><?= ($item['order_payment'] == "Belum Lunas") ? "<p class='text-danger'>Belum Lunas</p>" : "<p class='text-success'>Lunas</p>"   ?></th>
												<th class="text-center"><?= ($item['order_bukti_tf'] == NULL) ? "<p class='text-danger'>Belum Upload</p>" : "<p class='text-success'>Uploaded</p>" ?></th>
												<th class="text-center"><?= $item['order_resi']; ?></th>
											</tr>
										</tbody>
										<?php
										$i++;
									endforeach; ?>
								</table>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>