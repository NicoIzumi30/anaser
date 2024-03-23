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
		<div class="container mx-auto mt-3">
			<div class="grid grid-cols-12 mb-4">
				<div class="col-span-6 lg:col-span-4">
					<form action="<?= base_url('pelanggan') ?>" method="post">
						<div class="flex">
							<input type="text" class="form-input w-full ml-2" <?php if (isset ($nama)) {
								echo "value='$nama'";
							} ?> name="nama" placeholder="Nama Pelanggan">
							<button type="submit"
								class="bg-teal-400 hover:bg-teal-600 text-white font-bold rounded-md py-2 px-4 mx-2">Cari</button>
						</div>
					</form>
				</div>
				<div class="col-span-6 lg:col-span-8 text-right lg:m-3">
					<a href="<?=base_url('pelanggan/export_excel')?>" class="btn bg-red-500 text-white">Export Excel</a>
				</div>
			</div>
		</div>
		<div class="overflow-x-auto container mx-auto">
			<table class="table-auto min-w-full" id="example">
				<thead class="thead-light text-left">
					<tr>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Pelanggan</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Alamat</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							No HP</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200 <?php if ($kontak == null) {
					echo 'text-center';
				} ?>">
					<?php
					$no = 1;
					foreach ($kontak as $row) {
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['nama_pelanggan']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['alamat']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500 phoneNumber"
								data-phone="<?= $row['no_telp']; ?>">
								<?= $row['no_telp']; ?>
							</td>

						</tr>
					<?php } ?>

				</tbody>
			</table>

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
