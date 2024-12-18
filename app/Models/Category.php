<?php
require_once '../app/core/Database.php';

class Category
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Lấy tất cả các loại sản phẩm
    public static function getAllCategories()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT * FROM categories');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAllCategoriesWithProductCount()
    {
        $db = Database::getInstance()->getConnection();

        // Truy vấn để lấy tất cả các loại sản phẩm
        $stmt = $db->query('SELECT * FROM categories');
        $categories = $stmt->fetchAll(PDO::FETCH_OBJ);

        // Duyệt qua từng loại sản phẩm để đếm số lượng sản phẩm tương ứng
        foreach ($categories as $category) {
            $countStmt = $db->prepare('SELECT COUNT(*) as count FROM products WHERE category_id = :category_id');
            $countStmt->execute(['category_id' => $category->id]);
            $countResult = $countStmt->fetch(PDO::FETCH_OBJ);

            // Thêm số lượng sản phẩm vào đối tượng loại sản phẩm
            $category->count = $countResult->count;
        }

        return $categories;
    }

    // Lấy loại sản phẩm theo id
    public static function getCategoryById($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
