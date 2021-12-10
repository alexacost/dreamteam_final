<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT user,id, email, password FROM usuarios WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link rel="shortcut icon" href="img/mando.ico" type="image/x-icon">
  <title>DreamTeam</title>
</head>

<body class="container">

  <header>
  <?php if(!empty($user)): ?>
    <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
    <a class="navbar-brand" href="/dreamteam_final">
      <img class="logo" src="logodt.png" alt="logo" width="41" height="40">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dreamteam_final">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Perfil de <?= $user['user']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </div>
    <h6 class="titulo m-1">Catalogo Multimedial</h6>
    </nav>
  </header>

  <main>
    <p>Filtro</p>

    <section class=" d-flex justify-content-between row">

      <?php
      $sql = 'SELECT * FROM posteos';
      foreach ($conn->query($sql) as $row) { ?>

      <div class="card col-3 seccion" style="width: 18rem;">
        <?php 
        echo '<img class="card-img-top" src="data:foto/jpeg;base64,'.base64_encode($row['contenido']).'"/>';
        ?>
        <div class="card-body">
          <p class="card-title texto-negrita"><?=$row['titulo']?></p>
          <p class="precios">$ 10.000</p>
          <p class="card-text"><?=$row['descripcion']?></p>
          <a href="#" class="btn boton">Ver más</a>
        </div>
      </div>
      <?php   } ?>
    </section>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a style="color:blue;" href="login.php">Login</a> or
      <a style="color:blue;" href="signup.php">SignUp</a>
    <?php endif; ?>
  </main>

  <footer class="page-footer font-small blue">
    <div class="footer-copyright text-center py-3">© 2021 Copyright: <span class="footer_texto">DreamTeam</span> </div>
  </footer>

  <script src="dreamteam.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

</body>

</html>