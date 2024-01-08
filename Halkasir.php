<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halkasir extends BaseController
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
        $data['content']        = 'hal-c-kasir';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman kasir';
        $data['data_kasir'] = $this->model_crud->tampilkasir();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_kasir)
    {  
        $data = [
            'content'      => 'hal-c-kasir',
            'judul'        => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'    => 'Selamat datang di halaman kasir',
            'detail_kasir' => $this->model_crud->detailkasir($id_kasir),
            'data_kasir'   => $this->model_crud->tampilkasir(),
            'id_kasir'     => $id_kasir
        ];

        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        
        $id_kasir = $this->request->getPost('inputan_id_kasir');
        
        $data = [
            'nama_kasir'  => $this->request->getPost('inputan_kasirname'),
            'password'  => $this->request->getPost('inputan_password'),
            'hak_akses' => $this->request->getPost('inputan_hak_akses'),
        ];

        if(empty($id_kasir)){
            //data baru
            $this->model_crud->simpankasir($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('halkasir').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahkasir($data, $id_kasir);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('halkasir').'"
            </script>';
        }
    }

    public function hapusdata($id_kasir)
    { 
        //hapus data
        $this->model_crud->hapuskasir($id_kasir);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('halkasir').'"
            </script>';
    }
}