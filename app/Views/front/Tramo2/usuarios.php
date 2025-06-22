<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('ruta/a/miestilo.css') ?>">
</head>
<body>

<div class="container">
    <div class="admin-card">
        <h2 class="mb-4">Gestión de Usuarios</h2>

        <div class="mb-3 text-end">
            <a href="<?= base_url('/usuarios/nuevo') ?>" class="btn btn-success">➕ Crear nuevo usuario</a>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['nombre'] ?></td>
                            <td><?= $usuario['email'] ?></td>
                            <td>
                                <span class="badge <?= $usuario['rol'] === 'admin' ? 'badge-admin' : 'badge-user' ?>">
                                    <?= ucfirst($usuario['rol']) ?>
                                </span>
                            </td>
                            <td>
                                <span class="badge <?= $usuario['activo'] ? 'bg-success' : 'badge-inactivo' ?>">
                                    <?= $usuario['activo'] ? 'Activo' : 'Inactivo' ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($usuario['activo']): ?>
                                    <a href="<?= base_url('/usuarios/deshabilitar/' . $usuario['id']) ?>" class="btn btn-sm btn-warning">🚫 Deshabilitar</a>
                                <?php else: ?>
                                    <a href="<?= base_url('/usuarios/habilitar/' . $usuario['id']) ?>" class="btn btn-sm btn-success">✅ Habilitar</a>
                                <?php endif; ?>

                                <?php if ($usuario['rol'] !== 'admin'): ?>
                                    <a href="<?= base_url('/usuarios/haceradmin/' . $usuario['id']) ?>" class="btn btn-sm btn-info">⭐ Hacer Admin</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
