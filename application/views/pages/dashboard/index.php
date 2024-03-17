<!-- BEGIN: General Report -->
<div class="col-span-12 mt-8">
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
			<div class="report-box zoom-in">
				<div class="box p-5">
					<div class="flex">
						<img src="<?= base_url('assets') ?>/images/item1.png" class="report-box__icon text-primary"
							alt="">
						<div class="ml-auto">
							<div class="report-box__indicator bg-success tooltip cursor-pointer"
								title="33% Higher than last month"> 20% <i data-lucide="chevron-up"
									class="w-4 h-4 ml-0.5"></i> </div>
						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp. <?= number_format($harian) ?></div>
					<div class="text-base text-slate-500 mt-1">Pendapatan Harian</div>
				</div>
			</div>
		</div>
		<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
			<div class="report-box zoom-in">
				<div class="box p-5">
					<div class="flex">
						<img src="<?= base_url('assets') ?>/images/item2.png" class="report-box__icon text-primary"
							alt="">
						<div class="ml-auto">
							<div class="report-box__indicator bg-danger tooltip cursor-pointer"
								title="2% Lower than last month"> 2% <i data-lucide="chevron-down"
									class="w-4 h-4 ml-0.5"></i> </div>
						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp. <?= number_format($bulanan) ?></div>
					<div class="text-base text-slate-500 mt-1">Pendapatan Bulanan</div>
				</div>
			</div>
		</div>
		<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
			<div class="report-box zoom-in">
				<div class="box p-5">
					<div class="flex">
						<img src="<?= base_url('assets') ?>/images/item3.png" class="report-box__icon text-primary"
							alt="">
						<div class="ml-auto">
							<div class="report-box__indicator bg-success tooltip cursor-pointer"
								title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
									class="w-4 h-4 ml-0.5"></i> </div>
						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp. 1.100,000</div>
					<div class="text-base text-slate-500 mt-1">Jumlah Hutang</div>
				</div>
			</div>
		</div>
		<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
			<div class="report-box zoom-in">
				<div class="box p-5">
					<div class="flex">
						<img src="<?= base_url('assets') ?>/images/item4.png" class="report-box__icon text-primary"
							alt="">
						<div class="ml-auto">
							<div class="report-box__indicator bg-success tooltip cursor-pointer"
								title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
									class="w-4 h-4 ml-0.5"></i> </div>
						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6"><?= $produk; ?></div>
					<div class="text-base text-slate-500 mt-1">Total Produk</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="col-span-12 rounded lg:col-span-6 mt-8">
	<div class="intro-y box p-5 mt-12 sm:mt-5">
		<div class="report-chart">
			<div class="h-[275px]">
				<canvas id="report-line-chart" class="mt-6 -mb-6"></canvas>
			</div>
		</div>
	</div>
</div>
