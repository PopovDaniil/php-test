<?php

require "../app/model/product.php";
require "../app/model/category.php";
require "../system/lib/pagination.php";
require "../system/lib/link.php";

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

        $args['sort'] = $_GET['sort'] ?? "id";
        $args['order'] = $_GET['order'] ?? "asc";
        $args['page'] = $_GET['page'] ?? 1;
        $args['items_per_page'] = 2;

        $page_count = ceil($this->model->getTotal() / $args['items_per_page']);
        echo $page_count;

        $link = new Link($args);
        
        if ($args['page'] > $page_count) {
            header("Location: " . $link->render(['page' => $page_count]));
        }
        
        $pagination = new Pagination($args['page'], $page_count);
        $pages_list = $pagination->render($link);

        $data = $this->model->getAll($args);
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