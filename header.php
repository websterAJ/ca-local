<?php  
	require 'script/conexion.php';
  require 'script/funciones.php';
  if (!Onsesion() ){
        header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title></title>
    <link href="<?= _BASE_URL_?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= _BASE_URL_?>css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="<?= _BASE_URL_?>css/dashboard.css" rel="stylesheet">
    <link href="<?= _BASE_URL_?>style.css" rel="stylesheet">
    <script src="<?= _BASE_URL_?>js/ie-emulation-modes-warning.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?= _BASE_URL_?>img/logo.png" width="40"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#">
                <span data-feather="log-out"></span>Salir
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <?php include 'nav.php'; ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
