<?= $this->include('front/Tramo2/head_view') ?>
<?= $this->include('front/Tramo2/navbar_view') ?>

<div class="container">
    <div class="admin-card">
        <h2 class="mb-4">Gestión de Usuarios</h2>

        <div class="mb-3 text-end">
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#nuevoUsuarioForm">
                Crear nuevo usuario
            </button>
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
                        <?php $activo = isset($usuario['activo']) ? $usuario['activo'] : 1; ?>
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
                                <span class="badge <?= $activo ? 'bg-success' : 'badge-inactivo' ?>">
                                    <?= $activo ? 'Activo' : 'Inactivo' ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($activo): ?>
                                    <a href="<?= base_url('/usuarios/deshabilitar/' . $usuario['id']) ?>" class="btn btn-sm btn-warning">Deshabilitar</a>
                                <?php else: ?>
                                    <a href="<?= base_url('/usuarios/habilitar/' . $usuario['id']) ?>" class="btn btn-sm btn-success">Habilitar</a>
                                <?php endif; ?>

                                <a href="<?= base_url('/usuarios/eliminar/' . $usuario['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que querés eliminar a <?= $usuario['nombre'] ?>?')">Eliminar</a>

                                <?php if ($usuario['rol'] !== 'admin'): ?>
                                    <a href="<?= base_url('/usuarios/haceradmin/' . $usuario['id']) ?>" class="btn btn-sm btn-info">Hacer Admin</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="collapse mt-4" id="nuevoUsuarioForm">
        <div class="card card-body bg-dark text-white border-light">
            <form action="<?= base_url('/usuarios/crear') ?>" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Rol:</label>
                        <select name="rol" class="form-select">
                            <option value="usuario">Usuario</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Estado:</label>
                        <select name="activo" class="form-select">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('front/Tramo2/footer_view') ?>
