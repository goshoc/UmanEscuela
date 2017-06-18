
<?php
      include_once("../conexion.php");
      session_start();
      if(isset($_SESSION['id_tipo_usuario']))
      {
  ?>
<html>
<head>

<title>Mapa del sitio</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   <!--
    Cuando este lista, cambiar favicon y descomentarlo
   <link rel="icon" href="../../favicon.ico"> -->
    <title>Mapa del sitio</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/signin.css" rel="stylesheet">
    <link href="../css/indexEst.css" rel="stylesheet">
    <!-- Custom style for navbar -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">
    <!-- FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">

    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>

    <script type="text/javascript" src="recargaPantalla.js"></script>


</head>

<body>
  <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Uman Menú</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">ELEGIR  MUNÚS</a></li>
            <li><a href="info.php">SOBRE NOSOTROS</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="LogOut.php">Log out</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>



<div class="container">

<h3 style="text-align:center">Mapa del sitio</h3><br>

<p><a href="index.php">ELEGIR  MUNÚS</a></p>

<p><a href="info.php">SOBRE NOSOTROS</a></p>

</div>
</body>

<footer class="navbar-fixed-bottom">
  <?php include_once("Footer.html") ?>
</footer>

</html>

<?php }
     else
      {
         echo("Usted debe identificarse para entrar a esta área");
      }
    ?>