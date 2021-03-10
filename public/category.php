<?php
require "config.php";
require "lib/db.php";

require "model/category.php";

$db = new DB($db_name, $db_user, $db_pass);

$category_model = new CategoryModel($db);

// Main script

$data = $_POST;
$action = $_GET['action'] ?? "";
$id = (int) ($_GET['id'] ?? $_POST['id'] ?? "");

//Обработка запросов

if ($action == 'edit' && $id) {
    $data = $category_model->get($id);
}
elseif ($action == 'delete' && $id) {
    $category_model->delete($id);
    header("Location: /category.php");
} 
elseif (!empty($_POST) && !$id) {
    if ($category_model->add($_POST)) {
        header("Location: /category.php");
    } else {
        $action = 'add';
    }
}
elseif (!empty($_POST) && $id) {
    if ($category_model->edit($_POST)) {
        header("Location: /category.php");
    } else {
        $action = 'edit';
    }
}
else {
    $data = $category_model->getAll();
}

if ($action == 'add' || $action == 'edit') {
    require "../view/category_form.php";
} else {
    require "../view/category_table.php";
}

?>
