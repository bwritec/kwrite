<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="container mb-3 mt-4">
    <div class="row">
        <?php if ($product['demonstration']): ?>
            <div class="col-12 mb-3">
                <div class="alert alert-warning">
                    Esse é um produto de demonstração
                </div>
            </div>
        <?php endif ?>

        <!-- Coluna de imagens -->
        <div class="col-md-6">
            <div id="productCarousel" class="carousel slide shadow-sm mb-3" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Imagem principal -->
                    <div class="carousel-item active">
                        <img src="<?= base_url(!empty($product['thumbnail']) ? $product['thumbnail'] : 'dist/photos/no-image.png') ?>" class="d-block w-100 main-image" alt="<?= esc($product['name']) ?>" style="height: 400px; object-fit: cover; border-radius: 8px;">
                    </div>

                    <!-- Outras fotos -->
                    <?php if (!empty($photos)): ?>
                        <?php foreach ($photos as $photo): ?>
                            <div class="carousel-item">
                                <img 
                                    src="<?= base_url($photo['name']) ?>" 
                                    class="d-block w-100 main-image"
                                    alt="Foto do produto" 
                                    style="height: 400px; object-fit: cover; border-radius: 8px;">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>

            <!-- Miniaturas -->
            <div class="d-flex flex-wrap justify-content-start gap-2">
                <img 
                    src="<?= base_url(!empty($product['thumbnail']) ? $product['thumbnail'] : 'dist/photos/no-image.png') ?>" 
                    class="img-thumbnail thumb active-thumb"
                    style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                    data-bs-target="#productCarousel" 
                    data-bs-slide-to="0">

                <?php if (!empty($photos)): ?>
                    <?php foreach ($photos as $index => $photo): ?>
                        <img 
                            src="<?= base_url($photo['name']) ?>" 
                            class="img-thumbnail thumb"
                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                            data-bs-target="#productCarousel" 
                            data-bs-slide-to="<?= $index + 1 ?>">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Coluna de informações -->
        <div class="col-md-6">
            <small>
                ID: <?= esc($product['id']) ?> | <strong>Condição: </strong><?= esc($product['conditions']) ?> | <?= esc($product['amount']) ?> Disponível
            </small>
            <h3><?= esc($product['name']) ?></h3>

            <?php if ($category): ?>
                <p class="text-muted">
                    Categoria: <strong><?= esc($category['name']) ?></strong>
                </p>
            <?php endif; ?>

            <h4 class="text-success mb-3">R$ <?= number_format($product['price_final'], 2, ',', '.') ?></h4>

            <?php if ($product['demonstration']): ?>
                <div style="width: 100%; display: block;">
                    <button class="btn btn-warning disabled btn-lg mb-3">
                        <i class="fa-solid fa-heart"></i> Favoritar
                    </button>
                </div>
            <?php else: ?>
                <?php if (session()->has('user')): ?>
                    <?php if ($is_favorited): ?>
                        <form action="<?= site_url('favorites/remove') ?>" method="post">
                            <?= csrf_field() ?>

                            <input type="hidden" name="user_id" value="<?= session("user.id") ?>">
                            <input type="hidden" name="product_id" value="<?= esc($product["id"]) ?>">

                            <div style="width: 100%; display: block;">
                                <button class="btn btn-warning btn-lg mb-3">
                                    <i class="fa-solid fa-heart"></i> Remover dos Favoritos
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <form action="<?= site_url('favorites/add') ?>" method="post">
                            <?= csrf_field() ?>

                            <input type="hidden" name="user_id" value="<?= session("user.id") ?>">
                            <input type="hidden" name="product_id" value="<?= esc($product["id"]) ?>">

                            <div style="width: 100%; display: block;">
                                <button class="btn btn-warning btn-lg mb-3">
                                    <i class="fa-solid fa-heart"></i> Favoritar
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    <div style="width: 100%; display: block;">
                        <a href="<?= site_url('login') ?>" class="btn btn-warning btn-lg mb-3">
                            <i class="fa-solid fa-heart"></i> Favoritar
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($product['demonstration']): ?>
                <button class="btn btn-dark disabled btn-lg mb-3">
                    Comprar Agora
                </button>
            <?php else: ?>
                <?php if (session()->has('user')): ?>
                    <div style="width: 100%; display: block;">
                        <a href="<?= site_url('buy') ?>/<?= esc($product["id"]) ?>" class="btn btn-dark btn-lg mb-3">
                            Comprar Agora
                        </a>
                    </div>
                <?php else: ?>
                    <div style="width: 100%; display: block;">
                        <a href="<?= site_url('login') ?>" class="btn btn-dark btn-lg mb-3">
                            Comprar Agora
                        </a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (!empty($characteristics)): ?>
                <h5 class="mt-4">
                    Características
                </h5>

                <ul class="list-group list-group-flush mb-3">
                    <?php foreach ($characteristics as $char): ?>
                        <li class="list-group-item">
                            <?= esc($char['characteristic']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <h5>
                Descrição
            </h5>

            <p>
                <?= nl2br(esc($product['description'])) ?>
            </p>
        </div>
    </div>
</div>

<div class="content" style="margin-bottom: 61px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h5 class="mb-3">
                    Últimos Produtos no site
                </h5>
            </div>

            <?php if (!empty($last_products)): ?>
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
                                        R$ <?= number_format($p['price'], 2, ',', '.') ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center text-muted">
                        Nenhum produto encontrado.
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!--
  - Script.
 -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function()
    {
        const thumbs = document.querySelectorAll('.thumb');
        thumbs.forEach((thumb, index) => {
            thumb.addEventListener('click', () => {
                thumbs.forEach(t => t.classList.remove('active-thumb'));
                thumb.classList.add('active-thumb');
            });
        });
    });
</script>

<style>
    .thumb.active-thumb
    {
        border: 2px solid #000;
        opacity: 0.9;
    }

    .thumb:hover
    {
        opacity: 0.7;
    }

    /**
     * Container para evitar que a imagem estoure as bordas.
     */
    .carousel-inner
    {
        overflow: hidden;
        border-radius: 8px;
    }

    /**
     * Efeito suave nas imagens principais.
     */
    .main-image
    {
        transition: transform 0.4s ease;
        cursor: zoom-in;
    }

    /**
     * Quando passa o mouse, dá zoom
     */
    .main-image:hover
    {
        transform: scale(1.25);
        cursor: zoom-in;
    }
</style>
<?= $this->endSection() ?>