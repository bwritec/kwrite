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
                    <li class="list-group-item active">
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
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h1 class="mb-4">
                    Meus Produtos
                </h1>

                <?php if ($success): ?>
                    <div class="alert alert-success">
                        <?= esc($success) ?>
                    </div>
                <?php endif; ?>

                <?php if ($error): ?>
                    <div class="alert alert-danger">
                        <?= esc($error) ?>
                    </div>
                <?php endif; ?>

                <?php if (empty($products)): ?>
                    <p>
                        Você ainda não cadastrou nenhum produto.
                    </p>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <img src="<?= esc($product['thumbnail']) ?>" alt="Miniatura do produto" style="width: 200px; float: left; margin-right: 1rem;">

                                    <h5 class="card-title">
                                        <?= esc($product['name']) ?>
                                    </h5>

                                    <p class="card-text text-muted small">
                                        <?= substr($product['description'], 0, 120) . '...'; ?>
                                    </p>

                                    <p class="fw-bold mb-2">
                                        R$

                                        <?php

                                            $env = env('app.rate');
                                            $taxa = (float) $env ?: 0;
                                            $price = str_replace(",", ".", $product['price']);
                                            $price_final = $price + ($price * ($taxa / 100));
                                            $price_final = number_format($price_final, 2, ',', '.');

                                            echo $price_final;

                                        ?>
                                    </p>

                                    <a href="<?= site_url('dashboard/products/delete/' . $product['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                        Excluir
                                    </a>

                                    <a href="<?= site_url('product/' . $product['id']) ?>" class="btn btn-sm btn-primary">
                                        Ver Produtor
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>