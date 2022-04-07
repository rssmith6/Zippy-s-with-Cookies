<?php

function get_makes() {
    global $db;
    $query = "SELECT * FROM makes ORDER BY ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $makes=$statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_make($makeID) {
    global $db;
    $query = "DELETE FROM makes WHERE ID =:ID";
    $statement=$db->prepare($query);
    $statement->bindValue(':ID', $makeID);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name) {
    global $db;
    $query = "INSERT INTO makes (Make) VALUES (:make_name)";
    $statement=$db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }
    $statement->closeCursor();
    return $count;
}
?>