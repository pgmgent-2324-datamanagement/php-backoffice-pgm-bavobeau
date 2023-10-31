<?php

function getUsers($search = '') {
  global $db;

  $sql = "SELECT * FROM users";
  if($search) {
    $sql .= " WHERE firstname LIKE :search OR lastname LIKE :search OR email LIKE :search";
  }
  $stmt = $db->prepare($sql);
  if($search) {
    $stmt->bindValue(":search", "%$search%");
  }
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getUserById($id) {
  global $db;

  $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
  $stmt->bindValue(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_OBJ);
}

function addUser($firstname, $lastname, $email, $birthdate, $ban_id, $roles) {
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

function updateUser($id, $firstname, $lastname, $email, $birthdate, $ban_id, $roles) {
  //db connectie
  global $db;

  //sql
  $sql = "UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email, `birthdate` = :birthdate, `ban_id` = :ban_id where id = :id";

  //prepare
  $stmt = $db->prepare($sql);

  //bind
  if (count($_POST)) {
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":birthdate", $birthdate);
    $stmt->bindParam(":ban_id", $ban_id);
  }

  //execute
  $stmt->execute();

  //delete all roles before new roles are added to prevent duplicate roles for a user
  $stmt = $db->prepare("DELETE FROM `role_user` WHERE user_id = :user_id");
  $stmt->bindParam(":user_id", $id);
  $stmt->execute();

  foreach($roles as $role) {
    $stmt = $db->prepare("INSERT INTO `role_user` (`user_id`, `role_id`) VALUES (:user_id, :role_id)");
    $stmt->bindParam(":role_id", $role);
    $stmt->bindParam(":user_id", $id);
    $stmt->execute();
  }

  //redirect naar users.php
  header('Location: users.php');
}

function deleteUser($id) {
  global $db;

  $id = $_POST['id'];

  $stmt = $db->prepare("DELETE FROM `users` WHERE id = :id");
  $stmt->bindValue(':id', $id);
  $stmt->execute();

  //redirect naar users.php
  header('Location: users.php');
}

function getCountFromUsers() {
  global $db;

  $stmt = $db->prepare('SELECT COUNT(id) as count FROM users');
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
}