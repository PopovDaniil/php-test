<?php

class Auth
{
    public static $db;

    public static function attempt($login, $password) {
        if ($login && $password) {
            $result = self::$db->query(
                "SELECT * FROM user
                WHERE login = '" . $login . "'
                AND password = MD5('" . $password . "')"
            );
            if (count($result)) {
                $_SESSION['user_id'] = $result[0]['id'];
                header("Location: /product");
            }
        }
    }

    public static function id() {
        return $_SESSION['user_id'] ?? 0;
    }
}