<?php
class Auth {
    public static function check() {
        session_start();
        return isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true;
    }

    public static function login($password) {
        $config = require __DIR__ . '/../config.php';
        return password_verify($password, $config['app']['admin_password']);
    }
} 