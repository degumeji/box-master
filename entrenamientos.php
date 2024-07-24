<?php session_start(); ?>
<html>
<html lang="en">
  <head>
    <title>Entrenamiento</title>
    <meta name="description" content="">
    <?php include('components/header.php') ?>
    <?php include('components/menu_top.php') ?>
  </head>
  <body>

    <?php include('desc.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include('components/menu_left.php') ?>
        <?php include('components/entrenamiento.php') ?>
      </div>
    </div>

    <?php include('components/footer.php') ?>
  </body>
</html>