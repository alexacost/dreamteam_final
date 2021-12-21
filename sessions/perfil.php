<?php
include '../index_include.php';

  $message = '';
  $profile = $_SESSION['user_id'];
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "UPDATE usuarios SET user = :user, email = :email WHERE id = '{$profile}'";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':user', $_POST['user']);

    if ($stmt->execute()) {
      $message = 'Success!';
    } else {
      $message = 'Sorry there must have been an issue :(';
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
    </nav>
  </header>

  <main>

  <?php if(!empty($message)): ?>
      <p style="color:green;" > <?= $message ?></p>
    <?php endif; ?>

    <section class=" d-flex justify-content-between row mt-5">

      <?php
      $sql = "SELECT user,email,password FROM usuarios where id = '{$profile}'";
      foreach ($conn->query($sql) as $row) { ?>
      <form action="" method="POST">
      <div class="d-flex flex-column">
          <div class="col">
              <p class="d-flex flex-start nombrecitos">User</p>
      <input type="text" name="user" id="user" value="<?= $row['user'] ?>">
        </div>
        <div class="col">
            <p  class="d-flex flex-start nombrecitos">Password</p>
      <input type="password" name="password" value="<?= $row['password'] ?>">
      </div>
      <div class="col">
        <p class="d-flex flex-start nombrecitos">Email</p>
      <input type="text" name="email" id="email" value="<?= $row['email'] ?>">
      </div>
      <div class="d-flex flex-column">
      <input type="submit" value="Guardar Cambios">
      </div>
      </div>
      </form>

      <?php   } ?>
    </section>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a  href="sessions/login.php">Login</a> or
      <a  href="sessions/signup.php">SignUp</a>
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