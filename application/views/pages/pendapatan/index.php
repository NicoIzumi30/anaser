<style>
	.h10r {
		height: 10rem !important;
	}
</style>
<div class="w-full max-w-full">
	<div class="text my-5">
		<h2 class="text-lg font-medium mr-auto">Pendapatan</h2>
		<hr class="mb-3">
	</div>

	<div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
		<div class="container mx-auto mt-3">
			<div class="grid grid-cols-12 mb-4">
				<div class="col-span-4">
					<form action="<?= base_url('pendapatan') ?>" method="post">
						<div class="flex">
							<input type="date" class="form-input w-full ml-2" <?php if (isset ($tanggal)) {
								echo "value='$tanggal'";
							} ?> name="tanggal" placeholder="Tanggal">
							<button type="submit"
								class="btn btn-teal">Cari</button>
						</div>
					</form>
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
							Tanggal Pelunasan</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Tuser</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Nama Produk</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Stok Tersisa</th>
						<th
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Harga</th>
					</tr>
				</thead>
				<tbody
					class="bg-white divide-y divide-gray-200 <?php if ($pendapatans == null) {
						echo 'text-center';
					} ?>">
					<?php
					$no = 1;
					$total = 0;
					foreach ($pendapatans as $pendapatan) {
						$total += $pendapatan['harga'];
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pendapatan['tanggal_pelunasan']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pendapatan['nama']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pendapatan['nama_produk']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $pendapatan['stok']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
								<?= number_format($pendapatan['harga']) ?>
							</td>

						</tr>
					<?php } ?>
					<tr>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Total</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp.
							<?= number_format($total) ?>
						</td>

					</tr>
				</tbody>
			</table>
		</div>
	</div>


</div>
