<?= $this->extend('system/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="register-box">
    <div class="register-logo">
        <a href="<?= base_url() ?>index.php">
            <?php

                $title = env('app.name');
                $title = str_replace(" ", "", $title);

                $title_with_subtitle = false;
                $title_first = "";
                $title_last = "";

                if (preg_match('/(?<!^)([A-Z])/', $title, $matches, PREG_OFFSET_CAPTURE))
                {
                    $pos = $matches[0][1];

                    $title_first = substr($title, 0, $pos);
                    $title_last = substr($title, $pos);

                    $title_with_subtitle = true;
                } else
                {
                    $title_first = $title;
                }

            ?>
            <b><?= $title_with_subtitle ? $title_first : $title; ?></b><?= $title_with_subtitle ? $title_last : ""; ?>
        </a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">
                Crie uma nova conta
            </p>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success mb-3" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('register') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label mb-0">
                        Nome completo
                    </label>

                    <div class="input-group">
                        <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" value="<?= old('name') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['name']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label mb-0">
                        Email
                    </label>

                    <div class="input-group">
                        <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= old('email') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['email']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label mb-0">
                        CPF
                    </label>

                    <div class="input-group">
                        <input type="text" id="cpf" class="form-control <?= isset($errors['cpf']) ? 'is-invalid' : '' ?>" name="cpf" maxlength="14" value="<?= old('cpf') ?>">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-passport"></i>
                            </div>
                        </div>

                        <?php if (isset($errors['cpf'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['cpf']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label mb-0">
                        Senha
                    </label>

                    <div class="input-group">
                        <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" placeholder="Senha">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['password']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Cadastrar
                        </button>
                    </div>
                </div>
            </form>

            <a href="<?= base_url() ?>index.php/login" class="text-center">
                Já tenho uma conta
            </a>
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
<?= $this->endSection() ?>
