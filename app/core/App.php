<?php

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        //controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) { //cek ada gk file di folder contrlr sesuai dgn url yg ditulis
            //kalo ada timpa, maka akan menjadi controller yang baru
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';    //lalu panggil contoller barunya
        $this->controller = new $this->controller;


        //method
        if (isset($url[1])) {   //kalau ada method
            if (method_exists($this->controller, $url[1])) { //cek methodnya ada gk di contoller
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        //params
        if (!empty($url)) {
            $this->params = array_values($url); // ambil datanya gunakan array_values
        }


        //jalanlan controller & method, serta kirimkan params jika ada gunakan call_user_func_array
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');     //rtrim = untuk hilangkan tanda sles
            $url = filter_var($url, FILTER_SANITIZE_URL);   //bersihkan url dari karakter yang aneh biar aman
            $url = explode('/', $url);  //pecah url, nanti slase hilang, dan string jadi array
            return $url;
        }

        return [0];
    }
}
