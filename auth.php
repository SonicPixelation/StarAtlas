<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main_style.css">
  </head>
  <body>


    <nav class="navbar navbar-light">
      <a class="navbar-brand">Tektonics</a>
    </nav>
    <?php
      require 'php/register.php';
      getToken();
      getCharId();
      getLocation();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>
