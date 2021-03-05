<?php
class CategoryModel 
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

   public function get($id) {
        $result = $this->db->query(
            "SELECT * FROM category WHERE id=$id"
        );
        return $result[0];
    }

    public function delete($id) {
        $this->db->query(
            "DELETE FROM category WHERE id=$id"
        );
    }

    public function add($data) {
        if ($this->validate($data)) {
            $this->db->query(
                "INSERT INTO category(name) VALUES('". $data['name']."')"
            );
            return true;
        } else {
            return false;
        }
    }

    public function edit($data) {
        if ($this->validate($data)) {
            $this->db->query(
                "UPDATE category 
                SET name='" . $data['name'] . "'
                WHERE id=${data['id']}"
            ); 
        return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $result = $this->db->query(
            "SELECT * FROM category ORDER BY id");
        return $result;
    }

    private function validate($data) {
        if (strlen($data['name']) < 5) {
            echo "В названии должно быть не менее 5 символов";
            return false;
        }
        elseif (preg_match('/[^A-Za-zА-Яа-яЁё\s]+/', $data['name'])) {
            echo "Недопустимые символы";
            return false;
        }
        return true;
    }
}