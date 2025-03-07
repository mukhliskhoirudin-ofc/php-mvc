<?php

if (!session_id()) {    //kalau tidak ada sesi, jalankan sesi start
    session_start();
}

require_once '../app/init.php';

$app = new App;
