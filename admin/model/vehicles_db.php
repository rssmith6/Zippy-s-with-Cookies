<?php

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

function add_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $count = 0;
    $query = "INSERT INTO vehicles (year, model, price, make_id, type_id, class_id) VALUES
                            (:year, :model, :price, :make_id, :type_id, :class_id)";
    $statement=$db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }  
    $statement->closeCursor();
    return $count;
}

function delete_vehicle($year, $model, $price, $make_id, $type_id, $class_id) {
    global $db;
    $count = 0;
    $query = "DELETE FROM vehicles WHERE year = :year AND model = :model AND price = :price AND
                            make_id = :make_id AND type_id = :type_id AND class_id = :class_id";
    $statement=$db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':make_id', $make_id);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    if($statement->execute()) {
        $count = $statement->rowCount();
    }  
    $statement->closeCursor();
    return $count;
}