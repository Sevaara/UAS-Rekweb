<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (Kasir)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('halkasir/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_kasir" value="<?= $id_kasir ?>">                    

                    <div class="row mb-2">
                        <label class="col-4">Nama Kasir</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_kasirname" required value="<?= $detail_kasir->nama_kasir ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Password</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_password" required value="<?= $detail_kasir->password ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Hak Akses</label>
                        <div class="col-8">
                            <select name="inputan_hak_akses" required>
                                <?php if(!empty($detail_kasir->hak_akses)) { ?>
                                <option value="<?= $detail_kasir->hak_akses ?>"><?= $detail_kasir->hak_akses ?></option>
                                <?php } ?>
                                <option value="">Pilih Kategori</option>
                                <option value="admin" <?php if ($detail_kasir->hak_akses == 'admin') echo 'selected'; ?>>admin</option>
                                <option value="bukan admin" <?php if ($detail_kasir->hak_akses == 'bukan admin') echo 'selected'; ?>>bukan admin</option>

                            </select>
                        </div>
                    </div>


                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('halkasir'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (Kasir)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Kasir</th>
                            <th>Nama Kasir</th>
                            <th>Password</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_kasir as $kasir) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $kasir['id_kasir'] ?></td>
                            <td><?= $kasir['nama_kasir'] ?></td>
                            <td><?= $kasir['password'] ?></td>
                            <td>
                                <a href="<?= base_url('halkasir/detaildata/'.$kasir['id_kasir']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('halkasir/hapusdata/'.$kasir['id_kasir']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

