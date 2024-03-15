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
		<div class="container mx-auto">
			<div id="preview" class="modal" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="font-medium text-base mr-auto">
								Detail Produk
							</h2>
							<div class="text-end">
								<i data-tw-dismiss="modal" data-lucide="x-circle"
									class="w-8 h-8 text-grey transform -rotate-90 cursor-pointer"></i>
							</div>
						</div>

						<div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
							<div class="col-span-12">
								<table class="table mx-auto">
									<tr>
										<td>Nama Produk</td>
										<td>: LCD Infinix Note 30 Pro</td>
									</tr>
									<tr>
										<td>Kategori</td>
										<td>: Sparepart</td>
									</tr>
									<tr>
										<td>Penyimpanan</td>
										<td>: 256 GB</td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>: Rp. 130,000</td>
									</tr>
									<tr>
										<td>Stok</td>
										<td>: 10</td>
									</tr>
								</table>
							</div>
							<img src="<?= base_url('assets/images/preview-10.jpg') ?>" class="col-span-4" alt="">
							<img src="<?= base_url('assets/images/preview-10.jpg') ?>" class="col-span-4" alt="">
							<img src="<?= base_url('assets/images/preview-10.jpg') ?>" class="col-span-4" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="grid grid-cols-12 gap-6 my-5">
				<!-- BEGIN: Users Layout -->
				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">LCD Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Sparepart</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 130,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 10 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">Earphone JBL</a> <span
										class="text-white/90 text-xs mt-3">Aksesoris</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 80,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 20 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">HP Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Handphone</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 2.580,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 5 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">Backdoor Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Sparepart</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 60,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 50 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>
				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">LCD Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Sparepart</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 130,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 10 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">Earphone JBL</a> <span
										class="text-white/90 text-xs mt-3">Aksesoris</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 80,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 20 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">HP Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Handphone</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 2.580,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 5 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>

				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('assets/images/') ?>preview-15.jpg">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base">Backdoor Infinix Note 30 Pro</a> <span
										class="text-white/90 text-xs mt-3">Sparepart</span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. 60,000
								</div>
								<div class="flex items-center mt-2"> <i data-lucide="layers" class="w-4 h-4 mr-2"></i>
									Stok : 50 </div>

							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>
				<!-- END: Users Layout -->
			</div>
		</div>

	</div>


</div>
