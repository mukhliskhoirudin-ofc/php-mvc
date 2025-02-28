<?php

class App
{
    public function __construct()
    {
        $url = $this->parseURL();
        var_dump($url);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');     //rtrim = untuk hilangkan tanda sles
            $url = filter_var($url, FILTER_SANITIZE_URL);   //bersihkan url dari karakter yang aneh biar aman
            $url = explode('/', $url);  //pecah url, nanti slase hilang, dan string jadi array
            return $url;
        }
    }
}
