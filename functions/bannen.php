<?php

function getBannen() {
    global $db;

    $sql = "SELECT * FROM bannen";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addBan($name) {
    global $db;
  
    $stmt = $db->prepare("INSERT INTO `bannen` (`name`) VALUES (:name)");
    $stmt->bindValue(":name", $name);
    $stmt->execute();
    header("Location: bannen.php");
  }
  
  function updateBan($id, $name) {
    global $db;
  
    $stmt = $db->prepare("UPDATE `bannen` SET `name` = :name WHERE id = :id");
  
    $stmt->bindValue(":id", $id);
    $stmt->bindValue(":name", $name);
    $stmt->execute();
    header("Location: bannen.php");
  }
  
  function deleteBan($id) {
    global $db;
  
    $stmt = $db->prepare("DELETE FROM `bannen` WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
  
    header("Location: bannen.php");
  }