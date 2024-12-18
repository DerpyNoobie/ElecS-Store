<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once '../app/Models/Product.php';
require_once '../app/Models/Category.php';
require_once '../app/Models/Order.php';
require_once '../app/Models/Cart.php';
require_once '../app/Models/OrderDetail.php';

class CheckoutController extends Controller
{
    // Hiển thị form thanh toán
    public function showCheckoutForm()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $cart = Cart::getCart();
        $user = $_SESSION['user'];

        // Hiển thị trang thanh toán với thông tin giỏ hàng
        include '../app/Views/checkout/form.php';
    }

    // Xử lý thanh toán khi người dùng submit form
    public function processCheckout()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        // Kiểm tra dữ liệu từ form
        if (isset($_POST['name'], $_POST['phone'], $_POST['address'])) {
            $userId = $_SESSION['user']['id'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            // Tạo đơn hàng mới
            $order = new Order();
            $order->user_id = $userId;
            $order->name = $name;
            $order->phone = $phone;
            $order->address = $address;
            $order->status = 'Đang chờ xử lý';
            $order->created_at = date('Y-m-d H:i:s');
            $order->delivery_date = date('Y-m-d', strtotime('+3 days'));

            // Lưu đơn hàng vào database
            $order->save();

            $cart = Cart::getCart();

            // Thêm chi tiết đơn hàng vào
            foreach ($cart as $index => $productItem) {

                if (isset($productItem['quantity'], $productItem['price'])) {
                    // Lấy thông tin sản phẩm
                    $product = Product::getById($productItem['id']);
                    if ($product) {
                        // Thêm chi tiết đơn hàng vào bảng order_details
                        $orderDetail = new OrderDetail();
                        $orderDetail->order_id = $order->id;
                        $orderDetail->product_id = $productItem['id'];
                        $orderDetail->quantity = $productItem['quantity'];
                        $orderDetail->price = $productItem['price'];
                        $orderDetail->save();
                    }
                }
            }


            // Xóa giỏ hàng sau khi thanh toán
            unset($_SESSION['cart']);

            // Redirect tới trang cảm ơn hoặc thông báo thành công
            header('Location: /order/success');
            exit();
        }

        // Nếu không có dữ liệu hợp lệ từ form
        echo "Thông tin thanh toán không hợp lệ!";
    }

    public function successCheckout()
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];

        include '../app/Views/orders/success.php';
    }
}
