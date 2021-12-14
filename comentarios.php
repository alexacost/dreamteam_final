<?php

  require './database.php';

  

  if (isset($_POST['coment'])) {
    $id = $_POST['id'];
    $id_posteo = $_POST['id_posteo'];
    $comentario = $_POST['comentario'];
    $sql = "INSERT INTO usuarios (id,id_posteo, comentario) VALUES ('$id','$id_posteo', '$comentario')";
  }  
?>