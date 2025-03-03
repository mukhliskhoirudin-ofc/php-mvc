<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'home';
        $data['nama'] = $this->model('User_model')->getUser();  //minta data ke model, User_model itu nama file di model, lalu masuk methodnya
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
