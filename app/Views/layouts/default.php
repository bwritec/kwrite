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
    <title><?= esc(env('app.name')) ?> - Welcome to CodeIgniter 4!</title>

    <!--
      - Favicon.
     -->
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!--
      - Estilos
     -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>dist/css/bootstrap-5.3.7.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>dist/css/fontawesome-7.0.0.css">

    <!--
      - Scripts.
     -->
    <script type="text/javascript" src="<?= base_url() ?>dist/js/bootstrap.bundle-5.3.7.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>dist/js/jquery-3.7.1.js"></script>

    <!--
      - Estilos.
     -->
    <style>
        /**
         * Cards.
         */
        .card-header
        {
            padding: 15px 30px;
        }

        .card-body
        {
            padding: 30px;
        }

        .card-footer
        {
            padding-right: 30px;
            padding-left: 30px;
        }

        /**
         * Todos os componentes da navbar.
         */
        .navbar-mobile
        {
            border-bottom: 1px solid #BBBBBB;
            background-color: #FFE600;
            display: block;
        }

        @media (min-width: 768px)
        {
            .navbar-mobile
            {
                display: none;
            }
        }

        .navbar-mobile .btn
        {
            margin-top: 4px;
        }

        .navbar-mobile .navbar-logo
        {
            display: flex;
            justify-content: center;
        }

        .navbar
        {
            border-bottom: 1px solid #BBBBBB;
            background-color: #FFE600;
            display: none;
        }

        @media (min-width: 768px)
        {
            .navbar
            {
                display: block;
            }
        }

        .navbar .row
        {
            padding: 5px 0;
            width: 100%;
        }

        .navbar-logo
        {
            margin-bottom: 5px;
        }

        .navbar-logo img
        {
            display: block;
            float: left;
            width: 40px;
        }

        .navbar-logo .text
        {
            text-decoration: none;
            padding: 0 0 0 8px;
            font-weight: bold;
            line-height: 40px;
            font-size: 14px;
            display: block;
            height: 40px;
            float: left;
        }

        .navbar-search input
        {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            width: calc(100% - 40px);
            height: 40px;
            float: left;
            border: 0;
        }

        .navbar-search input:focus
        {
            box-shadow: unset;
        }

        .navbar-search button,
        .navbar-search button:hover
        {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            background-color: #FFFFFF;
            color: #000000;
            height: 40px;
            width: 40px;
        }

        .navbar .categories
        {
            margin-right: 8px;
            max-width: 120px;
            float: left;
        }

        .navbar .actions
        {
            float: right;
            height: 38px;
            padding: 0;
            margin: 0;
        }

        .navbar .actions .list
        {
            padding-left: 15px;
            line-height: 38px;
            display: block;
            float: left;
        }

        .navbar .actions .list a
        {
            text-decoration: none;
            color: #000000;
        }

        .navbar .actions .list a:hover
        {
            text-decoration: underline;
        }

        .navbar .cards
        {
            text-align: center;
            line-height: 38px;
            max-width: 62px;
            color: #000000;
            float: right;
            height: 38px;
            width: 38px;
        }

        /**
         * Componentes da sidebar.
         */
        .sidebar-mobile
        {
            background-color: rgba(0, 0, 0, 0.8);
            position: absolute;
            height: 100vh;
            display: none;
            z-index: 999;
            width: 100%;
            left: 0;
            top: 0;
        }

        @media (min-width: 768px)
        {
            .sidebar-mobile
            {
                display: none !important;
            }
        }

        .sidebar-mobile .box
        {
            border-right: 1px solid #BBB;
            background-color: #F9F9F9;
            max-width: 270px;
            overflow: auto;
            height: 100vh;
            width: 100%;
            float: left;
        }

        .sidebar-mobile .close
        {
            float: right;
        }

        .sidebar-mobile .close .btn
        {
            background-color: rgba(255, 255, 255, 0.8);
            margin: 4px 4px 0 0;
        }

        .sidebar-mobile .sidebar-logo
        {
            margin-bottom: 7px;
            padding: 8px;
            width: 100%;
            float: left;
        }

        .sidebar-mobile .sidebar-logo img
        {
            display: block;
            float: left;
            width: 40px;
        }

        .sidebar-mobile .sidebar-logo .text
        {
            text-decoration: none;
            padding: 0 0 0 8px;
            font-weight: bold;
            line-height: 40px;
            font-size: 14px;
            display: block;
            height: 40px;
            float: left;
        }

        .sidebar-mobile .informar-cep
        {
            height: 40px;
            width: 100%;
            float: left;
        }

        .sidebar-mobile .informar-cep .box
        {
            border: unset;
            height: 40px;
            width: 100%;
        }

        .sidebar-mobile .cats
        {
            padding: 15px 8px;
            width: 100%;
            float: left;
        }

        .sidebar-mobile .menu
        {
            width: 100%;
            float: left;
        }

        .sidebar-mobile .menu .actions
        {
            margin-bottom: 15px;
            padding: 0;
        }

        .sidebar-mobile .menu .actions .list
        {
            line-height: 34px;
            padding: 0 8px;
            height: 34px;
            width: 100%;
        }

        .sidebar-mobile .menu .actions .list a
        {
            text-decoration: none;
            color: #000000;
        }

        .search-mobile
        {
            background-color: #FFFFFF;
            position: absolute;
            display: none;
            height: 100vh;
            z-index: 999;
            width: 100%;
            left: 0;
            top: 0;
        }

        @media (min-width: 768px)
        {
            .sidebar-mobile
            {
                display: none !important;
            }
        }

        .search-mobile .close
        {
            float: right;
            margin: 15px;
        }

        .search-mobile .card
        {
            margin: 15px;
        }

        .search-mobile .card .card-body
        {
            padding: 0;
        }

        .search-mobile .search input
        {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            width: calc(100% - 40px);
            height: 40px;
            float: left;
            border: 0;
        }

        .search-mobile .search input:focus
        {
            box-shadow: unset;
        }

        .search-mobile .search button,
        .search-mobile .search button:hover
        {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
            background-color: #FFFFFF;
            color: #000000;
            height: 40px;
            width: 40px;
        }

        /**
         * Estilos do conteúdo.
         */
        .content
        {
            margin: 15px 0;
            width: 100%;
            float: left;
        }

        /**
         * Footer
         */
        .footer
        {
            border-top: 1px solid #ccc;
            background-color: #FFFFFF;
            position: relative;
            line-height: 45px;
            height: 45px;
            float: left;
            width: 100%;
        }

        .footer p
        {
            margin-bottom: 0;
        }

        .fixed-bottom
        {
            transition: all 0.3s ease;
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
        }

        /**
         * Exibir submenu lateralmente no hover.
         */
        .dropdown-submenu:hover > .dropdown-menu
        {
            position: absolute;
            display: block;
            margin-top: 0;
            left: 100%;
            top: 0;
        }

        /**
         * list-group-item
         */
        .list-group-item a
        {
            text-decoration: none;
        }

        .list-group-item.active
        {
            background-color: #FFE600;
            border-color: #FFE600;
        }

        .list-group-item.active a
        {
            color: #000000;
        }
    </style>

