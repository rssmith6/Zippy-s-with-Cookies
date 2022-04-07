<?php

function get_types() {
    global $db;
    $query = "SELECT * FROM types ORDER BY ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $types=$statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function add_type($type_name) {
    global $db;
    $query = "INSERT INTO types (Type) VALUES (:type_name)";
    $statement=$db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}

function delete_type($typeID) {
    global $db;
    $query = "DELETE FROM types WHERE ID =:typeID";
    $statement=$db->prepare($query);
    $statement->bindValue(':typeID', $typeID);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}
?>