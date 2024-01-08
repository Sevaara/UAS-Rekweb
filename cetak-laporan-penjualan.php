<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak - Laporan Penjualan</title>
	<!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
</head>
<body>
	<div style="height: 20px; width: 100%; background-color: green;"></div>
	<div class="m-5">
		<h1>Aplikasi UAS Rekayasa Web</h1>
		<h3>Laporan Penjualan (<?= date("d/M, Y", strtotime($tanggal_cetak)) ?>)</h4>

		<table class="table table-bordered mt-5">
			<thead>
			    <tr>
			        <th>No.</th>
                            <th>Id Penjualan</th>
                            <th>Tanggal Penjualan</th>
                            <th>Jumlah Penjualan</th>
                            <th>Total Penjualan</th>
                            <th>Nama Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; if (is_array($data_penjualan)) foreach ($data_penjualan as $penjualan) { ?>
                            <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td><?= $penjualan['id_penjualan'] ?></td>
                            <td>
                               <hr style="margin : 0">
                                Tgl. Jual (<?= $penjualan['tgl_penjualan'] ?>)
                            </td>
                            <td>
                                <?= $penjualan['jumlah_penjualan'] ?>
                            </td>
                            <td> <?= $penjualan['total_penjualan'] ?> </td>
                            <td><?= $penjualan['nama_produk'] ?></td>
			    </tr>
			    <?php } ?>
			</tbody>
		</table>
	</div>

	<div style="height: 20px; width: 100%; background-color: black; position: absolute; bottom: 0;"></div>
</body>
</html>
<script type="text/javascript">
	window.print();
	window.onfocus = function(){ window.close(); }
</script>