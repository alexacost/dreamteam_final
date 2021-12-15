<?php
include 'comentarios.php';
$id_posteo = ($_GET['id']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
  </head>
  <body>

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

      <?php $sql = "SELECT * FROM comentarios WHERE id_posteos = '{$id_posteo}'";
      foreach ($conn->query($sql) as $row) { ?>
      <h2>Comments</h2>
      <p><?=$row['comentario']?></p>
      <?php  } ?>

    </form>

  </body>
</html>
