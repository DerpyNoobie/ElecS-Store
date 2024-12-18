<?php
require_once '../app/core/Database.php';

class Order
{
    public $id;
    public $user_id;
    public $name;
    public $phone;
    public $address;
    public $status;
    public $created_at;
    public $delivery_date;

    public static function create()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO orders (created_at) VALUES (NOW())");
        $stmt->execute();
        return $db->lastInsertId();
    }

    public function save()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('INSERT INTO orders (user_id, name, phone, address, status, created_at, delivery_date) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([
            $this->user_id,
            $this->name,
            $this->phone,
            $this->address,
            $this->status,
            $this->created_at,
            $this->delivery_date
        ]);
        $this->id = $db->lastInsertId(); // Lưu lại ID của đơn hàng
    }

    public static function getAll()
    {
        // Kiểm tra xem session đã có giá trị user_id hay chưa
        if (!isset($_SESSION['user']['id'])) {
            return []; // Nếu không có user_id trong session, trả về mảng rỗng
        }

        $userId = $_SESSION['user']['id']; // Lấy giá trị user_id từ session

        // Kết nối đến cơ sở dữ liệu
        $db = Database::getInstance()->getConnection();

        // Chuẩn bị câu truy vấn SQL
        $stmt = $db->prepare("SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC");

        // Gán giá trị cho tham số user_id trong câu truy vấn
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);

        // Thực thi câu truy vấn
        $stmt->execute();

        // Trả về kết quả
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getById($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function getOrderDetails($orderId)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare(
            "SELECT od.*, p.name AS product_name, p.image_url AS product_image 
            FROM order_details od
            JOIN products p ON od.product_id = p.id
            WHERE od.order_id = ?"
        );
        $stmt->execute([$orderId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
