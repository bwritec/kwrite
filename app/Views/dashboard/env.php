<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="content" style="margin-bottom: 61px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 home-sidebar">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard">
                            Dashboard
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/favorites">
                            Favoritos
                        </a>
                    </li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/purchases">
                            Compras
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/sales">
                            Vendas
                        </a>
                    </li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/address">
                            Endereço
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/contact">
                            Contato
                        </a>
                    </li>
                </ul>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/products">
                            Anúncios
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard/sell">
                            Vender
                        </a>
                    </li>
                </ul>

                <?php if (session()->has('user') && session('user.admin') === '1'): ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="<?= base_url() ?>index.php/dashboard/categories">
                                Categorias
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?= base_url() ?>index.php/dashboard/links">
                                Links
                            </a>
                        </li>

                        <li class="list-group-item active">
                            <a href="<?= base_url() ?>index.php/dashboard/env">
                                Env
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h1>
                    Env's
                </h1>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('dashboard/env') ?>" method="post">
                    <?= csrf_field() ?>

                    <!--
                      - Nav tabs
                     -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="app-tab" data-bs-toggle="tab" data-bs-target="#app" type="button" role="tab">
                                App
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="database-tab" data-bs-toggle="tab" data-bs-target="#database" type="button" role="tab">
                                Database
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="email-tab" data-bs-toggle="tab" data-bs-target="#email" type="button" role="tab">
                                Email
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="token-tab" data-bs-toggle="tab" data-bs-target="#token" type="button" role="tab">
                                Token
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="others-tab" data-bs-toggle="tab" data-bs-target="#others" type="button" role="tab">
                                Outros
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="app" role="tabpanel">
                            <div class="mb-3">
                                <label for="app_name" class="form-label">
                                    Nome do site
                                </label>

                                <input type="text" name="app_name" id="app_name" class="form-control <?= isset($errors['app_name']) ? 'is-invalid' : '' ?>" value="<?= esc(env("app.name") ?? '') ?>">

                                <?php if (isset($errors['app_name'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['app_name']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="app_url" class="form-label">
                                    URL
                                </label>

                                <input type="text" name="app_url" id="app_url" class="form-control <?= isset($errors['app_url']) ? 'is-invalid' : '' ?>" value="<?= esc(env("app.baseURL") ?? '') ?>">

                                <?php if (isset($errors['app_url'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['app_url']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="app_rate" class="form-label">
                                    Taxa do site
                                </label>

                                <div class="input-group mb-3">
                                    <input type="text" name="app_rate" id="app_rate" class="form-control <?= isset($errors['app_rate']) ? 'is-invalid' : '' ?>" value="<?= esc(env("app.rate") ?? '') ?>">

                                    <span class="input-group-text">
                                        %
                                    </span>
                                </div>

                                <?php if (isset($errors['app_rate'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['app_rate']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="database" role="tabpanel">
                            <div class="mb-3">
                                <label for="database_hostname" class="form-label">
                                    Hostname
                                </label>

                                <input type="text" name="database_hostname" id="database_hostname" class="form-control <?= isset($errors['database_hostname']) ? 'is-invalid' : '' ?>" value="<?= esc(env("database.default.hostname") ?? '') ?>">

                                <?php if (isset($errors['database_hostname'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['database_hostname']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="database_port" class="form-label">
                                    Porta
                                </label>

                                <input type="text" name="database_port" id="database_port" class="form-control <?= isset($errors['database_port']) ? 'is-invalid' : '' ?>" value="<?= esc(env("database.default.port") ?? '') ?>">

                                <?php if (isset($errors['database_port'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['database_port']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="database_name" class="form-label">
                                    Nome
                                </label>

                                <input type="text" name="database_name" id="database_name" class="form-control <?= isset($errors['database_name']) ? 'is-invalid' : '' ?>" value="<?= esc(env("database.default.database") ?? '') ?>">

                                <?php if (isset($errors['database_name'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['database_name']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="database_username" class="form-label">
                                    Usuário
                                </label>

                                <input type="text" name="database_username" id="database_username" class="form-control <?= isset($errors['database_username']) ? 'is-invalid' : '' ?>" value="<?= esc(env("database.default.username") ?? '') ?>">

                                <?php if (isset($errors['database_username'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['database_username']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="database_password" class="form-label">
                                    Senha
                                </label>

                                <input type="text" name="database_password" id="database_password" class="form-control <?= isset($errors['database_password']) ? 'is-invalid' : '' ?>" value="<?= esc(env("database.default.password") ?? '') ?>">

                                <?php if (isset($errors['database_password'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['database_password']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="email" role="tabpanel">
                            <div class="mb-3">
                                <label for="email_from_email" class="form-label">
                                    Do Email
                                </label>

                                <input type="text" name="email_from_email" id="email_from_email" class="form-control" placeholder="nao-responder@kwrite.com.br" value="<?= esc(env("email.fromEmail") ?? '') ?>">

                                <?php if (isset($errors['email_from_email'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_from_email']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_from_name" class="form-label">
                                    Do Nome
                                </label>

                                <input type="text" name="email_from_name" id="email_from_name" class="form-control" placeholder="Kwrite" value="<?= esc(env("email.fromName") ?? '') ?>">

                                <?php if (isset($errors['email_from_name'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_from_name']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_protocol" class="form-label">
                                    Protocolo
                                </label>

                                <input type="text" name="email_protocol" id="email_protocol" class="form-control" value="smtp" disabled>

                                <?php if (isset($errors['email_protocol'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_protocol']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_host" class="form-label">
                                    Host
                                </label>

                                <input type="text" name="email_host" id="email_host" class="form-control" value="<?= esc(env("email.SMTPHost") ?? '') ?>">

                                <?php if (isset($errors['email_host'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_host']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_user" class="form-label">
                                    Usuário
                                </label>

                                <input type="text" name="email_user" id="email_user" class="form-control" value="<?= esc(env("email.SMTPUser") ?? '') ?>">

                                <?php if (isset($errors['email_user'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_user']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_password" class="form-label">
                                    Senha
                                </label>

                                <input type="text" name="email_password" id="email_password" class="form-control" value="<?= esc(env("email.SMTPPass") ?? '') ?>">

                                <?php if (isset($errors['email_password'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_password']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_port" class="form-label">
                                    Porta
                                </label>

                                <input type="text" name="email_port" id="email_port" class="form-control" value="<?= esc(env("email.SMTPPort") ?? '') ?>">

                                <?php if (isset($errors['email_port'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_port']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="email_crypto" class="form-label">
                                    Criptografia
                                </label>

                                <input type="text" name="email_crypto" id="email_crypto" class="form-control" value="<?= esc(env("email.SMTPCrypto") ?? '') ?>">

                                <?php if (isset($errors['email_crypto'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['email_crypto']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="token" role="tabpanel">
                            <div class="mb-3">
                                <label for="token_melhorenvio" class="form-label">
                                    Melhor Envio
                                </label>

                                <textarea name="token_melhorenvio" id="token_melhorenvio" class="form-control" style="height: 200px;"><?= esc(env("melhorenvio.token") ?? '') ?></textarea>

                                <?php if (isset($errors['token_melhorenvio'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['token_melhorenvio']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="others" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label">
                                    Ambiente
                                </label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="environment" id="production" value="production" checked>

                                    <label class="form-check-label" for="production">
                                        Produção
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="environment" id="development" value="development">

                                    <label class="form-check-label" for="development">
                                        Desenvolvimento
                                    </label>
                                </div>

                                <?php if (isset($errors['environment'])): ?>
                                    <div class="invalid-feedback">
                                        <?= esc($errors['environment']) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Salvar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>