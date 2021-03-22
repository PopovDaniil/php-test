<?php
$db_name = "poks3220";
$db_user = "poks3220";
$db_pass = "gRFrlm";

$db = new PDO("mysql:dbname=$db_name;host=localhost", $db_user, $db_pass);

 if (isset($_GET['up'])) {
     echo "Накатываем модуль";
     $db->query(
        "CREATE TABLE IF NOT EXISTS user ( 
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            login VARCHAR(32) NOT NULL,
            password VARCHAR(32) NOT NULL
        ) ENGINE=MyISAM"
    );
    
 } elseif (isset($_GET['down'])) {
    echo "Откатываем модуль";
    $db->query(
        "DROP TABLE user"
    );
 }