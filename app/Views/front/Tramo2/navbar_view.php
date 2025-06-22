<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="principal.php">
            <img src="assets/img/Disenotitulo.png" alt="Liqüid Logo" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('principal') ?>">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('quienes_somos') ?>">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('acerca_de') ?>">Acerca de</a>
                </li>
                <?php if (session()->get('rol') === 'admin'): ?>
                    <li class="nav-item">
                         <a class="nav-link" href="<?= base_url('/usuarios') ?>">Usuarios</a>
                    </li>
                 <?php endif; ?>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar...">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
            <div class="ms-3 d-flex align-items-center">
    <?php if (session()->get('logueado')): ?>
        <span class="text-white me-3">
            👤 <?= esc(session()->get('nombre')) ?> (<?= esc(session()->get('rol')) ?>)
        </span>
        <a href="<?= base_url('logout') ?>" class="btn btn-outline-light">Cerrar sesión</a>
    <?php else: ?>
        <a href="<?= base_url('registro') ?>" class="btn btn-primary me-2">Registrarse</a>
        <a href="<?= base_url('login') ?>" class="btn btn-outline-light">Login</a>
    <?php endif; ?>
</div>
        </div>
    </div>
</nav>