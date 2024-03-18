<style>
	.phoneNumber {
		cursor: pointer;
	}
</style>
<div class="w-full max-w-full">
	<div class="text my-5">
		<h2 class="text-lg font-medium mr-auto">Buku Kas</h2>
		<hr class="mb-3">
	</div>

	<div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
		<div class="container mx-auto my-3">
			<div class="grid grid-cols-12 mb-4">
				<div class="col-span-6 lg:col-span-4">
					<form action="<?= base_url('bukukas/konter') ?>" method="post">
						<div class="flex">
							<input type="date" class="form-input w-full ml-2" <?php if (isset ($tanggal)) {
								echo "value='$tanggal'";
							} ?> name="tanggal" placeholder="Tanggal">
							<select class="form-select mx-2" name="user_id">
								<option disabled selected>Pilihan Tuser</option>
								<?php foreach ($users as $user) { ?>
									<option value="<?= $user['id'] ?>" <?php if (isset ($tuser_id) && $user['id'] == $tuser_id) {
										  echo "selected";
									  } ?>>
										<?= $user['nama'] ?>
									</option>
								<?php } ?>

							</select>
							<button type="submit"
								class="bg-teal-400 hover:bg-teal-600 text-white font-bold rounded-md py-2 px-4 mx-2">Cari</button>
						</div>
					</form>
				</div>
				<div class="col-span-6 lg:col-span-8 text-end lg:m-3">
					<button class="btn btn-teal" data-tw-toggle="modal" data-tw-target="#pemasukan">Pemasukan</button>
					<button class="btn bg-red-500 text-white" data-tw-toggle="modal"
						data-tw-target="#pengeluaran">Pengeluaran</button>
				</div>
				<div id="pemasukan" class="modal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="font-medium text-base mr-auto">
									Tambahkan Pemasukan
								</h2>
							</div>
							<form action="<?= base_url('bukukas/pemasukan') ?>" method="post"
								enctype="multipart/form-data">
								<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Tanggal</label>
										<input id="pos-form-2" type="date" class="form-control flex-1" name="tanggal"
											placeholder="Tanggal">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Keperluan</label>
										<input id="pos-form-2" type="text" required class="form-control flex-1"
											name="keperluan" placeholder="Keperluan">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Nama Pelanggan</label>
										<input id="pos-form-2" type="text" required class="form-control flex-1"
											name="nama_pelanggan" placeholder="Nama Pelanggan">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Alamat</label>
										<input id="pos-form-2" type="text" required class="form-control flex-1"
											name="alamat" placeholder="Alamat">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">No Telp</label>
										<input id="pos-form-2" type="number" required class="form-control flex-1"
											name="no_telp" placeholder="No Telp">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Harga</label>
										<input id="pos-form-2" type="number" required class="form-control flex-1"
											name="harga" placeholder="Harga">
									</div>
								</div>
								<input type="hidden" name="k" value="true">

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

				<div id="pengeluaran" class="modal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="font-medium text-base mr-auto">
									Tambahkan Pengeluaran
								</h2>
							</div>
							<form action="<?= base_url('bukukas/pengeluaran') ?>" method="post"
								enctype="multipart/form-data">
								<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Tanggal</label>
										<input id="pos-form-2" type="date" class="form-control flex-1" name="tanggal"
											placeholder="Tanggal">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Keperluan</label>
										<input id="pos-form-2" type="text" required class="form-control flex-1"
											name="keperluan" placeholder="Keperluan">
									</div>
									<div class="col-span-12">
										<label for="pos-form-2" class="form-label">Harga</label>
										<input id="pos-form-2" type="number" required class="form-control flex-1"
											name="harga" placeholder="Harga">
									</div>
									<input type="hidden" name="k" value="true">
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
							Keperluan</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Pelanggan</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Alamat</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No HP</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Harga</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200 <?php if ($bukukas == null) {
					echo 'text-center';
				} ?>">
					<?php
					$no = 1;
					$pemasukan = 0;
					$pengeluaran = 0;
					foreach ($bukukas as $row) {
						if ($row['tipe'] == 'pemasukan') {
							$pemasukan += $row['harga'];
						} else {
							$pengeluaran += $row['harga'];
						}
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['tanggal']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['keperluan']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['nama_pelanggan']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['alamat']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 phoneNumber"
								data-phone="<?= $row['no_telp'] ?>">
								<?= $row['no_telp']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
								<?= number_format($row['harga']) ?>
							</td>
							<?php if ($row['tipe'] == 'pemasukan') { ?>
								<td><button class="btn bg-green-400 rounded-full "><i data-lucide="chevron-up"></i> </button>
								</td>
							<?php } else { ?>
								<td><button class="btn bg-red-400 rounded-full "><i data-lucide="chevron-down"></i> </button>
								</td>
							<?php } ?>
						</tr>
					<?php } ?>
					<tr>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">PENDAPATAN BULAN
							KEMARIN </td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
							<?= number_format($total_bulan_lalu) ?>
						</td>
						<td></td>

					</tr>
				</tbody>
			</table>

		</div>
	</div>
	<div class="grid grid-cols-12 p-3">
		<div class="col-span-6">
			<h5 class="text-md font-bold leading-none">Total Pendapatan Harian</h5>
		</div>
		<div class="col-span-6 text-right">
			<h5 class="text-md font-bold leading-none">Rp
				<?= number_format($pemasukan - $pengeluaran) ?>
			</h5>
		</div>
	</div>

</div>

<script>
	$(".phoneNumber").click(function () {
		var phoneNumber = $(this).data("phone");
		var formattedPhoneNumber = phoneNumber.replace(/^0/, "62");
		var whatsappLink = "https://wa.me/" + formattedPhoneNumber;
		window.open(whatsappLink, '_blank');
		// window.location.href = whatsappLink;
	});
</script>
