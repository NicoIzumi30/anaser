<!-- BEGIN: Content -->

<h2 class="intro-y text-lg font-medium mt-10">
    Data Sampah
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add">Tambah Sampah</button>
    </div>
    <div id="add" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Tambah Data Sampah</h2>
                </div>
                <form action="<?= base_url('sampah/add') ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Kategori</label>
                            <select data-placeholder="Pilih Kategori" name="kategori_id" class="tom-select w-full">
                                <option disabled selected>Pilih Kategori</option>
                                <?php
                                foreach ($kategori as $row) {
                                ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['nama_kategori'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Nama Sampah</label>
                            <input id="regular-form-1" type="text" class="form-control" name="nama" placeholder="Nama Sampah">
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Bahan</label>
                            <input id="regular-form-1" type="text" class="form-control" name="bahan" placeholder="Bahan Sampah">
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Jenis</label>
                            <input id="regular-form-1" type="text" class="form-control" name="jenis" placeholder="Jenis Sampah">
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Cara Daur Ulang</label>
                            <input id="regular-form-1" type="text" class="form-control" name="cara" placeholder="Cara Daur Ulang">
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Lama Terurai</label>
                            <input id="regular-form-1" type="text" class="form-control" name="lama" placeholder="Lama Terurai">
                        </div>
                        <div class="mb-2">
                            <label for="regular-form-1" class="form-label">Deskripsi</label>
                            <textarea id="message" rows="4" name="deskripsi" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsi Sampah"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
                        <button type="submit" class="btn btn-primary shadow-md mr-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">No</th>
                    <th class="whitespace-nowrap">Kode</th>
                    <th class="text-center whitespace-nowrap">Nama Sampah</th>
                    <th class="text-center whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($sampah as $row) {
                ?>
                    <tr class="intro-x">
                        <td>
                            <div class="font-medium whitespace-nowrap"><?= $no++ ?></div>
                        </td>
                        <td>
                            <div class="font-medium whitespace-nowrap"><?= $row['kode'] ?></div>
                        </td>
                        <td class="text-center">
                            <div class="font-medium whitespace-nowrap"><?= $row['nama_sampah'] ?></div>
                        </td>
                        <td class="">
                            <div class="flex justify-center items-center">
                                <a class="btn btn-danger shadow-md mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete<?= $row['id'] ?>"> Hapus</a>
                                <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#edit<?= $row['id'] ?>">Edit</button>
                                <a class="btn btn-info shadow-md mr-2" target="_blank" href="<?= base_url('sampah/print/' . $row['id']) ?>"> <i data-lucide="printer"></i> Print</a>
                            </div>
                        </td>
                    </tr>
                    <div id="delete<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">Apa anda yakin?</div>
                                        <div class="text-slate-500 mt-2">
                                            Apakah Anda ingin menghapus data ini?
                                            <br>
                                            Proses ini tidak dapat dibatalkan.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
                                        <a href="<?= base_url('sampah/delete/' . $row['id']) ?>" class="btn btn-danger w-24">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="edit<?= $row['id'] ?>" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="font-medium text-base mr-auto">Edit Sub Kategori</h2>
                                </div>
                                <form action="<?= base_url('sampah/update/' . $row['id']) ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Kategori</label>
                                            <select data-placeholder="Pilih Kategori" name="kategori_id" class="tom-select w-full">
                                                <?php
                                                $kategori_id = $row['kategori_id'];
                                                foreach ($kategori as $kat) {
                                                ?>
                                                    <option value="<?= $kat['id'] ?>" <?php if ($kategori_id == $kat['id']) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $kat['nama_kategori'] ?></option> <?php } ?>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Nama Sampah</label>
                                            <input id="regular-form-1" type="text" name="nama" class="form-control" value="<?= $row['nama_sampah'] ?>" placeholder="Nama Sampah">
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Bahan</label>
                                            <input id="regular-form-1" type="text" class="form-control" value="<?= $row['bahan'] ?>" name="bahan" placeholder="Bahan Sampah">
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Jenis</label>
                                            <input id="regular-form-1" type="text" value="<?= $row['jenis_sampah'] ?>" class="form-control" name="jenis" placeholder="Jenis Sampah">
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Cara Daur Ulang</label>
                                            <input id="regular-form-1" type="text" name="cara" class="form-control" value="<?= $row['cara_daur_ulang'] ?>" placeholder="Cara Daur Ulang">
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Lama Terurai</label>
                                            <input id="regular-form-1" type="text" name="lama" class="form-control" value="<?= $row['lama_terurai'] ?>" placeholder="Lama Terurai">
                                        </div>
                                        <div class="mb-2">
                                            <label for="regular-form-1" class="form-label">Deskripsi</label>
                                            <textarea id="message" rows="4" name="deskripsi" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Deskripsi Sampah"><?= $row['deskripsi'] ?></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Batalkan</button>
                                        <button type="submit" class="btn btn-primary shadow-md mr-2">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->

<!-- END: Delete Confirmation Modal -->


</div>
<!-- END: Content -->