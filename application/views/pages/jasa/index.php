<div class="w-full max-w-full">
	<div class="text my-5">
		<h2 class="text-lg font-medium mr-auto">Jasa Perbaikan</h2>
		<hr class="mb-3">
	</div>

	<div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
		<div class="modal-footer mt-3">
			<button class="btn btn-teal" data-tw-toggle="modal" data-tw-target="#add">Add</button>
			<div id="add" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="font-medium text-base mr-auto">
								Tambahkan Data
							</h2>
						</div>
						<form action="<?= base_url('jasa/add') ?>" method="post" enctype="multipart/form-data">
							<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
								<?php if ($this->session->userdata('user_role') == 'admin') { ?>

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
								<?php } ?>
								<div class="col-span-12">
									<label for="pos-form-2" class="form-label">Seri HP</label>
									<input id="pos-form-2" type="text" required class="form-control flex-1" name="seri"
										placeholder="Seri HP">
								</div>
								<div class="col-span-12">
									<label for="pos-form-2" class="form-label">Kerusakan</label>
									<input id="pos-form-2" type="text" required class="form-control flex-1"
										name="kerusakan" placeholder="Kerusakan">
								</div>
								<div class="col-span-12">
									<label for="pos-form-1" class="form-label">Status</label>
									<select class="form-select w-full" name="status">
										<option disabled selected>Status</option>
										<option value="0">Belum Selesai</option>
										<option value="1">Sudah Selesai</option>
									</select>
								</div>
								<div class="col-span-12">
									<label for="pos-form-2" class="form-label">Harga</label>
									<input id="pos-form-2" type="number" required class="form-control flex-1"
										name="harga" placeholder="Harga">
								</div>
							</div>
							<input type="hidden" name="k" value="false">
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
						<?php if ($this->session->userdata('user_role') == 'admin') { ?>
							<th data-priority="2"
								class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
								Nama Tuser</th>
						<?php } ?>
						<th data-priority="3"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Seri HP</th>
						<th data-priority="4"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Kerusakan</th>
						<th data-priority="5"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Status</th>
						<th data-priority="6"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider ">
							Harga</th>
						<th data-priority="7"
							class="px-6 py-3 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
							Action</th>

					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200 <?php if ($jasa == null) {
					echo 'text-center';
				} ?>">
					<?php
					$no = 1;
					foreach ($jasa as $row) {
						if ($row['status'] == 0) {
							$status = 'Belum Selesai';
						} else {
							$status = 'Sudah Selesai';
						}
						?>
						<tr>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $no++; ?>
							</td>
							<?php if ($this->session->userdata('user_role') == 'admin') { ?>
								<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
									<?= $row['nama']; ?>
								</td>
								</td>
							<?php } ?>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['seri_hp']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['kerusakan']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $status; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<?= $row['harga']; ?>
							</td>
							<td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
								<div class="flex">
									<?php if ($row['lunas'] == 0) { ?>
										<a href="<?= base_url('jasa/lunas/' . $row['id']) ?>"
											class="btn btn-teal rounded-full mr-2">Lunas</a>
										<a href="<?= base_url('jasa/cancel/' . $row['id']) ?>"
											class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mr-2">Cancel</a>
									<?php } else { ?>
										<button
											class="btn btn-teal mr-2">Lunas</button>
									<?php } ?>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>

</div>
