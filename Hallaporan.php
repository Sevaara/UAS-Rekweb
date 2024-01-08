<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Hallaporan extends BaseController
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
        $data['content']        = 'hal-c-laporan';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman laporan';
            
        echo view('_applayout', $data);
    }

    public function laporanpenjualan()
    {   
        date_default_timezone_set('Asia/Jakarta');
        $tgl_terjual   = $this->request->getPost('inputan_tgl_terjual');
        $tgl_masuk   = $this->request->getPost('inputan_tgl_masuk');
        //tgl_mulai=tgl_terjual

        $data = [
            'data_penjualan' => $this->db->query("SELECT * FROM penjualan where tgl_penjualan between '$tgl_terjual' and '$tgl_masuk' ORDER BY id_penjualan DESC ")->getResultArray(),
            'tanggal_cetak'     => date('d-m-Y'),
        ];
        echo view('cetak-laporan-penjualan', $data);
    }



}