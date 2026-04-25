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
                Digite seu e-mail para redefinir sua senha
            </p>

            <?php if (session()->getFlashdata('error') || isset($error)): ?>
                <div class="alert alert-danger">
                    <?= esc(session()->getFlashdata('error') ?? $error) ?>
                </div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success">
                    <?= esc($success) ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('forgot') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="email" class="form-label mb-0">
                        Email
                    </label>

                    <div class="input-group">
                        <input type="email" name="email" id="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= old('email') ?>">

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

                <button type="submit" class="btn btn-primary btn-block">
                    Enviar link
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
