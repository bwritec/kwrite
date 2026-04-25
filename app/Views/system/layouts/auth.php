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
      - icheck bootstrap
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/plugins/icheck-bootstrap/icheck-bootstrap.css">

    <!--
      - Theme style
     -->
    <link rel="stylesheet" href="<?= base_url() ?>system/dist/css/adminlte.css">

</head>
<body class="hold-transition login-page">

    <?= $this->renderSection('content') ?>

    <!--
      - jQuery
     -->
    <script src="<?= base_url() ?>system/plugins/jquery/jquery.js"></script>

    <!--
      - Bootstrap 4
     -->
    <script src="<?= base_url() ?>system/plugins/bootstrap/js/bootstrap.bundle.js"></script>

    <!--
      - AdminLTE App
     -->
    <script src="<?= base_url() ?>system/dist/js/adminlte.js"></script>

</body>
</html>
