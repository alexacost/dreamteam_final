<?php

  require './database.php';



  if (isset($_POST['coment'])) {
    $sql = "INSERT INTO comentarios (id,id_posteo,comentario) VALUES (:id,:id_posteo, :comentario)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->bindParam(':id_posteo', $_POST['id_posteo']);
    $stmt->bindParam(':comentario', $_POST['comentario']);
  }

?>