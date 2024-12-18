<?php
require_once '../app/core/Database.php';

class Product
{
    public $id;
    public $name;
    public $price;
    public $description;
    public $image_url;
    public $category_id;

    public function __construct($id, $name, $price, $description, $image_url, $category_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->category_id = $category_id;
    }

    public static function getAllProducts()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT products.*, categories.name AS category_name FROM products 
                            LEFT JOIN categories ON products.category_id = categories.id');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT products.*, categories.name AS category_name FROM products 
                            LEFT JOIN categories ON products.category_id = categories.id
                            WHERE products.id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    // Lấy danh sách sản phẩm theo danh mục
    public static function getProductsByCategory($categoryId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM products WHERE category_id = :category_id');
        $stmt->execute(['category_id' => $categoryId]);
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}
