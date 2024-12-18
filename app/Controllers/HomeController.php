<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once '../app/Models/Product.php';
require_once '../app/Models/Category.php';

class HomeController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        // Lấy tất cả loại sản phẩm từ cơ sở dữ liệu
        $products = Product::getAllProducts();

        // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $categories = Category::getAllCategoriesWithProductCount();

        // Hiển thị view sản phẩm
        $this->render('/home', ['categories' => $categories, 'products' => $products, 'user' => $_SESSION['user']]);
    }
}
