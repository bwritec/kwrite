<?= $this->extend('system/layouts/auth') ?>

<?= $this->section('content') ?>
<div class="login-box">
    <div class="login-logo">
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
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Faça login para iniciar sua sessão.
            </p>

            <form action="<?= site_url('login') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label mb-0">
                        CPF
                    </label>

                    <div class="input-group">
                        <input type="text" name="cpf" id="cpf" maxlength="14" class="form-control <?= isset($errors['cpf']) ? 'is-invalid' : '' ?>" value="<?= old('cpf') ?>">

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
                        <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">

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
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">

                            <label for="remember">
                                Lembre de mim
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Entrar
                        </button>
                    </div>
                </div>
            </form>

            <p class="mb-1">
                <a href="<?= site_url('forgot') ?>">
                    Esqueci minha senha
                </a>
            </p>

            <p class="mb-0">
                <a href="<?= base_url() ?>index.php/register" class="text-center">
                    Criar uma nova conta
                </a>
            </p>
        </div>
    </div>
</div>

<script type="text/javascript">
    /**
     * máscara de CPF
     */
    document.getElementById('cpf').addEventListener('input', function (e)
    {
        let value = e.target.value.replace(/\D/g, '');

        if (value.length > 11)
        {
            value = value.slice(0, 11);
        }

        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = value;
    });
</script>
<?= $this->endSection() ?>
