<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halmasuk extends BaseController
{
    public function __construct()
    {
        //variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();

        //variabel session
        $this->session = session();
    }

    public function index()
    {
        $data['judul']          = 'Halaman Masuk';
        $data['sub_judul']      = 'Selamat datang di Aplikasi Ci4';
        
        if(empty($this->session->get('id_kasir'))) {
            echo view('hal-masuk', $data);
        } else {
            echo 
            '<script>
                alert("Anda sedang masuk di sistem, silahkan keluar / logout terlebih dulu");
                window.location = "'.base_url('halberanda').'"
            </script>';
        }
        
    }

    public function autentifikasi()
    {

        $nama_kasir = $this->request->getPost('inputan_kasirname');
        $password = $this->request->getPost('inputan_password');

        //mencari data kasir
        $data_kasir = $this->db->query("SELECT * FROM kasir where nama_kasir = '$nama_kasir' and password = '$password' ")->getRow();
        

        if(!empty($data_kasir->id_kasir)){
            //jika data kasir di temukan, sistem akan menyimpan data session kasir
            $simpan_session = [
                'id_kasir'   => $data_kasir->id_kasir,
                'nama_kasir'  => $data_kasir->nama_kasir,
                'password'  => $data_kasir->password,
                'hak_akses'  => $data_kasir->hak_akses,
            ];
            //mengatur simpan data session kasir
            $this->session->set($simpan_session);

            echo 
            '<script>
                alert("Selamat! Berhasil masuk ke sistem");
                window.location = "'.base_url('halberanda').'"
            </script>';

        } else {
            //jika data kasir tidak di temukan
            echo 
            '<script>
                alert("Maaf, gagal masuk ke sistem :( ");
                window.location = "'.base_url('halmasuk').'"
            </script>';
        }
    }

    public function keluar()
    { 
        $this->session->destroy();
        echo 
            '<script>
                alert("Keluar dari sistem");
                window.location = "'.base_url('halmasuk').'"
            </script>';
    }

    
}