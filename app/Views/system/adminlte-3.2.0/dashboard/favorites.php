<?= $this->extend('system/'. $admin_theme .'/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Favoritos
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
                            Favoritos
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?php if (count($favorites) == 0): ?>
            <div class="card">
                <div class="card-body">
                    Nenhum favorito disponível
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($favorites as $item): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <!-- imagem -->
                        <?php if (!empty($item['thumbnail'])): ?>
                            <div style="float: left;">
                                <img src="<?= base_url() ?><?= $item['thumbnail'] ?>" class="card-img-top" alt="<?= esc($item['name']) ?>" style="width: 150px; margin-right: 1rem; display: block;">
                            </div>

                            <h5 class="card-title">
                                <?= esc($item['name']) ?>
                            </h5>

                            <?php if (!empty($item['price'])): ?>
                                <p class="card-text">
                                    <strong>R$ <?= number_format($item['price'], 2, ',', '.') ?></strong>
                                </p>
                            <?php endif; ?>

                            <a href="<?= site_url("product") ?>/<?= $item['id'] ?>" class="btn btn-primary">
                                Ver Produto
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
</div>
<?= $this->endSection() ?>
