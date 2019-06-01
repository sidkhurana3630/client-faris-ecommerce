
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<form action="<?= base_url('user/update_cart'); ?>" method="POST" name="frm-shop">
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
										<th class="column-6"></th>
									</tr>

									<?php
									$cart = $this->cart->contents();
									$grand_total = 0;
									$i = 1;

									foreach ($cart as $item) :
										$images = ($item['gambar']) ? $item['gambar'] : 'produk.jpg';
										$grand_total = $grand_total + $item['subtotal']; ?>

										<input type="hidden" name="cart[<?php echo $item['id']; ?>][id]" value="<?php echo $item['id']; ?>" />
										<input type="hidden" name="cart[<?php echo $item['id']; ?>][rowid]" value="<?php echo $item['rowid']; ?>" />
										<input type="hidden" name="cart[<?php echo $item['id']; ?>][name]" value="<?php echo $item['name']; ?>" />
										<input type="hidden" name="cart[<?php echo $item['id']; ?>][price]" value="<?php echo $item['price']; ?>" />
										<input type="hidden" name="cart[<?php echo $item['id']; ?>][gambar]" value="<?php echo $item['gambar']; ?>" />

										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="<?= base_url('assets/uploads/produk/') . $images; ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?= $item['name']; ?></td>
											<td class="column-3">Rp. <?= number_format($item['price'], 0, ",", "."); ?></td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input name="cart[<?php echo $item['id']; ?>][qty]" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?= $item['qty']; ?>">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td class="column-5">Rp. <?= number_format($item['subtotal'], 0, ",", "."); ?></td>
											<td><a href="<?= base_url('user/delete_cart/') . $item['rowid']; ?>" class="btn btn-danger" onclick="return confirm('Apa anda yakin akan menghapus item ini ?');"><i class="zmdi zmdi-delete"></i></a></td>
										</tr>
									<?php endforeach; ?>
								</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<?php if (!$this->cart->contents()) {
								echo "<h4>Transaksi Anda Masih Kosong</h4>";
							} else {
								echo "<input type='submit' value='Update Cart' class='flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10'>";
							} ?>
						</div>
						</form>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Dikirim Ke :
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">

								</span>
							</div>

							<div class="">
								<span class=" cl6 p-t-2">
									<br>
									<table>
										<tr>
											<td>Nama</td>
											<td> : </td>
											<th><?= $user['user_name']; ?></th>
										</tr>
										<tr>
											<td>Alamat</td>
											<td> : </td>
											<th><?= $user['user_address']; ?></th>
										</tr>
										<tr>
											<td>Kontak</td>
											<td> : </td>
											<th><?= $user['user_notelp']; ?></th>
										</tr>
									</table>
									<hr>
									<small>Untuk update alamat pengiriman silahkan ke <a href="<?= base_url('user/account'); ?>">My Account</a></small>
								</span>

							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									Rp. <?= number_format($grand_total, 0, ",", "."); ?>
								</span>
							</div>
						</div>

						<?php if ($this->cart->contents()) { ?>
							<form method="POST" action="<?= base_url('user/proses_order') ?>">
							<input type="hidden" name="user_id" id="user_id" value="<?= $user['user_email']; ?>">
							<input type="hidden" name="total" id="grandtotal" value="<?= $grand_total ?>">
								<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
									Proceed to Checkout
								</button>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>