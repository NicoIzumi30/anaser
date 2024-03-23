</div>

<script src="<?= base_url('assets') ?>/js/app.js"></script>
<script src="<?= base_url('assets') ?>/js/scripta.js"></script>
<!-- <script src="<?= base_url('assets/js/dataTables.js') ?>"></script>
<script src="<?= base_url('assets/js') ?>/dataTables.tailwindcss.js"></script>
<script src="<?= base_url('assets/js') ?>/3.4.1.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<!--Datatables -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
	// let table = new DataTable('#example');
	// let table = new DataTable('#example', {
	// 	searching: false,
	// 	paging: true,
	// 	responsive: true
	// });
	// .columns.adjust()
	// .responsive.recalc();
	$(document).ready(function () {

		var table = $('#example').DataTable({
			responsive: true
		})
			.columns.adjust()
			.responsive.recalc();
	});
	// let table = $('#example').dataTable({searching: true, paging: false, info: false});
</script>
<!-- END: JS Assets-->
</body>

</html>
