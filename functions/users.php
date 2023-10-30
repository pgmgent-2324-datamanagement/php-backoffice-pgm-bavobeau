<?php

function getUsers() {
  global $db;

  $sql = "SELECT * FROM users";
  $stmt = $db->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addUser($firstname, $lastname, $email, $birthdate, $ban_id) {
  //db connectie
  global $db;

  //sql
  $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `birthdate`, `ban_id`) VALUES (:firstname, :lastname, :email, :birthdate, :ban_id)";

  //prepare
  $stmt = $db->prepare($sql);

  //bind
  if (count($_POST)) {
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthdate", $birthdate);
    $stmt->bindParam(":ban_id", $ban_id);
  }

  //execute
  $stmt->execute();

  //redirect naar users.php
  header('Location: users.php');
}

function editUser($id, $firstname, $lastname, $email, $birthdate, $ban_id) {
  //db connectie
  global $db;

  //sql
  $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `birthdate`, `ban_id`) VALUES (:firstname, :lastname, :email, :birthdate, :ban_id)";

  //prepare
  $stmt = $db->prepare($sql);

  //bind
  if (count($_POST)) {
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthdate", $birthdate);
    $stmt->bindParam(":ban_id", $ban_id);
  }

  //execute
  $stmt->execute();

  //redirect naar users.php
  header('Location: users.php');
}

function deleteUser() {
  global $db;

  $id = $_POST['id'];

  $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
  $stmt->bindValue(':id', $id);
  $stmt->execute();

  //redirect naar users.php
  header('Location: users.php');
}