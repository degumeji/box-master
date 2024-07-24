<?php session_start(); ?>
<html>
<html lang="en">
  <head>
    <!--title>Horarios y Entrenamientos</title-->
    <title><?php require("config/config.php"); echo EMPRESA; ?></title>
    <meta name="description" content="">
    <?php include('components/header.php') ?>
    <?php include('components/menu_top.php') ?>
  </head>
  <body>

    <?php include('desc.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include('components/menu_left.php') ?>
        <?php include('components/horario.php') ?>
      </div>
    </div>

    <?php include('components/footer.php') ?>
  </body>
</html>