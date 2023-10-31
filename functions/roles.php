<?php

function getRoles() {
    global $db;

    $sql = "SELECT * FROM roles";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getRolesByUser($userId) {
    global $db;

    $stmt = $db->prepare("SELECT role_id FROM role_user WHERE user_id = :user_id");
    $stmt->bindValue(":user_id", $userId);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

function addRole($name) {
  global $db;

  $stmt = $db->prepare("INSERT INTO `roles` (`name`) VALUES (:name)");
  $stmt->bindValue(":name", $name);
  $stmt->execute();
  header("Location: bannen.php");
}

function updateRole($id, $name) {
  global $db;

  $stmt = $db->prepare("UPDATE `roles` SET `name` = :name WHERE id = :id");

  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":name", $name);
  $stmt->execute();
  header("Location: bannen.php");
}

function deleteRole($id) {
  global $db;

  $stmt = $db->prepare("DELETE FROM `roles` WHERE id = :id");
  $stmt->bindValue(":id", $id);
  $stmt->execute();

  header("Location: bannen.php");
}