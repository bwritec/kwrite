<!DOCTYPE html>
<html>
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
    <title><?= env('app.name'); ?> - <?= $title; ?></title>

    <!--
      - Estilos.
     -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>dist/css/bootstrap-5.3.7.css">

    <!--
      - Scripts.
     -->
    <script type="text/javascript" src="<?= base_url(); ?>dist/js/bootstrap.bundle-5.3.7.js"></script>

</head>
<body>

    <div style="text-align: center;" class="mt-5 mb-3">
        <img src="<?= base_url(); ?>dist/img/logo.png" style="width: 75px; height: 75px;">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= site_url('install/database/migrate') ?>" method="post">
                            <?= csrf_field() ?>

                            <p>
                                Muito Bem ! Você concluiu essa parte da instalação.
                                Agora a aplicação pode sé comunicar com seu banco de
                                dados. Se você estiver pronto, é hora de...
                            </p>

                            <button class="btn btn-primary btn-sm">
                                Instalar
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>