<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once '../app/Models/Product.php';

class ProductController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm từ model Product
        $products = Product::getAllProducts();

        // Hiển thị view danh sách sản phẩm
        $this->render('product/index', ['products' => $products]);
    }

    public function show()
    {
        // Lấy `id` từ query string
        $id = $_GET['id'] ?? null;

        if (!$id) {
            http_response_code(400);
            die("Không tìm thấy đơn hàng.");
        }

        // Lấy thông tin chi tiết sản phẩm
        $product = Product::getById($id);

        // Hiển thị view chi tiết sản phẩm
        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $user = $_SESSION['user'];

        include '../app/Views/products/index.php';
    }
}
