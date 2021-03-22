<?php
$db_name = "poks3220";
$db_user = "poks3220";
$db_pass = "gRFrlm";

$db = new PDO("mysql:dbname=$db_name;host=localhost", $db_user, $db_pass);

 if (isset($_GET['up'])) {
     echo "Накатываем модуль";
     $db->query(
        "CREATE TABLE IF NOT EXISTS category ( 
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL
        ) ENGINE=MyISAM"
    );
    $db->query(
        "ALTER TABLE product ADD category_id INT(11) NULL"
    );
 } elseif (isset($_GET['down'])) {
    echo "Откатываем модуль";
    $db->query(
        "ALTER TABLE product DROP COLUMN category_id"
    );
    $db->query(
        "DROP TABLE category"
    );
 }