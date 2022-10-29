<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle-TCC | <?= $title; ?></title>
  <script src="<?= js("sweetalert.js"); ?>"></script>

  <link rel="stylesheet" href="<?= plugins("bootstrap/bootstrap.min.css"); ?>" />
  <link rel="stylesheet" href="<?= plugins("animate-css/animate.css"); ?>" />
  <link rel="stylesheet" href="<?= plugins("fontawesome/css/all.css"); ?>" />
  <!-- <link rel="stylesheet" href="<?= plugins("fonts/Pe-icon-7-stroke.css"); ?>" /> -->
  <!-- <link rel="stylesheet" href="<?= plugins("themify/css/themify-icons.css"); ?>" /> -->
  <!-- <link rel="stylesheet" href="<?= plugins("slick-carousel/slick/slick-theme.css"); ?>" /> -->

  <link rel="stylesheet" href="<?= css("style.css"); ?>" />
  <link rel="stylesheet" href="<?= css("card.css"); ?>" />
  <link rel="stylesheet" href="<?= css("acesso.css"); ?>" />
  <link rel="stylesheet" href="<?= css("table.css"); ?>" />

  <link rel="icon" href="<?= images("icons/icone.png") ?>" type="image/x-icon" />
</head>

<body>
  <?= $v->section("content"); ?>

  <script src="<?= js("jquery.js"); ?>"></script>
  <script src="<?= js("scripts.js"); ?>"></script>
  <script src="<?= js("jquery.mask.min.js"); ?>"></script>

  <script src="<?= plugins("jquery/jquery.min.js"); ?>"></script>
  <script src="<?= plugins("bootstrap/bootstrap.min.js"); ?>"></script>
  <script src="<?= js("script.js"); ?>"></script>

  <?= $v->section("js"); ?>
</body>

</html>
