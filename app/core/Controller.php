<?php

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';  //arahkan ke folder views
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        //untuk model karna dia class harus di instansiasi dulu
        return new $model;
    }
}
