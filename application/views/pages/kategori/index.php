<!-- BEGIN: Content -->


<div class="grid grid-cols-12 mb-4">
<div class="col-span-12 lg:col-span-6 m-3">
<h2 class="intro-y text-lg font-medium mt-10">
	Data Kategori
</h2>
	<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
		<button class="btn btn-teal shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add">Tambah
			Kategori</button>
	</div>
	<div id="add" class="modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="font-medium text-base mr-auto">Tambah Kategori</h2>
				</div>
				<form action="<?= base_url('kategori/add') ?>" method="post">
					<div class="modal-body">
						<div class="mb-2">
							<label for="regular-form-1" class="form-label">Nama Kategori</label>
							<input id="regular-form-1" type="text" name="nama" required class="form-control"
								placeholder="Nama Kategori">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-tw-dismiss="modal"
							class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
						<button type="submit" class="btn btn-teal shadow-md mr-2">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- BEGIN: Data List -->
	<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
		<table class="table table-report -mt-2">
			<thead>
				<tr>
					<th class="whitespace-nowrap">No</th>
					<th class="whitespace-nowrap">Kategori</th>
					<th class="text-center whitespace-nowrap">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($kategori as $row) {
					?>
					<tr class="intro-x">
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $no++ ?>
							</div>
						</td>
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $row['nama_kategori']; ?>
							</div>
						</td>
						<td class="">
							<div class="flex justify-center items-center">
								<a class="btn btn-danger shadow-md mr-2" href="javascript:;" data-tw-toggle="modal"
									data-tw-target="#delete<?= $row['id'] ?>"> Hapus</a>
								<button class="btn btn-teal shadow-md mr-2" data-tw-toggle="modal"
									data-tw-target="#edit<?= $row['id'] ?>">Edit</button>
							</div>
						</td>
					</tr>
					<div id="delete<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
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
										<a href="<?= base_url('kategori/delete/' . $row['id']) ?>"
											class="btn btn-danger w-24">Hapus</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="edit<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
								</div>
								<form action="<?= base_url('kategori/update/' . $row['id']) ?>" method="post">
									<div class="modal-body">
										<div>
											<label for="regular-form-1" class="form-label">Nama Kategori</label>
											<input id="regular-form-1" required type="text" name="nama" class="form-control"
												value="<?= $row['nama_kategori'] ?>" placeholder="Nama Kategori">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-tw-dismiss="modal"
											class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
										<button type="submit" class="btn btn-teal shadow-md mr-2">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- END: Data List -->
</div>
<div class="col-span-12 lg:col-span-6 m-3">
<h2 class="intro-y text-lg font-medium mt-10">
	Data Penyimpanan
</h2>
	<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
		<button class="btn btn-teal shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add">Tambah
			Penyimpanan</button>
	</div>
	<div id="add" class="modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="font-medium text-base mr-auto">Tambah Penyimpanan</h2>
				</div>
				<form action="<?= base_url('kategori/add_penyimpanan') ?>" method="post">
					<div class="modal-body">
						<div class="mb-2">
							<label for="regular-form-1" class="form-label">Penyimpanan</label>
							<input id="regular-form-1" type="text" required name="penyimpanan" class="form-control"
								placeholder="Penyimpanan">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" data-tw-dismiss="modal"
							class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
						<button type="submit" class="btn btn-teal shadow-md mr-2">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- BEGIN: Data List -->
	<div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
		<table class="table table-report -mt-2">
			<thead>
				<tr>
					<th class="whitespace-nowrap">No</th>
					<th class="whitespace-nowrap">Penyimpanan</th>
					<th class="text-center whitespace-nowrap">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($penyimpanan as $row) {
					?>
					<tr class="intro-x">
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $no++ ?>
							</div>
						</td>
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $row['penyimpanan']; ?>
							</div>
						</td>
						<td class="">
							<div class="flex justify-center items-center">
								<a class="btn btn-danger shadow-md mr-2" href="javascript:;" data-tw-toggle="modal"
									data-tw-target="#delete_<?= $row['id'] ?>"> Hapus</a>
								<button class="btn btn-teal shadow-md mr-2" data-tw-toggle="modal"
									data-tw-target="#edit_<?= $row['id'] ?>">Edit</button>
							</div>
						</td>
					</tr>
					<div id="delete_<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
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
										<a href="<?= base_url('kategori/delete_penyimpanan/' . $row['id']) ?>"
											class="btn btn-danger w-24">Hapus</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="edit_<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
								</div>
								<form action="<?= base_url('kategori/update_penyimpanan/' . $row['id']) ?>" method="post">
									<div class="modal-body">
										<div>
											<label for="regular-form-1" class="form-label">Penyimpanan</label>
											<input id="regular-form-1" required type="text" name="penyimpanan" class="form-control"
												value="<?= $row['penyimpanan'] ?>" placeholder="Penyimpanan">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-tw-dismiss="modal"
											class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
										<button type="submit" class="btn btn-teal shadow-md mr-2">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- END: Data List -->
</div>

<!-- END: Content -->
