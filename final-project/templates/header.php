<?php
    $base_url = 'http://localhost/DES-VII-PHP/final-project/';
?>
<!doctype html>
<html lang="es">
<head>
  <title>RRHH</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <nav class="navbar navbar-expand navbar-light bg-light">
      <ul class="nav navbar-nav">
          <li class="nav-item">
              <a class="nav-link active" href="<?php echo $base_url; ?>index.php" aria-current="page">Sistemas <span class="visually-hidden">(current)</span></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $base_url; ?>sections/employees">Empleados</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $base_url; ?>sections/job-positions">Puestos</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo $base_url; ?>sections/users">Usuarios</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">Cerrar Sesión</a>
          </li>
      </ul>
  </nav>
  <main class="container">