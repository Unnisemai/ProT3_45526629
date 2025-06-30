<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class UsuarioController extends Controller
{

    public function index()
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $datos['usuarios'] = $usuarioModel->findAll();

    return view('front/Tramo2/usuarios', $datos);
    }

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
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $usuarioModel->save($data);
        return redirect()->to('/login');
    }

    public function crear()
    {
    $usuarioModel = new \App\Models\UsuarioModel();

    $data = [
        'nombre'   => $this->request->getPost('nombre'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'rol'      => $this->request->getPost('rol'),
        'activo'   => $this->request->getPost('activo')
    ];

    $usuarioModel->insert($data);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario creado exitosamente');
    }


    public function haceradmin($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $usuarioModel->update($id, ['rol' => 'admin']);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario convertido en administrador');
    }

    public function eliminar($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $usuarioModel->delete($id);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario eliminado exitosamente');
    }

    public function deshabilitar($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $usuarioModel->update($id, ['activo' => 0]);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario deshabilitado');
    }

    public function habilitar($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $usuarioModel->update($id, ['activo' => 1]);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario habilitado');
    }

    public function editar($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();
    $usuario = $usuarioModel->find($id);

    return view('front/Tramo2/editar_usuario', ['usuario' => $usuario]);
    }

    public function actualizar($id)
    {
    $usuarioModel = new \App\Models\UsuarioModel();

    $data = [
        'nombre' => $this->request->getPost('nombre'),
        'email'  => $this->request->getPost('email'),
        'rol'    => $this->request->getPost('rol'),
        'activo' => $this->request->getPost('activo'),
    ];

    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $usuarioModel->update($id, $data);

    return redirect()->to('/usuarios')->with('mensaje', 'Usuario actualizado exitosamente');
    }



}
