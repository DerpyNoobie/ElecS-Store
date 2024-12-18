<?php
require_once '../app/core/Database.php';

class OrderDetail
{

    public $order_id;
    public $product_id;
    public $quantity;
    public $price;

    public function save()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare('INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)');
        $stmt->execute([
            $this->order_id,
            $this->product_id,
            $this->quantity,
            $this->price
        ]);
    }

    public static function create($orderId, $productId, $quantity)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("INSERT INTO order_details (order_id, product_id, quantity) VALUES (:order_id, :product_id, :quantity)");
        $stmt->execute([
            ':order_id' => $orderId,
            ':product_id' => $productId,
            ':quantity' => $quantity
        ]);
    }
}
