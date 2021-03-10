<?php

require "../app/model/product.php";
require "../app/model/category.php";

class ProductController {

    private $db;
    private $model;

    public function __construct($db) {
        $this->db = $db;
        $this->model = new ProductModel($db);
    }
    public function list() {
        $sort_columns = [
            0 => 'id',
            1 => 'name',
            2 => 'category_name'
        ];

        $sort['by'] = $_GET['sort'] ?? "id";
        $sort['order'] = $_GET['order'] ?? "asc";

        $data = $this->model->getAll($sort);
        require "../app/view/products_table.php";
    }

    public function add() {
        if (empty($_POST)) {
            $category_model = new CategoryModel($this->db); 
            $categories = $category_model->getAll();
            require "../app/view/products_form.php";
        } else {
            $this->model->add($_POST);
            header("Location: /product");
        }
    }

    public function edit($id) {
        if (empty($_POST)) {
            $data = $this->model->get($id);
            $category_model = new CategoryModel($this->db); 
            $categories = $category_model->getAll();
            require "../app/view/products_form.php";
        } else {
            $this->model->edit($id, $_POST);
            header("Location: /product");
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: /product");
    }
}