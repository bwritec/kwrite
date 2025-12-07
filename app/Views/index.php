<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="content" style="margin-bottom: 61px;">
    <div class="container">
        <div class="row">
            <?php if (!empty($last_products)): ?>
                <div class="col-12">
                    <h1 class="mb-3">
                        Últimos Produtos
                    </h1>
                </div>

                <?php foreach ($last_products as $p): ?>
                    <div class="col-6 col-md-4 col-lg-2 mb-3">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body" style="padding: 1rem;">
                                <a href="<?= site_url('product/' . $p['id']) ?>" style="text-decoration: none;">
                                    <img src="<?= base_url(!empty($p['thumbnail']) ? $p['thumbnail'] : 'dist/photos/no-image.png') ?>" alt="<?= esc($p['name']) ?>" style="width: 100%;">

                                    <span class="mb-2" style="display: block; color: #000;">
                                        <?= esc($p['name']) ?>
                                    </span>

                                    <p class="fw-bold" style="color: #333;">
                                        R$

                                        <?php

                                            $env = env('app.rate');
                                            $taxa = (float) $env ?: 0;
                                            $price = str_replace(",", ".", $p['price']);
                                            $price_final = $price + ($price * ($taxa / 100));
                                            $price_final = number_format($price_final, 2, ',', '.');

                                            echo $price_final;

                                        ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-muted">
                        Nenhum produto encontrado.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
