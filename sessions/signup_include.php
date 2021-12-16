<?php

  require '../database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO usuarios (user,email, password) VALUES (:user,:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':user', $_POST['user']);
    $stmt->bindParam(':password', $_POST['password']);

    if ($stmt->execute()) {
      $message = 'Success!';
    } else {
      $message = 'Sorry there must have been an issue :(';
    }
  }
?>