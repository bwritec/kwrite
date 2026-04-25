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
                <a href="<?= site_url('dashboard/categories/create') ?>" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Nova Categoria
                </a>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered mb-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Categoria Pai</th>
                            <th>Slogan</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <tr>
                                    <td><?= $cat['id'] ?></td>
                                    <td><?= esc($cat['name']) ?></td>
                                    <td><?= esc($cat['parent_name'] ?? '-') ?></td>
                                    <td><?= esc($cat['slogan']) ?></td>
                                    <td>
                                        <a href="<?= site_url('dashboard/categories/edit/'.$cat['id']) ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a href="<?= site_url('dashboard/categories/delete/'.$cat['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Excluir categoria?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    Nenhuma categoria encontrada
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!--
                  - Paginação
                 -->
                <div class="d-flex justify-content-center">
                    <?= $pager->links('default', 'bootstrap') ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection() ?>
