<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Criar Conta
                </h1>

                <form action="<?= site_url('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
                            Nome
                        </label>

                        <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>">

                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['name'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

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

                    <button class="btn btn-primary mb-3">Criar Conta</button>
                </form>

                <a href="<?= site_url('login') ?>">
                    Já tenho uma conta
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>