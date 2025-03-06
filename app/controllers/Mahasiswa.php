<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul']  = 'Daftar Mahasiswa';   //ini untuk title
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();  //ini memanggil data menggunakan model
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);  //kirimkan $data di parameter, agar bisa di panggil
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul']  = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->gatMahasiswaById($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            header('Location: ' . BASEURE . '/mahasiswa');
        };
    }
}
