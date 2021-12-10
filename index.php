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

<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/mando.ico" type="image/x-icon">
    <title>Producto</title>
 </head>
 <body class="container">

    <header>
    <?php if(!empty($user)): ?>
      <h1 class="m-2"> hola, <?= $user['user']; ?> </h1>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/test_user_2">Agencia</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="mb-5">
        <?php
    $sql = 'SELECT * FROM posteos';
    foreach ($conn->query($sql) as $row) { ?>
        
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox">

                    <div class="row product-gallery mx-1">

                        <div class="col-12 mb-0">
                            <figure class="view overlay rounded z-depth-1 main-img">
                            <?php 
        echo '<img src="data:foto/jpeg;base64,'.base64_encode($row['contenido']).'"/>';
        ?>
                                </a>
                            </figure>

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-6">

                <h1 class="producto_titulo"><?=$row['titulo']?></h1>
                <p class="pt-1"><?=$row['descripcion']?></p>
            </div>
            <div class="row m-1 mt-5 mb-5">
                <h2 class="mb-4">Deja tu comentario</h2>
                <div class="md-form md-outline">
                    <input id="form76" class="md-textarea form-control form-control-coment" rows="4" width="50%">
                    <a href="#" class="btn boton mt-4">Enviar</a>
                </div>
            </div>
            <?php   } ?>

    </section>

    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2021 Copyright: <span class="footer_texto">DreamTeam</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a style="color:blue;" href="login.php">Login</a> or
      <a style="color:blue;" href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>
