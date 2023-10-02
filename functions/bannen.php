<?php

function getBannen() {
    global $db;

    $sql = "SELECT * FROM bannen";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}