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