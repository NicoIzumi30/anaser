<div class="grid grid-cols-10 mt-5">
    <!-- BEGIN: Data List -->

    <div class="intro-y col-span-8 lg:col-span-6 overflow-auto lg:overflow-visible">
        <div class="block bg-white border border-gray-200 rounded-md shadow p-3">
            <form action="<?=base_url('profile/update_tuser')?>" method="post">
            <div class="mb-2">
                <label for="regular-form-1" class="form-label">Nama Lengkap</label>
                <input id="regular-form-1" type="text" name="nama" class="form-control" value="<?=$user['nama']?>" placeholder="Nama Lengkap">
            </div>
			<div class="mb-2">
                <label for="regular-form-1" class="form-label">Nama Konter</label>
                <input id="regular-form-1" type="text" name="konter" class="form-control" value="<?=$user['nama_konter']?>" placeholder="Nama Konter">
            </div>
            <div class="mb-2">
                <label for="regular-form-2" class="form-label">No Telp</label>
                <input id="regular-form-2" type="number" name="no_telp" class="form-control" value="<?=$user['nomor_telp']?>" placeholder="Nomor WA">
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-teal-400 hover:bg-teal-600 text-white font-bold rounded-md py-2 px-4">Simpan</button>
            </div>
            </form>
        </div>
    </div>
    <?= $this->session->flashdata('pesan'); ?>
    <div class="intro-y col-span-8 lg:col-span-6 overflow-auto lg:overflow-visible mt-4">
        <div class="block bg-white border border-gray-200 rounded-md shadow p-3">
            <form action="<?=base_url('profile/update_password')?>" method="post">
            <div class="mb-2">
                <label for="regular-form-1" class="form-label">Password Saat Ini</label>
                <input id="regular-form-1" type="password" class="form-control"  name="current_password" placeholder="Password Saat Ini">
            </div>
            <div class="mb-2">
                <label for="regular-form-1" class="form-label">Password Baru</label>
                <input id="regular-form-1" type="password" class="form-control"  name="new_password"  placeholder="Password Baru">
            </div>
            <div class="modal-footer">
                <button type="submit" class="bg-teal-400 hover:bg-teal-600 text-white font-bold rounded-md py-2 px-4">Simpan</button>
            </div>
            </form>
        </div>
    </div>
    <!-- END: Data List -->
</div>
