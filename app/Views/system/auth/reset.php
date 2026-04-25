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
                Redefinir senha
            </p>

            <?php if (isset($error)): ?>
                <div class="alert alert-danger">
                    <?= esc($error) ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('reset-password') ?>" method="post">
                <?= csrf_field() ?>

                <input type="hidden" name="token" value="<?= esc($token) ?>">

                <div class="mb-3">
                    <label for="password" class="form-label mb-0">
                        Nova senha
                    </label>

                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>">

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

                <button type="submit" class="btn btn-primary btn-block">
                    Redefinir senha
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
