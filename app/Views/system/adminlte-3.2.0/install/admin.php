<!DOCTYPE html>
<html>
<head>

    <!--
      - Charset.
     -->
    <meta charset="utf-8">

    <!--
      - Viewport.
     -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
      - Título.
     -->
    <title><?= env('app.name'); ?> - <?= $title; ?></title>

    <!--
      - Estilos.
     -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>dist/css/bootstrap-5.3.7.css">

    <!--
      - Scripts.
     -->
    <script type="text/javascript" src="<?= base_url(); ?>dist/js/bootstrap.bundle-5.3.7.js"></script>

</head>
<body>

    <div style="text-align: center;" class="mt-5 mb-3">
        <img src="<?= base_url(); ?>dist/img/logo.png" style="width: 75px; height: 75px;">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>
                            Crie uma nova conta de administrador
                        </p>

                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mb-3" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('install/account/admin') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label class="form-label">
                                    Nome
                                </label>

                                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= old('name') ?>">

                                <?php if (isset($errors['name'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['name']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= old('email') ?>">

                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    CPF
                                </label>

                                <input type="text" id="cpf" class="form-control <?= isset($errors['cpf']) ? 'is-invalid' : '' ?>" name="cpf" maxlength="14" value="<?= old('cpf') ?>" placeholder="000.000.000-00">

                                <?php if (isset($errors['cpf'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['cpf']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Senha
                                </label>

                                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password">

                                <?php if (isset($errors['password'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['password']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-dark">
                                Criar Conta
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--
      - Script
     -->
    <script type="text/javascript">
        /**
         * Máscara de CPF em tempo real.
         */
        document.getElementById('cpf').addEventListener('input', function (e)
        {
            /**
             * Remove tudo que não for número
             */
            let value = e.target.value.replace(/\D/g, '');

            /**
             * Limita a 11 dígitos.
             */
            if (value.length > 11)
            {
                value = value.slice(0, 11);
            }

            /**
             * aplica a máscara.
             */
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            e.target.value = value;
        });
    </script>

</body>
</html>
