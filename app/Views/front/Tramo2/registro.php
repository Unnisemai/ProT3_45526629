<section class="py-5" style="background-color: #eee;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="card text-black" style="border-radius: 15px;">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Registro</h3>

                        <?php if (session()->getFlashdata('mensaje')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('mensaje') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('/usuario/guardar') ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" id="nombre" name="nombre" class="form-control" required />
                                        <label class="form-label" for="nombre">Nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="text" id="apellido" name="apellido" class="form-control" />
                                        <label class="form-label" for="apellido">Apellido</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-outline">
                                    <input type="text" id="username" name="username" class="form-control" />
                                    <label class="form-label" for="username">Usuario</label>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="form-outline">
                                    <input type="email" id="email" name="email" class="form-control" required />
                                    <label class="form-label" for="email">Email</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="password" id="password" name="contraseña" class="form-control" required />
                                        <label class="form-label" for="password">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-outline">
                                        <input type="password" id="repeatPassword" class="form-control" />
                                        <label class="form-label" for="repeatPassword">Repetir Contraseña</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
