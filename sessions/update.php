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

  header('Location: /dreamteam_final');

?>