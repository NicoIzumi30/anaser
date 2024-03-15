

<!-- BEGIN: Content -->
<h2 class="intro-y text-lg font-medium mt-10">
    Data Berita
</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#add">Tambah Berita</button>
    </div>
    <div id="add" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Tambah Berita</h2>
            </div>
            <form action="<?=base_url('berita/add')?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                <div class="mb-2">
                    <label for="regular-form-1" class="form-label">Judul Berita</label>
                    <input id="regular-form-1" type="text" name="judul" class="form-control" placeholder="Judul Berita">
                </div>
                <div class="mb-2">
                    <label for="regular-form-1" class="form-label">Isi Berita</label>
                    <textarea id="message" rows="5" name="isi" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi Berita"></textarea>
                </div>
                <div class="mb-2">
                <label for="regular-form-1" class="form-label">Gambar</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" id="file_input" type="file">
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
                    <th class="whitespace-nowrap">Judul</th>
                    <th class="text-center whitespace-nowrap">Isi</th>
                    <th class="text-center whitespace-nowrap">Gambar</th>
                    <th class="text-center whitespace-nowrap">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                function shorter($text, $limit = 100, $end = '...') {
                    if (strlen($text) > $limit) {
                        return substr($text, 0, $limit) . $end;
                    }
                    return $text;
                }
                $no = 1;
                foreach($berita as $row){
                    $isi_berita = $this->Berita_model->short($row['isi']);
                    $judul = $this->Berita_model->short($row['judul']);
                ?>
                <tr class="intro-x">
                    <td>
                        <div class="font-medium whitespace-nowrap"><?= $no++; ?></div>
                    </td>
                    <td>
                        <div class="font-medium whitespace-nowrap"><?= $judul; ?></div>
                    </td>
                    <td class="text-center">
                        <div class="font-medium whitespace-nowrap"><?= $isi_berita; ?></div>
                    </td>
                    <td class="text-center">
                        <center>
                            <img src="<?= base_url('uploads/berita/'.$row['gambar']) ?>" width="110px" alt="">
                        </center>
                    </td>
                    <td class="">
                        <div class="flex justify-center items-center">
                            <a class="btn btn-danger shadow-md mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete<?=$row['id']?>"> Hapus</a>
                            <button class="btn btn-primary shadow-md mr-2" data-tw-toggle="modal" data-tw-target="#edit<?=$row['id']?>">Edit</button>
                        </div>
                    </td>
                </tr>
                <div id="delete<?=$row['id']?>" class="modal" tabindex="-1" aria-hidden="true">
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
                    <a href="<?=base_url('berita/delete/'.$row['id'])?>" class="btn btn-danger w-24">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit<?=$row['id']?>" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">Edit Kategori</h2>
            </div>
            <form action="<?=base_url('berita/update/'.$row['id'])?>" enctype="multipart/form-data" method="post">
            <div class="modal-body">
                <div class="mb-2">
                    <label for="regular-form-1" class="form-label">Judul Berita</label>
                    <input id="regular-form-1" type="text" name="judul" class="form-control" value="<?=$row['judul']?>" placeholder="Judul Berita">
                </div>
                <div class="mb-2">
                    <label for="regular-form-1" class="form-label">Isi Berita</label>
                    <textarea id="message" rows="5" name="isi" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi Berita"><?=$row['isi']?></textarea>
                </div>
                <div class="mb-2">
                <label for="regular-form-1" class="form-label">Gambar (opsional)</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="image" id="file_input" type="file">
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

</div>
<!-- END: Content -->