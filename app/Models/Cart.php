<?php
class Cart
{
    public static function getCart()
    {
        return $_SESSION['cart'] ?? [];
    }

    public static function addProduct($product, $quantity = 1)
    {
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cart = self::getCart();
        foreach ($cart as &$item) {
            if ($item['id'] === $product->id) {
                $item['quantity'] += $quantity;  // Tăng số lượng nếu sản phẩm đã có
                $_SESSION['cart'] = $cart;
                return;
            }
        }

        // Nếu chưa có, thêm sản phẩm vào giỏ
        $cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'image_url' => $product->image_url
        ];

        // Lưu lại giỏ hàng vào session
        $_SESSION['cart'] = $cart;
    }

    public static function updateQuantity($productId, $quantity)
    {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $productId) {
                // Nếu số lượng nhỏ hơn 1, không cho phép giảm
                if ($quantity < 1) {
                    $quantity = 1;
                }
                $item['quantity'] = $quantity;
                return;
            }
        }
    }
}
