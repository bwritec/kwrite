<?= $this->extend('layouts/default') ?>
<?= $this->section('content') ?>
<div class="content" style="margin-bottom: 61px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 home-sidebar">
                <ul class="list-group mb-3">
                    <li class="list-group-item">
                        <a href="<?= base_url() ?>index.php/dashboard">
                            Dashboard
                        </a>
                    </li>
                </ul>

                <?php if (session()->has('user') && session('user.admin') === '1'): ?>
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <a href="<?= base_url() ?>index.php/dashboard/tags">
                                Tags
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?= base_url() ?>index.php/dashboard/categories">
                                Categorias
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="col-12 col-md-9 col-lg-10">
                <h3 class="mb-3">
                    Tags
                </h3>

                <a href="<?= site_url('dashboard/tags/create') ?>" class="btn btn-primary mb-3">
                    + Nova Tag
                </a>

                <?php if (session()->has('success')): ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Criada em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tags as $tag): ?>
                            <tr>
                                <td><?= $tag['id'] ?></td>
                                <td><?= esc($tag['name']) ?></td>
                                <td><?= esc($tag['description']) ?></td>
                                <td><?= $tag['created_at'] ?></td>

                                <td>
                                    <a href="<?= site_url('dashboard/tags/edit/' . $tag['id']) ?>" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>

                                    <a href="<?= site_url('dashboard/tags/delete/' . $tag['id']) ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Excluir esta tag?');">
                                        Excluir
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
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
    </div>
</div>
<?= $this->endSection() ?>
