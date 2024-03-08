<?php

namespace App\Controllers;

class Main extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'halaman utama'
        ];
        return view('main/index', $data);
    }
}
