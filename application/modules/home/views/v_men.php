<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Men's Product
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".T-Shirt">
					T-Shirt
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Pants">
					Pants
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".Jacket">
					Jacket
				</button>				
			</div>


		</div>

		<?= $this->session->flashdata('message'); ?>
		<div class="row isotope-grid">
			<?php foreach ($all_produk as $t) : ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?= $t['kategori_nama']; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<?php $images = ($t['produk_gambar1']) ? $t['produk_gambar1'] : 'produk.jpg' ?>
							<img src="<?= base_url('assets/uploads/produk/') . $images ?>" alt="IMG-PRODUCT">
							<button class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 cart-login">
								Add To Cart
							</button>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $t['produk_nama']; ?>
								</a>

								<span class="stext-105 cl3">
									Rp. <?= number_format($t['produk_harga'], 0, ",", "."); ?>
								</span>
							</div>
							
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</div>