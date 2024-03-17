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
	<div class="container mx-auto my-3">
			<div class="grid grid-cols-12 mb-4">
				<div class="col-span-8 lg:col-span-4">
					<form action="<?= base_url('product') ?>" method="post">
					<div class="flex">
						<select class="form-select w-full" name="kategori_id">
							<option value="*">Semua</option>
							<?php
							foreach ($categories as $category) {
								?>
								<option value="<?= $category['id'] ?>" <?php if(isset($kategori_id) && $category['id'] == $kategori_id){ echo "selected";} ?>>
									<?= $category['nama_kategori'] ?>
								</option>
							<?php } ?>
						</select>
						<input type="text" name="keyword" <?php if(isset($keyword)){ echo "value='$keyword'";} ?> class="form-input w-full ml-2" placeholder="Cari produk">
						<button type="submit" class="btn btn-teal mx-2">Cari</button>
					</div>
				</form>
				</div>
				<?php if ($this->session->userdata('user_role') == 'admin') { ?>
					<div class="col-span-4 lg:col-span-8 text-right">
						<button type="button" class="btn btn-teal mx-2" data-tw-toggle="modal"
							data-tw-target="#addProduk">Add</button>
					</div>
					<div id="addProduk" class="modal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="font-medium text-base mr-auto">
										Tambahkan Produk
									</h2>
								</div>
								<form action="<?= base_url('product/add') ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
										<div class="col-span-12">
											<label for="pos-form-1" class="form-label">Nama Produk</label>
											<input id="pos-form-2" type="text" required class="form-control flex-1"
												name="nama" placeholder="Nama Produk">
										</div>
										<div class="col-span-12">
											<label for="pos-form-1" class="form-label">Penyimpanan</label>
											<select class="form-select w-full" required name="penyimpanan">
												<?php
												foreach ($penyimpanan as $row) {
													?>
													<option value="<?= $row['id'] ?>">
														<?= $row['penyimpanan'] ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-span-12">
											<label for="pos-form-1" class="form-label">Kategori</label>
											<select class="form-select w-full" required name="kategori">
												<?php
												foreach ($categories as $category) {
													?>
													<option value="<?= $category['id'] ?>">
														<?= $category['nama_kategori'] ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="col-span-12">
											<label for="pos-form-2" class="form-label">Stok</label>
											<input id="pos-form-2" type="number" required class="form-control flex-1"
												name="stok" placeholder="Stok">
										</div>
										<div class="col-span-12">
											<label for="pos-form-2" class="form-label">Harga</label>
											<input id="pos-form-2" type="number" required class="form-control flex-1"
												name="harga" placeholder="Harga">
										</div>
										<div class="col-span-12">
											<label for="pos-form-2" class="form-label">Image Produk</label>
											<div class="flex w-full justify-center">
												<div id="multi-upload-button"
													class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
													Click to browse
												</div>
												<div
													class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between">
													<span id="multi-upload-text" class="p-2"></span>
													<div id="multi-upload-delete" class="hidden"
														onclick="removeMultiUpload()">
														<svg xmlns="http://www.w3.org/2000/svg"
															class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
															<path
																d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
														</svg>
													</div>
												</div>
											</div>
											<input type="file" id="multi-upload-input" required name="image[]"
												class="hidden" multiple />
										</div>
										<div class="col-span-12">
											<div id="images-container"></div>
										</div>
									</div>
									<div class="modal-footer text-right">
										<button type="button" data-tw-dismiss="modal"
											class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
										<button type="submit" class="btn btn-teal">Selesai</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
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
								<label for="pos-form-1" class="form-label">Nama Produk</label>
								<select class="form-select w-full" name="produk_id">
									<?php foreach ($products as $product) { ?>
										<option value="<?= $product['id'] ?>">
											<?= $product['nama_produk'] ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="modal-footer text-right">
							<button type="button" data-tw-dismiss="modal"
								class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
							<button type="submit"
								class="bg-teal-400 hover:bg-teal-600 text-white font-bold rounded-md py-2 px-4">Selesai</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="overflow-x-auto container mx-auto">
			<table class="table-auto min-w-full" id="example">
				<thead class="thead-light">
					<tr>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Tanggal</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Tuser</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Produk</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Harga</th>
						<?php if ($this->session->userdata('user_role') == 'admin') { ?>
							<th
								class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
								Action</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody class="bg-white <?php if($pengambilans == null){ echo 'text-center';} ?> divide-y divide-gray-200">
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
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<div class="flex">
									<a href="<?= base_url('pengambilan/lunas/' . $pengambilan['id']) ?>"
										class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Lunas</a>
									<a href="<?= base_url('pengambilan/cancel/' . $pengambilan['id']) ?>"
										class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2">Cancel</a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


</div>
