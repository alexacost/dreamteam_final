<?php
include 'comentarios.php';
include '../index_include.php';
$id_posteo = ($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles.css">
  <link rel="shortcut icon" href="img/mando.ico" type="image/x-icon">
  <title>DreamTeam</title>
</head>

  <body class="container">
  <header>
  <?php if(!empty($user)): ?>
    <nav class="navbar navbar-expand-lg navbar-dark ">
    <div class="container-fluid">
    <a class="navbar-brand" href="/dreamteam_final">
      <img class="logo" src="../img/logodt.png" alt="logo" width="41" height="40">
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
          <a class="nav-link" href="perfil.php">Perfil de <?= $user['user']; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
        </li>
      </ul>
    </div>
  </div>
    </nav>
  </header>
  <main>
    <?php if(!empty($message)): ?>
      <p style="color:green;" > <?= $message ?></p>
    <?php endif; ?>
    <form action="" method="POST">
    <?php
      $sql = "SELECT * FROM posteos INNER JOIN usuarios ON posteos.id_usuario = usuarios.id WHERE id_posteo = '$id_posteo'  ";
      
      foreach ($conn->query($sql) as $row) { $id_posteo = $row['id_posteo'];
      $id_usuario = $row['user'] ?>
      <div class="">
  <div class="row mt-5">
    <div class="col">
    <figure class="figure d-flex flex-start">
          <?php 
        echo '<img class="imgproducto figure-img img-fluid rounded" src="data:foto/jpeg;base64,'.base64_encode($row['contenido']).'"/>';
        ?>
    </figure>
    </div>
    <div class="col m-3 d-flex  flex-column flex-end">
      <h1 class="text-start"> <?= $row['titulo'] ?></h1>
    <p class="mb-5 text-start"> <?= $row['descripcion'] ?> </p>
    <p class="text-muted d-flex "> Posteo creado por  <?=$row['user']?> </p>
    </div>
  </div>
  <div class="row divtuopinion">
    <div class="col">
      <p class="d-flex flex-start mt-5 dejanosTuOpinon">??Dejanos tu opini??n!</p>
      <input hidden id="id_posteos" name="id_posteos" value="<?= $id_posteo ?>">
      <input hidden id="id_usuario" name="id_usuario" value="<?=$_SESSION['user_id']?>">
    <input type="text" id="comentario" name="comentario" value="comentario" placeholder="comentario">
    <button type="submit" id="coment" name="coment" value="submit" class="boton btn d-flex flex-start">Submit</button>
    </form>
    </div>
  </div>
</div>
      <?php  } ?>

      <h2 class="d-flex flex-start mt-5">Comentarios</h2>
      <?php $sql = "SELECT * FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id  WHERE id_posteos = '{$id_posteo}'";
      foreach ($conn->query($sql) as $row) {
         ?>

      <p class="d-flex flex-start comentaritos"><?=$row['comentario']?></p>
      <p class="d-flex flex-start text-muted">Comentado por <?=$row['user']?> a las <?=$row['time']?> </p>
      <?php  } ?>

    </form>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a  href="sessions/login.php">Login</a> or
      <a  href="sessions/signup.php">SignUp</a>
    <?php endif; ?>
    </main>
  </body>
</html>
