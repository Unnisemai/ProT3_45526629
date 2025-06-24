<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login_controller extends BaseController
{
    public function index()
    {
        // muestra el formulario si el usuario no está logueado
        return view('login');
    }

    public function autenticar()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new \App\Models\UsuarioModel();
        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password']))
        {
            // usuario válido se guarda
            $datosSesion = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['rol'], //rol
                'logueado' => true
            ];
            session()->set($datosSesion);

            return redirect()->to('/principal');  // va a principal
        } else {
            // usuario no válido
           return redirect()->to('/login')->with('error', 'Usuario o contraseña incorrectos.');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function verificar()
    {
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $usuarioModel = new \App\Models\UsuarioModel();
    $usuario = $usuarioModel->where('email', $email)->first();

    if ($usuario && password_verify($password, $usuario['password'])) {
        $datosSesion = [
            'id'       => $usuario['id'],
            'nombre'   => $usuario['nombre'],
            'rol'      => $usuario['rol'],
            'logueado' => true
        ];
        session()->set($datosSesion);
        return redirect()->to('/principal');
    } else {
        return redirect()->to('/login')->with('error', 'Usuario o contraseña incorrectos.');
    }
    }
}
