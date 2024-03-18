<!-- BEGIN: General Report -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<div class="col-span-12 mt-8">
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
			<div class="report-box zoom-in">
				<div class="box p-5">
					<div class="flex">
						<img src="<?= base_url('assets') ?>/images/item1.png" class="report-box__icon text-primary"
							alt="">
						<div class="ml-auto">

						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp.
						<?= number_format($harian) ?>
					</div>
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

						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp.
						<?= number_format($bulanan) ?>
					</div>
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

						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">Rp.
						<?= number_format($hutang) ?>
					</div>
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

						</div>
					</div>
					<div class="text-3xl font-medium leading-8 mt-6">
						<?= $produk; ?>
					</div>
					<div class="text-base text-slate-500 mt-1">Total Produk</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-span-12 rounded lg:col-span-6 mt-8">
	<div class="intro-y box p-5 mt-12 sm:mt-5">
		<div class="flex justify-end" style="width: 150px;">
			<select class="form-select w-full rounded-md" id="chartType" name="grafik">
				<option value="bulanan">Grafik Bulanan</option>
				<option value="tahunan">Grafik Tahunan</option>
			</select>
		</div>
		<div class="report-chart">
			<div class="bulanan">
				<div id="chart-month" class="mt-3">
				</div>
			</div>

			<div class="tahunan" style="display: none;">
				<div id="chart-year" class="mt-3">
				</div>
			</div>

		</div>
	</div>
</div>
<script>

	document.addEventListener('DOMContentLoaded', function () {
		var income_data = '<?php echo $monthly_income; ?>'; // Mendapatkan data pendapatan dari PHP
		var monthly_income = JSON.parse(income_data); // Mengonversi string JSON ke objek JavaScript
		// Menginisialisasi data chart
		var options = {
			chart: {
				type: 'bar',
				height: 500,
				width: '100%',
			},
			plotOptions: {
				bar: {
					horizontal: true,
				}
			},
			series: [{
				name: 'Monthly Income',
				data: Object.values(monthly_income) // Menggunakan nilai dari objek JavaScript
			}],
			xaxis: {
				categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
			},
			yaxis: {
				title: {
					text: 'Total Income'
				}
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart-month"), options);
		chart.render();
	});

</script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		var yearly_income = <?php echo $yearly_income; ?>;

		var options = {
			chart: {
				type: 'bar',
				height: 500,
				width: '100%',
			},
			plotOptions: {
				bar: {
					horizontal: false,
				}
			},
			series: [{
				name: 'Yearly Income',
				data: Object.values(yearly_income)
			}],
			xaxis: {
				categories: Object.keys(yearly_income)
			},
			yaxis: {
				title: {
					text: 'Total Income'
				}
			}
		};

		var chart = new ApexCharts(document.querySelector("#chart-year"), options);
		chart.render();


	});
</script>
<script>
	document.getElementById('chartType').addEventListener('change', function () {
		var chartType = this.value;

		if (chartType === 'bulanan') {
			document.querySelector('.bulanan').style.display = 'block';
			document.querySelector('.tahunan').style.display = 'none';
		} else if (chartType === 'tahunan') {
			document.querySelector('.bulanan').style.display = 'none';
			document.querySelector('.tahunan').style.display = 'block';
		}
	});
</script>
