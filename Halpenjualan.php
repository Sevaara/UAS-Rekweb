<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halpenjualan extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();
        
        //membuat variabel baru untuk menggunakan models crud.php
        $this->model_crud = new crud;

    }

    public function index()
    {
        $data['content']        = 'hal-c-penjualan';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman penjualan';
        $data['data_penjualan'] = $this->model_crud->tampilpenjualan();
        $data['data_produk']    = $this->model_crud->tampilproduk();
        $data['data_kasir']    = $this->model_crud->tampilkasir();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_penjualan)
    {  
        $data = [
            'content'             => 'hal-c-penjualan',
            'judul'               => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'           => 'Selamat datang di halaman penjualan',
            'detail_penjualan' => $this->model_crud->detailpenjualan($id_penjualan),
            'detail_produk' => $this->model_crud->detailproduk($id_produk),
            'data_penjualan'   => $this->model_crud->tampilpenjualan(),
            'data_produk'      => $this->model_crud->tampilproduk(),
            'data_kasir'       => $this->model_crud->tampilkasir(),
            'id_penjualan'     => $id_penjualan
        ];
         
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id_penjualan = $this->request->getPost('inputan_id_penjualan');
        
        // Fetch the list of products for the dropdown
        $data['produk_list'] = $this->model_crud->tampilproduk();

        $data_penjualan = [
            'tgl_penjualan'      => date('Y-m-d'),
            'nama_produk'        => $this->request->getPost('inputan_nama_produk'),
            'jumlah_penjualan'   => $this->request->getPost('inputan_jumlah'),
            'total_penjualan'    => $this->request->getPost('inputan_total'),
        ];

        if (empty($id_penjualan)) {
            // Data baru
            $this->model_crud->simpanpenjualan($data_penjualan);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('halpenjualan') . '"
            </script>';
        } else {
            // Ubah data
            $this->model_crud->ubahpenjualan($data_penjualan, $id_penjualan);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('halpenjualan') . '"
            </script>';
        }
    }

    public function hapusdata($id_penjualan)
    {
        //hapus data
        $this->model_crud->hapuspenjualan($id_penjualan);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('halpenjualan').'"
            </script>';
    }
}

