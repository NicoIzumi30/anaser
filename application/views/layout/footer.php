</div>

<script src="<?= base_url('assets') ?>/js/app.js"></script>
<script src="<?= base_url('assets') ?>/js/scripta.js"></script>
<script src="<?=base_url('assets/js/dataTables.js')?>"></script>
<script src="<?= base_url('assets/js') ?>/dataTables.tailwindcss.js"></script>
<script src="<?= base_url('assets/js') ?>/3.4.1.js"></script>

<script>
	// let table = new DataTable('#example');
	let table = new DataTable('#example', {
		searching: false,
		paging: false
	});

	// let table = $('#example').dataTable({searching: true, paging: false, info: false});
</script>
<!-- END: JS Assets-->
</body>

</html>
