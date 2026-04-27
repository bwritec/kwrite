<?= $this->extend('system/'. $admin_theme .'/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Anúncios
                    </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>index.php/dashboard">
                                Dashboard
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Anúncios
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?php if ($success): ?>
            <div class="alert alert-success mb-3">
                <?= esc($success) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger mb-3">
                <?= esc($error) ?>
            </div>
        <?php endif; ?>

        <?php if (empty($products)): ?>
            <div class="card">
                <div class="card-body">
                    Você ainda não cadastrou nenhum produto.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="card">
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
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>
<?= $this->endSection() ?>
