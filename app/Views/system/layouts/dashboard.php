<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!--
      - Charset.
     -->
    <meta charset="utf-8">

    <!--
      - Viewport.
     -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
      - Título.
     -->
    <title><?= esc(env('app.name')) ?> - <?= esc($title) ?></title>

    <!--
      - Google Font: Source Sans Pro
     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!--
      - Font Awesome
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/plugins/fontawesome-free/css/all.css">

    <!--
      - Theme style
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/dist/css/adminlte.css">

</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">
                        Home
                    </a>
                </li>

                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">
                        Contact
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>

                    <div class="navbar-search-block">
                        <form action="<?= base_url() ?>index.php/search" method="GET" class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="text" name="q" placeholder="Buscar produtos, marcas e muito mais...">

                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>

                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url() ?>index.php" class="brand-link">
                <img src="<?= base_url() ?>system/dist/img/AdminLTELogo.png" alt="Dashboard Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                <span class="brand-text font-weight-light">
                    <?php
                        echo str_replace(" ", "", ucwords(env('app.name')));
                    ?>
                </span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url() ?>system/dist/img/avatar2.png" class="img-circle elevation-2" alt="User Image">
                    </div>

                    <div class="info">
                        <a href="#" class="d-block">
                            <?= implode(' ', array_slice(explode(' ', $user['name']), 0, 2)); ?>
                        </a>
                    </div>
                </div>

                <form action="<?= base_url() ?>index.php/search" method="GET">
                    <div class="form-inline">
                        <div class="input-group">
                            <input class="form-control form-control-sidebar" type="text" name="q" placeholder="Buscar produtos, marcas e muito mais...">

                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if ($page == "dashboard.index"): ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>

                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>

                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page == "dashboard.favorites"): ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/favorites" class="nav-link active">
                                    <i class="nav-icon fas fa-star"></i>

                                    <p>
                                        Favoritos
                                    </p>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/favorites" class="nav-link">
                                    <i class="nav-icon fas fa-star"></i>

                                    <p>
                                        Favoritos
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page == "dashboard.purchases"): ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/purchases" class="nav-link active">
                                    <i class="nav-icon fas fa-shopping-basket"></i>

                                    <p>
                                        Compras
                                    </p>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/purchases" class="nav-link">
                                    <i class="nav-icon fas fa-shopping-basket"></i>

                                    <p>
                                        Compras
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($page == "dashboard.sales"): ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/sales" class="nav-link active">
                                    <i class="nav-icon fas fa-shipping-fast"></i>

                                    <p>
                                        Vendas
                                    </p>
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>index.php/dashboard/sales" class="nav-link">
                                    <i class="nav-icon fas fa-shipping-fast"></i>

                                    <p>
                                        Vendas
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <li class="nav-header">
                            ADMIN
                        </li>

                        <li class="nav-item">
                            <a href="../calendar.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>

                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <?= $this->renderSection('content') ?>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Versão</b> 1.0.0
            </div>

            <strong>
                Copyright &copy; <?= date('Y'); ?> <a href="<?= base_url() ?>index.php"><?= esc(env('app.name')) ?></a>.
            </strong>

            Todos os direitos reservados.
        </footer>

        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <!--
      - jQuery
     -->
    <script type="text/javascript" src="<?= base_url() ?>system/plugins/jquery/jquery.js"></script>

    <!--
      - Bootstrap 4
     -->
    <script type="text/javascript" src="<?= base_url() ?>system/plugins/bootstrap/js/bootstrap.bundle.js"></script>

    <!--
      - AdminLTE App
     -->
    <script type="text/javascript" src="<?= base_url() ?>system/dist/js/adminlte.js"></script>

</body>
</html>
