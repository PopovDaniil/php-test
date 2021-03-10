<?php

//test

$url = explode("/", $_GET['path']);
print_r($url);

if (empty($url[0])) {
    die("Not found");
} else {
    $controller_name = $url[0];
    $class_name = $controller_name . "Controller";
    if (empty($url[1])) {
        $action = "list";
    } else {
        if (is_numeric($url[1])) {
            $id = $url[1];
            $action = $url[2] ?? "";
        } else {
            $action = $url[1];
        }
    }
}

require "../config.php";

require "../system/lib/db.php";

require "../app/controller/" . $controller_name . ".php";

$db = new DB($db_name, $db_user, $db_pass);

$controller = new $class_name($db);
if (isset($id)) {
    $controller->$action($id);
} else {
    $controller->$action();
}
/* $product_model = new ProductModel($db);
$category_model = new CategoryModel($db); 

// Main script

$action = $_GET['action'] ?? "";
$id = (int) ($_GET['id'] ?? $_POST['id'] ?? "");
$name = $_POST['name'] ?? "";

//Обработка запросов

if ($action == 'add') {
    $categories = $category_model->getAll();
    require "../view/products_form.php";
} 

elseif ($action == 'edit' && $id) {
    $data = $product_model->get($id);
    $categories = $category_model->getAll();
    require "../view/products_form.php";
}

elseif ($action == 'delete' && $id) {
    $product_model->delete($id);
    header("Location: /");
} 

elseif ($name && !$id) {
    $product_model->add($_POST);
    header("Location: /");
}

elseif ($name) {
    $product_model->edit($_POST);
    header("Location: /");
}

else {
    $data = $product_model->getAll();
    require "../view/products_table.php";
}
 */
?>
