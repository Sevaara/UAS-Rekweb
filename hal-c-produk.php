<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (produk)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('halproduk/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_produk" value="<?= $id_produk ?>">                    
                    
                    <?php if(empty($id_produk)){ ?> 
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-produk/'.$detail_produk->foto_produk ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>
                    
                    <div class="row mb-2">
                        <label class="col-4">Nama</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_produk" required value="<?= $detail_produk->nama_produk ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Harga</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_harga_produk" required value="<?= $detail_produk-> harga_produk ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Kategori</label>
                        <div class="col-8">
                            <select name="inputan_kategori_produk" required>
                                <?php if(!empty($detail_produk->kategori_produk)) { ?>
                                <option value="<?= $detail_produk->kategori_produk ?>"><?= $detail_produk->kategori_produk ?></option>
                                <?php } ?>
                                <option value="">Pilih Kategori</option>
                                <option value="Action Figure" <?php if ($detail_produk->kategori_produk == 'Action Figure') echo 'selected'; ?>>Action Figure</option>
                                <option value="Buku" <?php if ($detail_produk->kategori_produk == 'Buku') echo 'selected'; ?>>Buku</option>
                                <option value="Acc" <?php if ($detail_produk->kategori_produk == 'ACC') echo 'selected'; ?>>Accesories</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_produk->foto_produk ?>">
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('halproduk'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (produk)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id produk</th>
                            <th>Nama produk</th>
                            <th>Harga produk</th>
                            <th>Kategori Produk</th>
                            <th>Foto Produk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_produk as $produk) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $produk['id_produk'] ?></td>
                            <td><?= $produk['nama_produk'] ?></td>
                            <td><a>Rp. </a><?= $produk['harga_produk'] ?></td>
                            <td><?= $produk['kategori_produk'] ?></td>
                            <td>
                                <img src="<?= base_url().'/public/foto-produk/'.$produk['foto_produk'] ?>" height="100%" width="90px" style="border: 2.5px solid grey;">
                            </td>
                            <td>
                                <a href="<?= base_url('halproduk/detaildata/'.$produk['id_produk']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('halproduk/hapusdata/'.$produk['id_produk']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

