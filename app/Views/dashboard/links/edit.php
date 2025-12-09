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

                        <li class="list-group-item active">
                            <a href="<?= base_url() ?>index.php/dashboard/links">
                                Links
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h1>Editar Link</h1>

                <form method="post" action="/dashboard/links/update/<?= $link['id'] ?>">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">
                            Nome
                        </label>

                        <input type="text" name="name" class="form-control" value="<?= $link['name'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            URL
                        </label>

                        <input type="text" name="url" class="form-control" value="<?= $link['url'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" name="open_in_new_window" value="1" <?= $link['open_in_new_window'] ? 'checked' : '' ?> id="openInNewTabCheck">

                        <label class="form-check-label" for="openInNewTabCheck">
                            Abrir nova aba?
                        </label>
                    </div>

                    <button class="btn btn-dark" type="submit">
                        Atualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
