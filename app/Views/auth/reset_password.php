<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Redefinir Senha
                </h1>

                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger mb-3">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('reset-password') ?>" method="post">
                    <?= csrf_field() ?>

                    <input type="hidden" name="token" value="<?= $token ?>">

                    <div class="mb-3">
                        <label class="form-label">
                            Nova Senha
                        </label>

                        <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" required>

                        <?php if (isset($errors['password'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['password'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary mb-3">
                        Alterar senha
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