</head>
<body class="clearfix">

    <div class="navbar-mobile mb-3">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <button class="btn bars">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <div class="col-6 navbar-logo">
                    <a href="<?= base_url() ?>index.php" class="text-dark">
                        <img src="<?= base_url() ?>dist/img/logo.png">

                        <span class="text">
                            <?= esc(env('app.name')) ?>
                        </span>
                    </a>
                </div>

                <div class="col-3">
                    <button class="btn btn-search" style="float: right;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-mobile">
        <div class="box">
            <div class="sidebar-logo">
                <a href="<?= base_url() ?>index.php" class="text-dark">
                    <img src="<?= base_url() ?>dist/img/logo.png">

                    <span class="text">
                        <?= esc(env('app.name')) ?>
                    </span>
                </a>
            </div>
        </div>

        <div class="close">
            <button class="btn btn-sm">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    <div class="search-mobile">
        <div class="close">
            <button class="btn btn-dark btn-search-close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <div class="card" style="width: calc(100% - 30px)">
            <div class="card-body">
                <div class="search">
                    <form action="<?= base_url() ?>index.php/search" method="GET">
                        <input type="text" name="q" class="form-control" placeholder="Buscar no site">

                        <button class="btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar mb-3">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3 offset-md-0 col-md-3 col-lg-2 navbar-logo">
                    <a href="<?= base_url() ?>index.php" class="text-dark">
                        <img src="<?= base_url() ?>dist/img/logo.png">

                        <span class="text">
                            <?= esc(env('app.name')) ?>
                        </span>
                    </a>
                </div>

                <div class="col-12 col-md-6 navbar-search">
                    <form action="<?= base_url() ?>index.php/search" method="GET">
                        <input type="text" name="q" class="form-control" placeholder="Buscar no site">

                        <button class="btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid container-md">
            <div class="row">
                <div class="col-12 col-md-9 offset-md-3 col-lg-10 offset-lg-2">
                    <div class="dropdown categories">
                        <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </button>

                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="">
                                    Esporte
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="">
                                    Cultura
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="">
                                    Jornalismo
                                </a>
                            </li>
                        </ul>
                    </div>

                    <ul class="actions">
                        <?php if (session()->has('user')): ?>
                            <div class="dropdown">
                                <?php
                                    $fullName = session('user.name');
                                    $firstName = explode(' ', trim($fullName))[0];
                                ?>
                                <a class="btn btn-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none; color: #000000;">
                                    <?= esc($firstName) ?>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url() ?>index.php/dashboard">
                                            Dashboard
                                        </a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="<?= site_url('logout') ?>">
                                            Sair
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php else: ?>
                            <li class="list">
                                <a href="<?= base_url() ?>index.php/register">
                                    Criar Conta
                                </a>
                            </li>

                            <li class="list">
                                <a href="<?= base_url() ?>index.php/login">
                                    Entre
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?= $this->renderSection('content') ?>

    <footer class="footer" id="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>
                        &copy; <?= date('Y') ?> - <?= esc(env('app.name')) ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        $( document ).ready(function()
        {
            /**
             * Abrir sidebar mobile quando houver
             * um click em bars.
             */
            $(".navbar-mobile .bars").click(function()
            {
                $(".sidebar-mobile").css("display", "block");
            });

            /**
             * Fechar a sidebar mobile quando houver
             * um click.
             */
            $(".sidebar-mobile .close .btn").click(function()
            {
                $(".sidebar-mobile").css("display", "none");
            });

            /**
             * Abrir campo de busca em dispositivos
             * mobile.
             */
            $(".btn-search").click(function()
            {
                $(".search-mobile").css("display", "block");
            });

            /**
             * Fechar campo de busca em dispositivos
             * mobile.
             */
            $(".btn-search-close").click(function()
            {
                $(".search-mobile").css("display", "none");
            });
        });

        (function($)
        {
            $.fn.smartFooter = function(options)
            {
                var settings = $.extend({
                    mainSelector: 'main',  // seletor do conteúdo principal
                    offset: 0              // margem opcional inferior
                }, options);

                var $footer = this;
                var $main = $(settings.mainSelector);

                function adjustFooter()
                {
                    // Altura total da página
                    var docHeight = $(window).height();
                    var contentHeight = $('body').outerHeight(true);

                    if (contentHeight + settings.offset < docHeight)
                    {
                        $footer.addClass('fixed-bottom');
                    } else
                    {
                        $footer.removeClass('fixed-bottom');
                    }
                }

                // Ajusta ao carregar e ao redimensionar
                $(window).on('load resize', adjustFooter);
                adjustFooter();

                return this;
            };
        })(jQuery);

        $(function()
        {
            $('#site-footer').smartFooter();
        });
    </script>

</body>
</html>
