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
                        <li class="list-group-item active">
                            <a href="<?= base_url() ?>index.php/dashboard/categories">
                                Categorias
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?= base_url() ?>index.php/dashboard/links">
                                Links
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h1><?= esc($title) ?></h1>

                <form action="<?= site_url('dashboard/categories/update/'.$category['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label>
                            Nome
                        </label>

                        <input type="text" name="name" class="form-control" required value="<?= esc($category['name']) ?>">
                    </div>

                    <div class="mb-3">
                        <label>
                            Categoria Pai
                        </label>

                        <select name="parent" class="form-control">
                            <option value="">Nenhuma</option>

                            <?php foreach ($parents as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= $category['parent'] == $p['id'] ? 'selected' : '' ?>>
                                    <?= esc($p['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>
                            Slogan
                        </label>

                        <input type="text" name="slogan" class="form-control" value="<?= esc($category['slogan']) ?>">
                    </div>

                    <div class="mb-3">
                        <label>
                            Descrição
                        </label>

                        <textarea name="description" class="form-control"><?= esc($category['description']) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark">
                        Atualizar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>