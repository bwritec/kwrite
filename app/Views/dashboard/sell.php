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

                    <li class="list-group-item active">
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
                <h1>Vender Produto</h1>

                <?php if (session('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('dashboard/sell/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label>
                            Nome do Produto
                        </label>

                        <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= old('name') ?>">

                        <?php if (isset($errors['name'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['name']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Condição
                        </label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="conditions" id="conditionNovo" value="Novo" checked>

                            <label class="form-check-label" for="conditionNovo">
                                Novo
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="conditions" id="conditionUsado" value="Usado">

                            <label class="form-check-label" for="conditionUsado">
                                Usado
                            </label>
                        </div>
                    </div>

                    <?php if (session()->has('user') && session('user.admin') === '1'): ?>
                        <div class="mb-3">
                            <label>
                                Produto de demonstração
                            </label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="demonstration" id="demonstrationFalse" value="0">

                                <label class="form-check-label" for="demonstrationFalse">
                                    Não
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="demonstration" id="demonstrationTrue" value="1">

                                <label class="form-check-label" for="demonstrationTrue">
                                    Sim
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label>
                            Descrição
                        </label>

                        <textarea name="description" class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>"><?= old('description') ?></textarea>

                        <?php if (isset($errors['description'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['description']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Quantidade
                        </label>

                        <input type="number" name="amount" class="form-control <?= isset($errors['amount']) ? 'is-invalid' : '' ?>" value="<?= old('amount') ?>">

                        <?php if (isset($errors['amount'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['amount']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Preço (sem taxa)
                        </label>

                        <input type="text" name="price" class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>" value="<?= old('price') ?>">
                        <small class="text-muted">A taxa de <?= env('app.rate') ?>% será aplicada automaticamente.</small>

                        <?php if (isset($errors['price'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['price']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Categoria
                        </label>

                        <select name="category_id" class="form-control <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>">
                            <option value="">Selecione</option>
                            <?php foreach ($categories as $c): ?>
                                <option value="<?= $c['id'] ?>"><?= esc($c['name']) ?></option>
                            <?php endforeach; ?>
                        </select>

                        <?php if (isset($errors['category_id'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['category_id']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Características (1 por linha)
                        </label>

                        <textarea name="characteristics" class="form-control <?= isset($errors['characteristics']) ? 'is-invalid' : '' ?>"><?= old('characteristics') ?></textarea>

                        <?php if (isset($errors['characteristics'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['characteristics']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <h5>
                        Dimensões do Produto (Correios)
                    </h5>

                    <div class="mb-3">
                        <label for="peso" class="form-label">
                            Peso (kg)
                        </label>

                        <input type="text" name="peso" class="form-control <?= isset($errors['peso']) ? 'is-invalid' : '' ?>" value="<?= old('peso') ?>">

                        <?php if (isset($errors['peso'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['peso']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="comprimento" class="form-label">
                            Comprimento (cm)
                        </label>

                        <input type="text" name="comprimento" class="form-control <?= isset($errors['comprimento']) ? 'is-invalid' : '' ?>" value="<?= old('comprimento') ?>">

                        <?php if (isset($errors['comprimento'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['comprimento']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">
                            Altura (cm)
                        </label>

                        <input type="text" name="altura" class="form-control <?= isset($errors['altura']) ? 'is-invalid' : '' ?>" value="<?= old('altura') ?>">

                        <?php if (isset($errors['altura'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['altura']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="largura" class="form-label">
                            Largura (cm)
                        </label>

                        <input type="text" name="largura" class="form-control <?= isset($errors['largura']) ? 'is-invalid' : '' ?>" value="<?= old('largura') ?>">

                        <?php if (isset($errors['largura'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['largura']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <hr>

                    <div class="mb-3">
                        <label>Miniatura (imagem de destaque)</label>
                        <input type="file" name="miniature" class="form-control <?= isset($errors['miniature']) ? 'is-invalid' : '' ?>">

                        <?php if (isset($errors['miniature'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['miniature']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label>
                            Fotos do Produto
                        </label>

                        <input type="file" name="photos[]" multiple class="form-control <?= isset($errors['photos']) ? 'is-invalid' : '' ?>">

                        <?php if (isset($errors['photos'])): ?>
                            <div class="invalid-feedback">
                                <?= esc($errors['photos']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-dark">Cadastrar Produto</button>
                </form>

            </div>
        </div>
    </div>
</div>








<?= $this->endSection() ?>
