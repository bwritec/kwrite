<?= $this->extend('system/layouts/dashboard') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Categorias
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
                            Categorias
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
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
    </section>
</div>
<?= $this->endSection() ?>
