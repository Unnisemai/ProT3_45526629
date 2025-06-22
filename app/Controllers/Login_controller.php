<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Login_controller extends BaseController
{
    public function index()
    {
        // Muestra el formulario si el usuario no está logueado
        return view('login');  // Asegurate de tener app/Views/login.php
    }

    public function autenticar()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            // Usuario válido, guardamos en sesión
            $datosSesion = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['rol'], // Muy importante
                'logueado' => true
            ];
            session()->set($datosSesion);

            return redirect()->to('/principal');  // Redirige a tu página principal
        } else {
            // Usuario no válido
            session()->setFlashdata('error', 'Usuario o contraseña incorrectos.');
            return redirect()->to('/login');
        }
    }

    public function salir()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
