<?php

namespace App\Controllers;

class PrincipalController extends BaseController
{
    public function index()
    {
        // Si no está logueado, lo redirigimos al login
        if (!session()->get('logueado')) {
            return redirect()->to('/login');
        }

        return view('principal');
    }
}
