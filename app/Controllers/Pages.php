<?php

namespace App\Controllers;

use App\Models\AgendaModel;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Home | Ferdian  Husnal Ma'ruf"
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            "title" => "About Me | Ferdian  Husnal Ma'ruf"
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            "title" => "Contact us | Ferdian  Husnal Ma'ruf",
            'alamat' => [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Jl. Roro',
                    'kota' => 'Pati'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Jl. Udinus',
                    'kota' => 'Semarang'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
