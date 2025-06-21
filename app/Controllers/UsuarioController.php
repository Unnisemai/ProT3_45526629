<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller
{
    public function registrar()
    {
        helper(['form']);
        echo view('registro');
    }

    public function guardar()
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'nombre'     => $this->request->getVar('nombre'),
            'email'      => $this->request->getVar('email'),
            'contraseña' => password_hash($this->request->getVar('contraseña'), PASSWORD_DEFAULT)
        ];

        $usuarioModel->save($data);
        return redirect()->to('/login');
    }
}
