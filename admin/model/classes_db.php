<?php

function get_classes() {
    global $db;
    $query = "SELECT * FROM classes ORDER BY ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $classes=$statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function delete_class($classID) {
    global $db;
    $query = "DELETE FROM classes WHERE ID =:ID";
    $statement=$db->prepare($query);
    $statement->bindValue(':ID', $classID);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name) {
    global $db;
    $query = "INSERT INTO classes (Class) VALUES (:class_name)";
    $statement=$db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}
?>