<?php
require_once '../app/core/Database.php';

class User
{
    public static function authenticate($username, $password)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
        $stmt->execute([
            ':username' => $username,
            ':password' => md5($password), // Thay bằng password_hash() nếu cần
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Phương thức đăng ký người dùng
    public function register($username, $password, $full_name, $email)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('INSERT INTO users (username, password, full_name, email) VALUES ( :username, :password, :full_name, :email)');
        $stmt->execute([
            'username' => $username,
            'password' => md5($password),
            'full_name' => $full_name,
            'email' => $email,
        ]);
    }

    // Phương thức tìm người dùng theo email
    public static function findByEmail($username)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
