<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halproduk extends BaseController
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
        $data['content']        = 'hal-c-produk';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman produk';
        $data['data_produk'] = $this->model_crud->tampilproduk();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_produk)
    {  
        $data = [
            'content'          => 'hal-c-produk',
            'judul'            => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'        => 'Selamat datang di halaman produk',
            'detail_produk' => $this->model_crud->detailproduk($id_produk),
            'data_produk'   => $this->model_crud->tampilproduk(),
            'id_produk'     => $id_produk
        ];
        
                
        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if(!empty($inputan_foto->getBasename())){
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-produk/', $berkas_foto);
        }else{
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }
        
        $id_produk = $this->request->getPost('inputan_id_produk');
        
        $data = [
            'id_produk'         => $this->request->getPost('inputan_id_produk'),
            'nama_produk'        => $this->request->getPost('inputan_nama_produk'),
            'harga_produk'          => $this->request->getPost('inputan_harga_produk'),
            'kategori_produk'   => $this->request->getPost('inputan_kategori_produk'),
            'foto_produk'      => $berkas_foto,
        ];

        if(empty($id_produk)){
            //data baru
            $this->model_crud->simpanproduk($data, $id_produk);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('halproduk').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahproduk($data, $id_produk);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('halproduk').'"
            </script>';
        }
    }

    public function hapusdata($id_produk)
    {
        //hapus data
        $this->model_crud->hapusproduk($id_produk);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('halproduk').'"
            </script>';
    }
}

