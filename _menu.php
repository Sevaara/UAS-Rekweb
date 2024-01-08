<div class="row mb-5">
    <div class="col-12">
        <div class="mb-2">
            <center><b> - <span class="fa fa-user"></span> Menu Pengguna (<?= $session->get('hak_akses') ?>) - </b></center>
        </div>
        <div class="card col-12 border-success">
            <div class="card-body mx-auto">
                <?php if($session->get('hak_akses') == 'admin'){ ?>
                <a href="<?= base_url('halberanda') ?>" class="btn btn-primary btn-sm"><span class="fa fa-home"></span> <br/>Beranda</a>
                <a href="<?= base_url('halpenjualan') ?>" class="btn btn-secondary btn-sm"><span class="fa fa-list-alt"></span> <br/>Data Penjualan</a>
                <a href="<?= base_url('halproduk') ?>" class="btn btn-secondary btn-sm"><span class="fa fa-list-alt"></span> <br/>Data Produk</a>
                <a href="<?= base_url('halkasir') ?>" class="btn btn-secondary btn-sm"><span class="fa fa-users"></span> <br/>Data Kasir</a>
                <a href="<?= base_url('hallaporan') ?>" class="btn btn-success btn-sm"><span class="fa fa-list-alt"></span> <br/>Laporan</a>
                <a href="<?= base_url('halmasuk/keluar') ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')" class="btn btn-danger btn-sm"><span class="fa fa-bookmark"></span> <br/>Keluar</a>

                <?php } if($session->get('hak_akses') == 'bukan admin'){ ?>
                    
                <a href="<?= base_url('halberanda') ?>" class="btn btn-primary btn-sm"><span class="fa fa-home"></span> <br/>Beranda</a>
                <a href="<?= base_url('halpenjualan') ?>" class="btn btn-secondary btn-sm"><span class="fa fa-list-alt"></span> <br/>Data Penjualan</a>
                <a href="<?= base_url('hallaporan') ?>" class="btn btn-success btn-sm"><span class="fa fa-list-alt"></span> <br/>Laporan</a>
                <a href="<?= base_url('halmasuk/keluar') ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')" class="btn btn-danger btn-sm"><span class="fa fa-bookmark"></span> <br/>Keluar</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>