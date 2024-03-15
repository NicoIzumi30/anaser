<style>
	.h10r{
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
					<div class="flex">
						<select class="form-select w-full">
							<option value="">Semua</option>
							<option value="elektronik">Pilihan 1</option>
							<option value="pakaian">Pilihan 2</option>
							<option value="makanan">Pilihan 3</option>
						</select>
						<input type="text" class="form-input w-full ml-2" placeholder="Cari produk">
						<button type="button"
							class="btn btn-teal mx-2">Cari</button>
					</div>
				</div>

				<?php if($this->session->userdata('user_role') == 'admin'){ ?>
				<div class="col-span-4 lg:col-span-8 text-right">
					<button type="button" class="btn btn-teal mx-2"
						data-tw-toggle="modal" data-tw-target="#addPengambilan">Add</button>
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
					<form action="<?= base_url('product/add') ?>" method="post" enctype="multipart/form-data">
						<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
							<div class="col-span-12">
								<label for="pos-form-1" class="form-label">Nama Tuser</label>
								<select class="form-select w-full" name="nama">
									<option value="">Heru</option>
									<option value="elektronik">Rehan</option>
									<option value="pakaian">Jose</option>
								</select>
							</div>
							<div class="col-span-12">
								<label for="pos-form-2" class="form-label">Tanggal</label>
								<input id="pos-form-2" type="date" class="form-control flex-1" name="tanggal"
									placeholder="Tanggal">
							</div>
							<div class="col-span-12">
								<label for="pos-form-1" class="form-label">Nama Produk</label>
								<select class="form-select w-full" name="produk">
									<option value="">HP Infinix</option>
									<option value="elektronik">LCD Redmi</option>
									<option value="pakaian">Pilihan 2</option>
									<option value="makanan">Pilihan 3</option>
								</select>
							</div>
						</div>
						<div class="modal-footer text-right">
							<button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-32 mr-1">Cancel</button>
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
				<tbody class="bg-white divide-y divide-gray-200">
					<tr>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">1</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">30-09-2022</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Heru</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">LCD+TS INFINIX HOT 10 PLAY/HOT 11</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp. 120,000</td>
						<?php if ($this->session->userdata('user_role') == 'admin') { ?>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
							<div class="flex">
								<a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Lunas</a>
								<a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2">Cancel</a>
							</div>
						</td>
						<?php } ?>
					</tr>
					<tr>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">2</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">30-10-2022</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rehan</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">LCD+TS INFINIX HOT 10 PLAY/HOT 11</td>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">Rp. 150,000</td>
						<?php if ($this->session->userdata('user_role') == 'admin') { ?>
						<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
							<div class="flex">
								<a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Lunas</a>
								<a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2">Cancel</a>
							</div>
						</td>
						<?php } ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


</div>

