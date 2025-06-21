<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'principal';
        echo view('front/Tramo2/head_view', $data);
        echo view('front/Tramo2/navbar_view', $data);
        echo view('front/Tramo2/principal', $data);
        echo view('front/Tramo2/footer_view', $data); 
    }

    public function acerca_de()
    {
        $data['titulo'] = 'Acerca de';
        echo view('front/Tramo2/head_view',$data);
        echo view('front/Tramo2/navbar_view', $data);
        echo view('front/Tramo2/acerca_de', $data);
        echo view('front/Tramo2/footer_view', $data);
    }

    public function quienes_somos()
    {
        $data['titulo'] = '¿Quienes Somos?';
        echo view('front/Tramo2/head_view',$data);
        echo view('front/Tramo2/navbar_view', $data);
        echo view('front/Tramo2/quienes_somos', $data);
        echo view('front/Tramo2/footer_view', $data);
    }

    public function login()
    {
        $data['titulo'] = 'Login';
        echo view('front/Tramo2/head_view',$data);
        echo view('front/Tramo2/navbar_view', $data);
        echo view('front/Tramo2/login', $data);
        echo view('front/Tramo2/footer_view', $data);
    }

    public function registro()
    {
        $data['titulo'] = 'Registro';
        echo view('front/Tramo2/head_view',$data);
        echo view('front/Tramo2/navbar_view', $data);
        echo view('front/Tramo2/registro', $data);
        echo view('front/Tramo2/footer_view', $data);
    }
}
