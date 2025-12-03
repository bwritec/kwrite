<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content" style="margin-bottom: 61px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 home-sidebar">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard">
                            Dashboard
                        </a>
                    </li>
                </ul>

                <?php if (session()->has('user') && session('user.admin') === '1'): ?>
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <a href="<?= base_url() ?>index.php/dashboard/tags">
                                Tags
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?= base_url() ?>index.php/dashboard/categories">
                                Categorias
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h3>
                    Editar Tag
                </h3>

                <form action="<?= site_url('dashboard/tags/update/' . $tag['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label">
                            Nome
                        </label>

                        <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= esc($tag['name']) ?>" required>

                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?= $errors['name'] ?? '' ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Descrição
                        </label>

                        <textarea name="description" class="form-control"><?= esc($tag['description']) ?></textarea>
                    </div>

                    <button class="btn btn-primary">
                        Atualizar
                    </button>

                    <a href="<?= site_url('dashboard/tags') ?>" class="btn btn-secondary">
                        Voltar
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
