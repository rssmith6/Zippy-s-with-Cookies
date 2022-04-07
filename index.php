<?php
//Start session management with a persistent cookie
$lifetime = 60 * 60 * 24 * 14; // 2 weeks
session_set_cookie_params($lifetime, '/');
session_start();

require('model/database.php');
require('model/carlist_db.php');



$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action) {
        $action = 'vehicles_list';
    }
}

$name = filter_input(INPUT_GET, 'name', FILTER_UNSAFE_RAW);
if($name) {
    $_SESSION['name'] = $name;
}

switch ($action) {
    case 'vehicles_list': {
        $makeID = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
        if(!$makeID) {
            $makeID = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT);
        }
        $typeID = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
        if(!$typeID) {
            $typeID = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT);
        }
        $classID = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
        if(!$classID) {
            $classID = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT);
        }
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();

        if($makeID) {
            $vehicles = get_cars_by_make($makeID);
        } else if($typeID) {
            $vehicles = get_cars_by_type($typeID);
        } else if($classID) {
            $vehicles = get_cars_by_class($classID);
        } else
            $vehicles = get_cars_by_make($makeID);
        include('view/vehicleslist.php');
        break;
    }
    case 'register': {
        include('view/register.php');
        break;
    }
    case 'logout': {
        $name = $_SESSION['name'];
        unset($_SESSION['name']);
        session_destroy();
        setcookie('name', time() - 3600);
        include('view/logout.php');
        break;
    }

}

?>