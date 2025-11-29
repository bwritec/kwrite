<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Login
                </h1>

                <?php if (!empty($errors['login'])): ?>
                    <div class="alert alert-danger">
                        <?= $errors['login'] ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= old('email') ?>">

                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Senha
                        </label>

                        <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">

                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button class="btn btn-primary mb-3">
                        Entrar
                    </button>
                </form>

                <a href="<?= site_url('register') ?>">
                    Não tenho uma conta
                </a>

                <br>

                <a href="<?= site_url('forgot-password') ?>">
                    Esqueci minha senha
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>