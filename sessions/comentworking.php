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
    <?php if(!empty($message)): ?>
      <p style="color:green;" > <?= $message ?></p>
    <?php endif; ?>
    <form action="" method="POST">
    <?php
      $sql = "SELECT * FROM posteos WHERE id_posteo = '$id_posteo'";
      
      foreach ($conn->query($sql) as $row) { $id_posteo = $row['id_posteo'];
      $id_usuario = $row['id'] ?>
      <div class="container">
  <div class="row">
    <div class="col">
    <figure class="figure">
          <?php 
        echo '<img class="figure-img img-fluid rounded" src="data:foto/jpeg;base64,'.base64_encode($row['contenido']).'"/>';
        ?>
    </figure>
    </div>
    <div class="col m-3">
      <h1 class="text-start"> <?= $row['titulo'] ?></h1>
    <p class="mb-5 text-start"> <?= $row['descripcion'] ?> </p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p>Comment whatever you want!</p>
      <input hidden id="id_posteos" name="id_posteos" value="<?= $id_posteo ?>">
      <input hidden id="id_posteos" name="id_posteos" value="<?= $id_usuario ?>">
    <input type="text" id="comentario" name="comentario" value="comentario" placeholder="comentario">
    <button type="submit" id="coment" name="coment" value="submit">Submit</button>
    </form>
    </div>
  </div>
</div>
      <?php  } ?>
      <h2>Comments</h2>
      <?php $sql = "SELECT * FROM comentarios WHERE id_posteos = '{$id_posteo}'";
      foreach ($conn->query($sql) as $row) { ?>
      
      <p><?=$row['comentario']?></p>
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
