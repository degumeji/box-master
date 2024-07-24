<?php session_start(); ?>
<html>
<html lang="en">
  <head>
    <title><?php require("config/config.php"); echo EMPRESA; ?></title>
    <meta name="description" content="">
    <!--meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"-->
    <?php include('components/header.php') ?>
    <?php include('components/menu_top.php') ?>
  </head>
  <body>

    <?php include('desc.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include('components/menu_left.php') ?>
      </div>
    </div>

    <script src="js/main.js"></script>

    <?php include('components/footer.php') ?>
  </body>
</html>