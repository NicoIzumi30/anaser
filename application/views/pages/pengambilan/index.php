<style>
	.h10r {
		height: 10rem !important;
	}
</style>
<div class="w-full max-w-full">
	<div class="text my-5">
		<h2 class="text-lg font-medium mr-auto">Daftar Pengambilan</h2>
		<hr class="mb-3">
	</div>

	<div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">

		<div class="modal-footer mt-3">
			<button type="button" class="btn btn-teal mx-2" data-tw-toggle="modal"
				data-tw-target="#addPengambilan">Add</button>
			<div id="addPengambilan" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="font-medium text-base mr-auto">
								Tambahkan Pengambilan
							</h2>
						</div>
						<form action="<?= base_url('pengambilan/add') ?>" method="post" enctype="multipart/form-data">
							<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
								<div class="col-span-12">
									<label for="pos-form-1" class="form-label">Nama Tuser</label>
									<select class="form-select w-full" name="user_id">
										<option disabled selected>Pilih Tuser</option>
										<?php foreach ($users as $user) { ?>
											<option value="<?= $user['id'] ?>">
												<?= $user['nama'] ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-span-12">
									<label for="pos-form-2" class="form-label">Tanggal</label>
									<input id="pos-form-2" type="date" class="form-control flex-1" name="tanggal"
										placeholder="Tanggal">
								</div>
								<div class="col-span-12">
									<label for="pos-form-1" class="form-label">Kategori</label>
									<select class="form-select w-full" name="kategori" id="kategori">
										<option disabled selected>Pilih Kategori</option>

										<?php foreach ($categories as $category) { ?>
											<option value="<?= $category['id'] ?>">
												<?= $category['nama_kategori'] ?>
											</option>
										<?php } ?>
									</select>
								</div>
								<div class="col-span-12">
									<label for="pos-form-1" class="form-label">Brand</label>
									<select class="form-select w-full" required name="brand_id" id="brand_id">
										<option value="" disabled selected>Pilih Brand</option>
									</select>
								</div>
								<div class="col-span-12">
									<label for="pos-form-1" class="form-label">Nama Produk</label>
									<select class="form-select w-full" name="produk_id" id="produk_id">
										<option>Pilih Produk</option>
									</select>
								</div>
								<div class="col-span-12">
									<label for="pos-form-2" class="form-label">Harga</label>
									<input id="pos-form-2" type="number" disabled class="form-control flex-1 harga"
										name="harga" placeholder="Harga">
								</div>
							</div>
							<div class="modal-footer text-right">
								<button type="button" data-tw-dismiss="modal"
									class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
								<button type="submit"
									class="btn btn-teal">Selesai</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="overflow-x-auto container mx-auto">
			<table class="table-auto min-w-full" id="example">
				<thead class="thead-light text-left">
					<tr>
						<th data-priority="1"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No</th>
						<th data-priority="2"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Tanggal</th>
						<th data-priority="3"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Tuser</th>
						<th data-priority="4"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Produk</th>
						<th data-priority="5"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Harga</th>
						<?php if ($this->session->userdata('user_role') == 'admin') { ?>
							<th data-priority="6"
								class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
								Action</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody class="bg-white <?php if ($pengambilans == null) {
					echo 'text-center';
				} ?> divide-y divide-gray-200">
					<?php
					$no = 1;
					foreach ($pengambilans as $pengambilan) {
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++ ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pengambilan['tanggal'] ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pengambilan['nama']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pengambilan['nama_produk']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
								<?= number_format($pengambilan['harga']) ?>
							</td>
							<?php if ($this->session->userdata('user_role') == 'admin') { ?>
								<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
									<div class="flex">
										<a href="<?= base_url('pengambilan/lunas/' . $pengambilan['id']) ?>"
											class="btn btn-teal mr-2">Lunas</a>
										<a href="<?= base_url('pengambilan/cancel/' . $pengambilan['id']) ?>"
											class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2">Cancel</a>
									</div>
								</td>
							<?php } ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	var $j = jQuery.noConflict();
	$j(document).ready(function () {
		function getBrand(kategori){
			$j.ajax({
				url: "<?= base_url('kategori/getListBrand') ?>",
				method: "GET",
				data: {
					kategori: kategori
				},
				success: function (response) {
					$j("#brand_id").html(response);
				},
				error: function () {
					console.error("Error fetching HTML content");
				}
			});
		}
		function getProduk(brand){
			$j.ajax({
				url: "<?= base_url('product/getListProduk') ?>",
				method: "GET",
				data: {
					brand: brand
				},
				success: function (response) {
					$j("#produk_id").html(response);
				},
				error: function () {
					console.error("Error fetching HTML content");
				}
			});
		}
		$j("#kategori").change(function () {
			var kategori = $j(this).val();
			getBrand(kategori)
		});
		$j("#brand_id").change(function () {
			var kategori = $j(this).val();
			getProduk(kategori)
		});
		$j("#produk_id").change(function () {
			var produk = $j(this).val();
			$j.ajax({
				url: "<?= base_url('product/getHarga') ?>",
				method: "GET",
				data: {
					produk: produk
				},
				success: function (response) {
					$j(".harga").val(response);
				},
				error: function () {
					console.error("Error fetching HTML content");
				}
			});
		});
	});
</script>
