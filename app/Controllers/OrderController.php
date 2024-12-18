<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once '../app/Models/Order.php';
require_once '../app/Models/OrderDetail.php';

class OrderController extends Controller
{
    public function createOrder()
    {
        // Kiểm tra giỏ hàng
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            header('Location: /cart');
            exit();
        }

        // Tạo đơn hàng (Order)
        $orderId = Order::create();

        // Lưu chi tiết đơn hàng (OrderDetail)
        foreach ($_SESSION['cart'] as $productId => $item) {
            OrderDetail::create($orderId, $productId, $item['quantity']);
        }

        // Xóa giỏ hàng sau khi thanh toán
        unset($_SESSION['cart']);

        // Hiển thị trang thành công
        $this->render('order/success');
    }

    public function show()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];

        // Lấy danh sách đơn hàng
        $orders = Order::getAll();

        // Hiển thị view danh sách đơn hàng
        include '../app/Views/orders/index.php';
    }

    public function details()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];

        // Lấy `id` từ query string
        $orderId = $_GET['id'] ?? null;

        if (!$orderId) {
            http_response_code(400);
            die("Không tìm thấy đơn hàng.");
        }

        // Lấy thông tin đơn hàng và chi tiết đơn hàng
        $order = Order::getById($orderId);
        $orderDetails = Order::getOrderDetails($orderId);

        if (!$order) {
            http_response_code(404);
            die("Đơn hàng không tồn tại.");
        }

        // Hiển thị view chi tiết đơn hàng
        include '../app/Views/orders/details.php';
    }
}
