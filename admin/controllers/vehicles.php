<?php
switch ($action) {
    case 'vehicles_list':
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
        include('view/vehicles_list.php');
        break;
  
    case 'add_vehicles_form':
        $makes_list = get_makes();
        $types_list = get_types();
        $classes_list = get_classes();
        include('view/add_vehicles_form.php');
        break;
    case 'add_vehicle':
        $year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
        $model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);    
        $count = add_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
        header("Location: .?added_vehicle={$count}");
        break;   
    case 'delete_vehicle':
        $year = filter_input(INPUT_POST, 'year', FILTER_UNSAFE_RAW);
        $model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);  
        $count = delete_vehicle($year, $model, $price, $make_id, $type_id, $class_id);
        header("location: .?deleted_vehicle={$count}");
        break;
}
?>