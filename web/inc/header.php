<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Liederliste</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-colorselector.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/liederliste.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
      <script src="js/jquery-2.1.3.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootbox.min.js"></script>
      <script src="js/jquery.validate.min.js"></script>
      <script src="js/bootstrap-colorselector.js"></script>
      <script src="js/liederliste.js"></script>

      <style type="text/css">
          .dropdown-colorselector>.dropdown-menu {
              min-width: 240px;
          }
          .color-btn, .dropdown-colorselector>.dropdown-menu>li {
              width: 60px !important;
              height: 60px !important;
          }
          .btn-colorselector {
              border: 1px solid black;
              width: 60px;
              height: 60px;
          }
          table {
              width: 100%;
          }
          th {
              text-align: center;
          }
          td {
              padding: 4px;
          }
          .btn {
              font-size: 40px;
          }
          .navbar-toggle {
              float: left !important;
          }
      </style>
      <?php
          $jsonSettings=loadSettings();
          $settings=json_decode($jsonSettings);

      ?>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">

      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Liederliste</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
              <li class="<?= (preg_match("/^.*index.php$/", $_SERVER["SCRIPT_NAME"])==1?"active":"") ?>"><a id="" href="index.php">Eingabe</a></li>
              <li class="<?= (preg_match("/^.*highlight.php$/", $_SERVER["SCRIPT_NAME"])==1?"active":"") ?>"><a id="" href="highlight.php">Highlight</a></li>
            <li class="<?= (preg_match("/^.*settings.php$/", $_SERVER["SCRIPT_NAME"])==1?"active":"") ?>"><a id="" href="settings.php">Einstellungen</a></li>
            <li class="<?= (preg_match("/^.*setup.php$/", $_SERVER["SCRIPT_NAME"])==1?"active":"") ?>"><a href="setup.php">Setup</a></li>
          </ul>
        </div>
      </div>

    </nav>

    <div class="container">
