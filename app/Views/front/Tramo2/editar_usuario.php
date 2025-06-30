<?= $this->include('front/Tramo2/head_view') ?>
<?= $this->include('front/Tramo2/navbar_view') ?>

<div class="container mt-4">
    <div class="card bg-dark text-white border-light">
        <div class="card-body">
            <h3 class="mb-4">Editar Usuario</h3>

            <form action="<?= base_url('/usuarios/actualizar/' . $usuario['id']) ?>" method="post">
                <div class="row mb-3">
                    <div class="col">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" value="<?= esc($usuario['nombre']) ?>" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>Email:</label>
                        <input type="email" name="email" value="<?= esc($usuario['email']) ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Nueva Contraseña:</label>
                        <input type="password" name="password" class="form-control">
                        <small class="text-muted">Dejar vacío para no cambiarla</small>
                    </div>
                    <div class="col">
                        <label>Rol:</label>
                        <select name="rol" class="form-select">
                            <option value="usuario" <?= $usuario['rol'] === 'usuario' ? 'selected' : '' ?>>Usuario</option>
                            <option value="admin" <?= $usuario['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>Estado:</label>
                        <select name="activo" class="form-select">
                            <option value="1" <?= $usuario['activo'] == 1 ? 'selected' : '' ?>>Activo</option>
                            <option value="0" <?= $usuario['activo'] == 0 ? 'selected' : '' ?>>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('front/Tramo2/footer_view') ?>
