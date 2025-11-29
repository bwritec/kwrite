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
        
    </style>

</head>
<body>


    <?= $this->renderSection('content') ?>

</body>
</html>
