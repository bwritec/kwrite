<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>
                    Recuperar Senha
                </h1>

                <?php if (session()->has('error')): ?>
                    <div class="alert alert-danger mb-3">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success mb-3">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('forgot-password') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
                            E-mail
                        </label>

                        <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" required>

                        <?php if (isset($errors['email'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['email'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Enviar link
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
