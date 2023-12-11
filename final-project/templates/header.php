<?php
    session_start();
    $base_url = 'http://localhost/DES-VII/DES-VII-PHP/final-project/';

    if (!isset($_SESSION['user'])) {
        header("location:".$base_url."login.php");
    }
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

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
          crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
              <a class="nav-link" href="<?php echo $base_url; ?>close.php">Cerrar Sesión</a>
          </li>
      </ul>
  </nav>
  <main class="container">
  <?php if (isset($_GET['mensaje'])) { ?>
        <script>
            Swal.fire({icon: "success", title: "<?php echo $_GET['mensaje']; ?>"});
        </script>
  <?php } ?>