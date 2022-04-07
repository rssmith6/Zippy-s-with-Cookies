<?php

function get_cars_by_make($makeID) {
    global $db;
    if($makeID) {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Left JOIN classes C on V.class_id = C.ID
                    Left JOIN makes M on V.make_id = M.ID
                    Left JOIN types T on V.type_id = T.ID
                        WHERE V.make_id = :ID ORDER BY V.Price desc';
    } else {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Inner JOIN classes C on V.class_id = C.ID
                    Inner JOIN makes M on V.make_id = M.ID
                    Inner JOIN types T on V.type_id = T.ID
                    ORDER BY V.Price desc';
    }
    $statement = $db->prepare($query);
    if($makeID) {
        $statement->bindValue(':ID', $makeID);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_makes() {
    global $db;
    $query =  'SELECT * FROM makes ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_types() {
    global $db;
    $query =  'SELECT * FROM types ORDER BY ID';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_classes() {
    global $db;
    $query = 'SELECT * FROM classes ORDER BY ID';
    $statement=$db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_cars_by_type($typeID) {
    global $db;
    if($typeID) {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Left JOIN classes C on V.class_id = C.ID
                    Left JOIN makes M on V.make_id = M.ID
                    Left JOIN types T on V.type_id = T.ID
                        WHERE V.type_id = :ID ORDER BY V.Price desc';
    } else {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Inner JOIN classes C on V.class_id = C.ID
                    Inner JOIN makes M on V.make_id = M.ID
                    Inner JOIN types T on V.type_id = T.ID
                    ORDER BY V.Price desc';
    }
    $statement = $db->prepare($query);
    if($typeID) {
        $statement->bindValue(':ID', $typeID);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_cars_by_class($classID) {
    global $db;
    if($classID) {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Left JOIN classes C on V.class_id = C.ID
                    Left JOIN makes M on V.make_id = M.ID
                    Left JOIN types T on V.type_id = T.ID
                        WHERE V.class_id = :ID ORDER BY V.Price desc';
    } else {
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, C.Class, M.Make FROM vehicles V
                    Inner JOIN classes C on V.class_id = C.ID
                    Inner JOIN makes M on V.make_id = M.ID
                    Inner JOIN types T on V.type_id = T.ID
                    ORDER BY V.Price desc';
    }
    $statement = $db->prepare($query);
    if($classID) {
        $statement->bindValue(':ID', $classID);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
?>