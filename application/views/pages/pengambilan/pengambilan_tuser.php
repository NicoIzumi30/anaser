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
			
			<div class="grid grid-cols-12 gap-6 my-5">
				<!-- BEGIN: Users Layout -->
				<?php 
				foreach ($pengambilans as $pengambilan) {
					$all_image = $pengambilan['image'];
					$images = explode(',', $all_image);
					$image1 = $images[0];
				?>
				<div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
					<div class="box">
						<div class="p-5">
							<div
								class="h-40 2xl:h-56 image-fit rounded-md overflow-hidden before:block before:absolute before:w-full before:h-full before:top-0 before:left-0 before:z-10 before:bg-gradient-to-t before:from-black before:to-black/10">
								<img alt="Midone - HTML Admin Template" class="rounded-md"
									src="<?= base_url('uploads/produk/'.$image1) ?>">
								<div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <a href=""
										class="block font-medium text-base"><?= $pengambilan['nama_produk']; ?></a> <span
										class="text-white/90 text-xs mt-3"><?= $pengambilan['nama_kategori']; ?></span> </div>
							</div>
							<div class="text-slate-600 dark:text-slate-500 mt-5">
								<div class="flex items-center"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> Harga:
									Rp. <?= number_format($pengambilan['harga']) ?>
								</div>
							</div>
						</div>
						<div
							class="flex justify-center lg:justify-end items-center p-5 border-t border-slate-200/60 dark:border-darkmode-400">
							<a class="flex items-center text-primary mr-auto" href="#" data-tw-toggle="modal"
								data-tw-target="#preview<?=$pengambilan['id']?>"> <i data-lucide="eye" class="w-4 h-4 mr-1"></i> Preview </a>
						</div>
					</div>
				</div>
				<div id="preview<?=$pengambilan['id']?>" class="modal" tabindex="-1" aria-hidden="true">
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
										<td>: <?= $pengambilan['nama_produk']; ?></td>
									</tr>
									<tr>
										<td>Kategori</td>
										<td>: <?= $pengambilan['nama_kategori']; ?></td>
									</tr>
									<tr>
										<td>Harga</td>
										<td>: Rp. <?= number_format($pengambilan['harga']) ?></td>
									</tr>
								</table>
							</div>
							<?php foreach($images as $img){ ?>
							<img src="<?= base_url('uploads/produk/'.$img) ?>" class="col-span-4" alt="">
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
				<?php } ?>
				<!-- END: Users Layout -->
			</div>
		</div>

	</div>


</div>
