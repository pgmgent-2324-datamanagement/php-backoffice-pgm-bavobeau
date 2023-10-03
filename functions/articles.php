<?php

function getArticles($search = '') {
    global $db;

    $sql = "SELECT * FROM articles";
    if($search) {
        $sql .= " WHERE title LIKE :search OR content LIKE :search";
    }
    $stmt = $db->prepare($sql);
    if($search) {
        $stmt->bindValue(':search', "%$search%");
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}