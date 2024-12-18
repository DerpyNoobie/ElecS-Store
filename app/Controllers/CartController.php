<?php
require_once '../app/Models/Cart.php';
require_once '../app/Models/Product.php';

class CartController
{
    public function index()
    {
        session_start();

        // Lấy giỏ hàng từ session
        $cart = Cart::getCart();
        $user = $_SESSION['user'] ?? [];

        // Tính tổng số tiền trong giỏ hàng
        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Hiển thị giỏ hàng
        include '../app/Views/cart/index.php';
    }

    public function addToCart()
    {
        session_start();

        // Kiểm tra xem có dữ liệu POST không
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $productId = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // Lấy thông tin sản phẩm từ database
            $product = Product::getById($productId);

            if ($product) {
                // Thêm sản phẩm vào giỏ hàng
                Cart::addProduct($product, $quantity);

                // Trả về kết quả dưới dạng JSON
                echo json_encode(['success' => true]);
            } else {
                // Nếu không tìm thấy sản phẩm
                echo json_encode(['success' => false]);
            }
        } else {
            // Trường hợp không có dữ liệu
            echo json_encode(['success' => false]);
        }
    }

    public function updateCart()
    {
        session_start();

        // Kiểm tra xem người dùng có gửi yêu cầu tăng hoặc giảm số lượng không
        if (isset($_POST['update'])) {
            list($action, $productId) = explode('-', $_POST['update']);
            $productId = (int)$productId;

            // Tìm sản phẩm trong giỏ hàng
            $cart = Cart::getCart();
            foreach ($cart as &$item) {
                if ($item['id'] === $productId) {
                    // Tăng hoặc giảm số lượng
                    if ($action === 'increase') {
                        $item['quantity']++;
                    } elseif ($action === 'decrease' && $item['quantity'] > 1) {
                        $item['quantity']--;
                    }
                    break;
                }
            }

            // Cập nhật lại giỏ hàng trong session
            $_SESSION['cart'] = $cart;
            header('Location: /cart');
        }

        // Xử lý xóa sản phẩm khỏi giỏ hàng
        if (isset($_POST['remove'])) {
            $productId = (int)$_POST['remove'];
            $cart = Cart::getCart();

            // Xóa sản phẩm khỏi giỏ hàng
            foreach ($cart as $key => $item) {
                if ($item['id'] === $productId) {
                    unset($cart[$key]);
                    break;
                }
            }

            // Cập nhật lại giỏ hàng trong session
            $_SESSION['cart'] = array_values($cart);
            header('Location: /cart');
        }
    }

    public function checkout()
    {
        session_start();

        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        // Xử lý thanh toán hoặc tạo đơn hàng ở đây
        // Bạn có thể lưu thông tin thanh toán vào database hoặc xử lý đơn hàng ở đây
        // Ví dụ tạo order trong database

        echo "Thanh toán thành công!";
    }
}
