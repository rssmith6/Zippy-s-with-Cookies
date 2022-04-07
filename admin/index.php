<?php
require_once('model/database.php');
require_once('model/vehicles_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/classes_db.php');




$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action) {
        $action = 'vehicles_list';
    }
}

require_once('controllers/vehicles.php');
require_once('controllers/types.php');
require_once('controllers/makes.php');
require_once('controllers/classes.php');