<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (Penjualan)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('halpenjualan/simpandata'); ?>">          
                    
                    <input type="hidden" class="form-control" name="inputan_id_penjualan" value="<?= $detail_penjualan->id_penjualan ?>" required>
                    
                    <div class="row mb-2">
                        <label class="col-4">tanggal penjualan</label>
                        <div class="col-8">
                        <input type="date" class="form-control" name="inputan_tgl_penjualan" value="<?= $detail_penjualan->tgl_penjualan ?>" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Produk</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_produk" required>
                                <?php foreach ($data_produk as $produk) { ?>
                                    <option value="<?= $produk['nama_produk'] ?>" <?php if ($detail_produk->nama_produk == $produk['nama_produk']) echo 'selected'; ?>>
                                        <?= $produk['nama_produk'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-4">jumlah Penjualan</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_jumlah" required><?= $detail_penjualan->jumlah_penjualan ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Total Penjualan</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_total" required><?= $detail_penjualan->total_penjualan ?></textarea>
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('halpenjualan') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (Penjualan)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Penjualan</th>
                            <th>Tanggal Penjualan</th>
                            <th>Jumlah Penjualan</th>
                            <th>Total Penjualan</th>
                            <th>Nama Produk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; if (is_array($data_penjualan)) foreach ($data_penjualan as $penjualan) { ?>
                            <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $penjualan['id_penjualan'] ?></td>
                            <td><?= $penjualan['tgl_penjualan'] ?></td>
                            <td>
                                <?= $penjualan['jumlah_penjualan'] ?>
                            </td>
                            <td> <?= $penjualan['total_penjualan'] ?> </td>
                            <td><?= $penjualan['nama_produk'] ?></td>
                            <td>
                                <a href="<?= base_url('halpenjualan/detaildata/'.$penjualan['id_penjualan']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('halpenjualan/hapusdata/'.$penjualan['id_penjualan']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


