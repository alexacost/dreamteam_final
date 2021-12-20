<?php
include '../index_include.php';

  $profile = $_SESSION['user_id'];
  if (!empty($_POST['id'])) {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_POST['id']);

    if ($stmt->execute()) {
      $message = 'Success!';
    } else {
      $message = 'Sorry there must have been an issue :(';
    }
  }
  
  header('Location: /dreamteam_final');


?>