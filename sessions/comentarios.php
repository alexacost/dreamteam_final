<?php

  require '../database.php';

  $message = '';

  if (!empty($_POST['comentario'])) {
    $sql = "INSERT INTO comentarios (id_posteos,comentario,id_usuario) VALUES (:id_posteos, :comentario, :id_usuario)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':comentario', $_POST['comentario']);
    $stmt->bindParam(':id_posteos', $_POST['id_posteos']);
    $stmt->bindParam(':id_usuario', $_POST['id_usuario']);

    if ($stmt->execute()) {
      $message = 'Successfully created new comment';
    } else {
      $message = 'Sorry there must have been an issue creating your comment';
    }
  }
?>