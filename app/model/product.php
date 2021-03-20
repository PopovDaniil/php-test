<?php
class ProductModel 
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function get($id) {
        $result = $this->db->query(
            "SELECT * FROM product WHERE id=$id");
        return $result[0];
    }

    public function delete($id) {
        $this->db->query(
            "DELETE FROM product WHERE id=$id"
        );
    }

    public function add($data) {
        $this->db->query(
            "INSERT INTO product(name, category_id) VALUES('". $data['name']."', '". $data['category_id']."')"
        ); 
    }

    public function edit($id, $data) {
        $result = $this->db->query(
            "UPDATE product SET
            name='" . $data['name'] . "',
            category_id='" . $data['category_id'] . "'
            WHERE id=". $id
        ); 
    }

    public function getAll($args) {
        $sql = "SELECT 
        p.id AS id,
        p.name AS name,
        c.name AS category_name
        FROM product p
        LEFT JOIN category c ON (c.id = p.category_id)";
        
        if (!empty($args['sort'])) {
            $sql .= " ORDER BY " . $args['sort'] . " " . $args['order'];
        }

        if ($args['items_per_page']) {
            $sql .= " LIMIT ";
            if ($args['page']) {
                $sql .= ($args['page'] - 1) * $args['items_per_page'] . ", ";
            }
            $sql .= $args['items_per_page'];
        }

        echo $sql;
        $result = $this->db->query($sql);
        return $result;
    }

    public function getTotal() {
        $sql = 
            "SELECT COUNT(*) 
            as count FROM product";
        $result = $this->db->query($sql);
        return $result[0]['count'];
    }
}