<?php
public function registrar()
{
    $nombre     = $this->request->getPost('nombre');
    $email      = $this->request->getPost('email');
    $contrasena = $this->request->getPost('contrasena');

    // Conexión directa si no usás modelo aún:
    $db = \Config\Database::connect();
    $builder = $db->table('usuarios');

    // Verifica si el email ya existe
    $usuarioExistente = $builder->where('email', $email)->get()->getRow();

    if ($usuarioExistente) {
        // Email ya registrado, volvemos con error
        return redirect()->back()
                         ->withInput()
                         ->with('error', 'El correo electrónico ya está registrado.');
    }

    // Insertar nuevo usuario
    $data = [
        'nombre'     => $nombre,
        'email'      => $email,
        'contraseña' => password_hash($contrasena, PASSWORD_DEFAULT),
    ];

    $builder->insert($data);

    return redirect()->to('/registro')
                     ->with('mensaje', '¡Registro exitoso!');
}
