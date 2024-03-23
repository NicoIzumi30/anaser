<!-- BEGIN: Content -->
<style>
	.phoneNumber {
		cursor: pointer;
	}
</style>
<h2 class="intro-y text-lg font-medium mt-10">
	Data Operator
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
	<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
		<button class="btn btn-teal shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add">Tambah Users</button>
	</div>
	<div id="add" class="modal" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="font-medium text-base mr-auto">Tambah User</h2>
				</div>
				<form action="<?= base_url('users/add') ?>" method="post">
					<div class="modal-body">
						<div class="mb-2">
							<label for="regular-form-1" class="form-label">Nama Lengkap</label>
							<input id="regular-form-1" type="text" name="nama" class="form-control"
								placeholder="Nama Lengkap">
						</div>
						<div class="mb-2">
							<label for="regular-form-1" class="form-label">No Wa</label>
							<input id="regular-form-1" type="number" name="no_telp" class="form-control"
								placeholder="No Whatsapp">
						</div>
						<div class="mb-2">
							<label for="regular-form-1" class="form-label">Password</label>
							<input id="regular-form-1" type="password" name="password" class="form-control"
								placeholder="Password">
						</div>
					</div>
					<input type="hidden" name="role" value="2">
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
					<th class="whitespace-nowrap">Nama</th>
					<th class="text-center whitespace-nowrap">No Wa</th>
					<th class="text-center whitespace-nowrap">Role</th>
					<th class="text-center whitespace-nowrap">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($users as $row) {
					?>
					<tr class="intro-x">
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $no++ ?>
							</div>
						</td>
						<td>
							<div class="font-medium whitespace-nowrap">
								<?= $row['nama']; ?>
							</div>
						</td>
						<td class="text-center">
							<div class="font-medium whitespace-nowrap phoneNumber" data-phone="<?= $row['nomor_telp'] ?>">
								<?= $row['nomor_telp'] ?>
							</div>
						</td>
						<td class="text-center">
							<div class="font-medium whitespace-nowrap">
								<?= $row['role'] ?>
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
										<a href="<?= base_url('users/delete_operator/' . $row['id']) ?>"
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
									<h2 class="font-medium text-base mr-auto">Edit User</h2>
								</div>
								<form action="<?= base_url('users/update/' . $row['id']) ?>" method="post">
									<div class="modal-body">
										<div class="mb-2">
											<label for="regular-form-1" class="form-label">Nama Lengkap</label>
											<input id="regular-form-1" type="text" value="<?= $row['nama'] ?>" name="nama"
												class="form-control" placeholder="Nama Lengkap">
										</div>
										<div class="mb-2">
											<label for="regular-form-1" class="form-label">No Wa</label>
											<input id="regular-form-1" type="number" value="<?= $row['nomor_telp'] ?>"
												name="no_telp" class="form-control" placeholder="No Whatsapp">
										</div>
									</div>
									<input type="hidden" name="role" value="2">
									<div class="modal-footer">
										<button type="button" data-tw-dismiss="modal"
											class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
										<button type="submit" class="btn btn-teal shadow-md mr-2">Simpan</button>
									</div>
								</form>

							</div>
						</div>
					</div>
					<?php
				}
				?>
			</tbody>
		</table>
	</div>
	<!-- END: Data List -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->

<!-- END: Delete Confirmation Modal -->


</div>
<!-- END: Content -->
<script>
	$(".phoneNumber").click(function () {
		var phoneNumber = $(this).data("phone");
		var formattedPhoneNumber = phoneNumber.replace(/^0/, "62");
		var whatsappLink = "https://wa.me/" + formattedPhoneNumber;
		window.open(whatsappLink, '_blank');
		// window.location.href = whatsappLink;
	});
</script>
