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
    <link rel="stylesheet" href="<?= base_url() ?>system/adminlte-3.2.0/plugins/fontawesome-free/css/all.css">

    <!--
      - icheck bootstrap
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/adminlte-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.css">

    <!--
      - Theme style
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/adminlte-3.2.0/dist/css/adminlte.css">

</head>
<body class="hold-transition login-page">

    <?= $this->renderSection('content') ?>

    <!--
      - jQuery
     -->
    <script src="<?= base_url() ?>system/adminlte-3.2.0/plugins/jquery/jquery.js"></script>

    <!--
      - Bootstrap 4
     -->
    <script src="<?= base_url() ?>system/adminlte-3.2.0/plugins/bootstrap/js/bootstrap.bundle.js"></script>

    <!--
      - AdminLTE App
     -->
    <script src="<?= base_url() ?>system/adminlte-3.2.0/dist/js/adminlte.js"></script>

</body>
</html>
