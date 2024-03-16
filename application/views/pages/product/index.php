<style>
	.h10r {
		height: 10rem !important;
	}
</style>
<div class="w-full max-w-full">
	<div class="text my-5">
		<h2 class="text-lg font-medium mr-auto">Daftar Seluruh Produk</h2>
		<hr class="mb-3">
	</div>

	<div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
		<div class="container mx-auto my-3">
			<div class="grid grid-cols-12 mb-4">
				<div class="col-span-8 lg:col-span-4">
					<div class="flex">
						<select class="form-select w-full">
							<option value="">Semua</option>
							<?php
							foreach ($categories as $category) {
								?>
								<option value="<?= $category['id'] ?>">
									<?= $category['nama_kategori'] ?>
								</option>
							<?php } ?>
						</select>
						<input type="text" class="form-input w-full ml-2" placeholder="Cari produk">
						<button type="button" class="btn btn-teal mx-2">Cari</button>
					</div>
				</div>

				<div class="col-span-4 lg:col-span-8 text-right">
					<button type="button" class="btn btn-teal mx-2" data-tw-toggle="modal"
						data-tw-target="#addProduk">Add</button>
				</div>
			</div>
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
								<input id="pos-form-2" type="text" required class="form-control flex-1" name="nama"
									placeholder="Nama Produk">
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
								<input id="pos-form-2" type="number" required class="form-control flex-1" name="stok"
									placeholder="Stok">
							</div>
							<div class="col-span-12">
								<label for="pos-form-2" class="form-label">Harga</label>
								<input id="pos-form-2" type="number" required class="form-control flex-1" name="harga"
									placeholder="Harga">
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
										<div id="multi-upload-delete" class="hidden" onclick="removeMultiUpload()">
											<svg xmlns="http://www.w3.org/2000/svg"
												class="fill-current text-red-700 w-3 h-3" viewBox="0 0 320 512">
												<path
													d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
											</svg>
										</div>
									</div>
								</div>
								<input type="file" id="multi-upload-input" required name="image[]" class="hidden"
									multiple />
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
		<div class="overflow-x-auto container mx-auto">
			<table class="table-auto min-w-full" id="example">
				<thead class="thead-light">
					<tr>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Produk</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Penyimpanan</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Kategori</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Stok</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Harga</th>
						<th
							class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider text-center">
							Action</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					<?php
					$no = 1;
					foreach ($products as $product) {
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++ ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $product['nama_produk'] ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $product['penyimpanan'] ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $product['nama_kategori'] ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $product['stok'] ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
								<?= number_format($product['harga']) ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 text-center">
								<div class="flex">
									<a href="#" data-tw-toggle="modal" data-tw-target="#edit<?= $product['id'] ?>"
										class="btn btn-teal rounded-full mr-2"><i data-lucide="pencil"></i></a>
									<a href="#" data-tw-toggle="modal" data-tw-target="#delete<?= $product['id'] ?>"
										class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2"><i
											data-lucide="trash-2"></i></a>
									<a href="#" data-tw-toggle="modal" data-tw-target="#view<?= $product['id'] ?>"
										class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-full"><i
											data-lucide="eye"></i></a>
								</div>
							</td>
						</tr>
						<div id="view<?= $product['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<h2 class="font-medium text-base mr-auto">
											Lihat Foto
										</h2>
										<div class="text-end">
											<i data-tw-dismiss="modal" data-lucide="x-circle"
												class="w-8 h-8 text-grey transform -rotate-90 cursor-pointer"></i>
										</div>
									</div>

									<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
										<?php
										$images = explode(',', $product['image']);
										foreach ($images as $image) {
											?>
											<img src="<?= base_url('uploads/produk/' . $image) ?>" class="col-span-4" alt="">
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<div id="delete<?= $product['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-body p-0">
										<div class="p-5 text-center">
											<i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
											<div class="text-3xl mt-5">Apa anda yakin?</div>
											<div class="text-slate-500 mt-2">
												Apakah Anda ingin menghapus data ini?
												<br>
												Proses ini tidak dapat dibatalkan.
											</div>
										</div>
										<div class="px-5 pb-8 text-center">
											<button type="button" data-tw-dismiss="modal"
												class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
											<a href="<?= base_url('product/delete/' . $product['id']) ?>"
												class="btn btn-danger w-24">Hapus</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="edit<?= $product['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h2 class="font-medium text-base mr-auto">
											Edit Produk
										</h2>
									</div>
									<form action="<?= base_url('product/update/' . $product['id']) ?>" method="post"
										enctype="multipart/form-data">
										<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
											<div class="col-span-12">
												<label for="pos-form-1" class="form-label">Nama Produk</label>
												<input id="pos-form-2" type="text" required
													value="<?= $product['nama_produk'] ?>" class="form-control flex-1"
													name="nama" placeholder="Nama Produk">
											</div>
											<div class="col-span-12">
												<label for="pos-form-1" class="form-label">Penyimpanan</label>
												<select class="form-select w-full" required name="penyimpanan">
													<?php
													foreach ($penyimpanan as $row) {
														?>
														<option value="<?= $row['id'] ?>" <?php if ($row['id'] == $product['penyimpanan_id']) {
															  echo 'selected';
														  } ?>>
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
														<option value="<?= $category['id'] ?>" <?php if ($category['id'] == $product['kategori_id']) {
															  echo 'selected';
														  } ?>>
															<?= $category['nama_kategori'] ?>
														</option>
													<?php } ?>
												</select>
											</div>
											<div class="col-span-12">
												<label for="pos-form-2" required class="form-label">Stok</label>
												<input id="pos-form-2" type="number" class="form-control flex-1" value="<?= $product['stok'] ?>"
													name="stok" placeholder="Stok">
											</div>
											<div class="col-span-12">
												<label for="pos-form-2" class="form-label">Harga</label>
												<input id="pos-form-2" required type="number" class="form-control flex-1"
													name="harga" value="<?= $product['harga'] ?>" placeholder="Harga">
											</div>
											<div class="col-span-12">
												<label for="pos-form-2" class="form-label">Image Produk</label>
												<div class="flex w-full justify-center">
													<div id="multi-upload-button2"
														class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
														Click to browse
													</div>
													<div
														class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between">
														<span id="multi-upload-text2" class="p-2"></span>
														<div id="multi-upload-delete2" class="hidden"
															onclick="removeMultiUpload()">
															<svg xmlns="http://www.w3.org/2000/svg"
																class="fill-current text-red-700 w-3 h-3"
																viewBox="0 0 320 512">
																<path
																	d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z" />
															</svg>
														</div>
													</div>
												</div>
												<input type="file" name="image[]" id="multi-upload-input2" class="hidden"
													multiple />
											</div>
											<div class="col-span-12">
												<div id="images-container2"></div>
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

				</tbody>
			</table>
		</div>
	</div>


</div>

<script>
	multiUploadButton = document.getElementById("multi-upload-button");
	multiUploadInput = document.getElementById("multi-upload-input");
	imagesContainer = document.getElementById("images-container");
	multiUploadDisplayText = document.getElementById("multi-upload-text");
	multiUploadDeleteButton = document.getElementById("multi-upload-delete");

	multiUploadButton.onclick = function () {
		multiUploadInput.click();
	};

	multiUploadInput.addEventListener('change', function (event) {

		if (multiUploadInput.files) {
			let files = multiUploadInput.files;
			multiUploadDisplayText.innerHTML = files.length + ' files selected';
			imagesContainer.innerHTML = '';
			imagesContainer.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
			imagesContainer.classList.add("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
			multiUploadDeleteButton.classList.add("z-100", "p-2", "my-auto");
			multiUploadDeleteButton.classList.remove("hidden");
			Object.keys(files).forEach(function (key) {
				let file = files[key];
				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					let imageDiv = document.createElement('div');
					imageDiv.classList.add("h-10r", "mb-3", "w-full", "p-3", "rounded-sm", "bg-cover", "bg-center");
					imageDiv.style.backgroundImage = 'url(' + reader.result + ')';
					imagesContainer.appendChild(imageDiv);
				}
			})
		}
	})

	function removeMultiUpload() {
		imagesContainer.innerHTML = '';
		imagesContainer.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
		multiUploadInput.value = '';
		multiUploadDisplayText.innerHTML = '';
		multiUploadDeleteButton.classList.add("hidden");
		multiUploadDeleteButton.classList.remove("z-100", "p-2", "my-auto");
	}
</script>

<script>
	multiUploadButton2 = document.getElementById("multi-upload-button2");
	multiUploadInput2 = document.getElementById("multi-upload-input2");
	imagesContainer2 = document.getElementById("images-container2");
	multiUploadDisplayText2 = document.getElementById("multi-upload-text2");
	multiUploadDeleteButton2 = document.getElementById("multi-upload-delete2");

	multiUploadButton2.onclick = function () {
		multiUploadInput2.click();
	};

	multiUploadInput2.addEventListener('change', function (event) {

		if (multiUploadInput2.files) {
			let files = multiUploadInput2.files;
			multiUploadDisplayText2.innerHTML = files.length + ' files selected';
			imagesContainer2.innerHTML = '';
			imagesContainer2.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
			imagesContainer2.classList.add("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
			multiUploadDeleteButton2.classList.add("z-100", "p-2", "my-auto");
			multiUploadDeleteButton2.classList.remove("hidden");
			Object.keys(files).forEach(function (key) {
				let file = files[key];
				let reader = new FileReader();
				reader.readAsDataURL(file);
				reader.onload = function () {
					let imageDiv2 = document.createElement('div');
					imageDiv2.classList.add("h-10r", "mb-3", "w-full", "p-3", "rounded-sm", "bg-cover", "bg-center");
					imageDiv2.style.backgroundImage = 'url(' + reader.result + ')';
					imagesContainer2.appendChild(imageDiv2);
				}
			})
		}
	})

	function removeMultiUpload() {
		imagesContainer2.innerHTML = '';
		imagesContainer2.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
		multiUploadInput2.value = '';
		multiUploadDisplayText2.innerHTML = '';
		multiUploadDeleteButton2.classList.add("hidden");
		multiUploadDeleteButton2.classList.remove("z-100", "p-2", "my-auto");
	}
</script>
