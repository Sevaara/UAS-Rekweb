<?php
namespace App\Controllers;
use CodeIgniter\Controllers;

class Halberanda extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query_jumlah_penjualan = $this->db->query("SELECT count(id_penjualan) as jumlah_data from penjualan ")->getRow();
        $query_jumlah_produk = $this->db->query("SELECT count(id_produk) as jumlah_data from produk ")->getRow();
        $query_jumlah_kasir = $this->db->query("SELECT count(id_kasir) as jumlah_data from kasir ")->getRow();

        $query_dt_terakhir_penjualan = $this->db->query("SELECT * from penjualan order by id_penjualan DESC")->getRow();
        $query_dt_terakhir_produk = $this->db->query("SELECT * from produk order by id_produk DESC")->getRow();
        $query_dt_terakhir_kasir = $this->db->query("SELECT * from kasir order by id_kasir DESC")->getRow();

        $data['content']        = 'hal-c-beranda';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman beranda';
        $data['jumlah_data_penjualan']   = $query_jumlah_penjualan->jumlah_data;
        $data['jumlah_data_produk']      = $query_jumlah_produk->jumlah_data;
        $data['jumlah_data_kasir']       = $query_jumlah_kasir->jumlah_data;
        $data['dt_terakhir_penjualan']   = $query_dt_terakhir_penjualan->jumlah_penjualan.' produk terjual , Pada Tanggal: '.$query_dt_terakhir_penjualan->tgl_penjualan.' (Rp.'.$query_dt_terakhir_penjualan->total_penjualan.')';
        $data['dt_terakhir_produk']      = $query_dt_terakhir_produk->nama_produk;
        $data['dt_terakhir_kasir']       = $query_dt_terakhir_kasir->nama_kasir;
        
        echo view('_applayout', $data);
    }

}