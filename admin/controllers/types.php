<?php
switch ($action) {
    case 'types_list': {
        $types = get_types();
        include('view/types_list.php');
        break;
    }

    case 'add_type':{
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_UNSAFE_RAW);
        if($type_name) {
            $count = add_type($type_name);
            header("Location: .?action=types_list&added_type={$count}");
        } else {
            $error_message = "Invalid type";
            include('view/error.php');
        }
        break;
        }
    case 'delete_type': {
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        if($type_id) {
            $count = delete_type($type_id);
            header("Location: .?action=types_list&deleted_type={$count}");
        } else {
            $error_message = "Invalid type";
            include('view/error.php');
        }
        break;
    }
}
?>