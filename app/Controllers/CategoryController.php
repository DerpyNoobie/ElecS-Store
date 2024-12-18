<?php
require_once __DIR__ . '/../Core/Controller.php';
require_once '../app/Models/Product.php';
require_once '../app/Models/Category.php';

class CategoryController extends Controller
{
    public function show()
    {

        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: /login');
            exit();
        }

        $categoryId = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if (!$categoryId) {
            header('Location: /');
            exit();
        }

        // Lấy danh sách sản phẩm theo category ID
        $category = Category::getCategoryById($categoryId);

        // Lấy danh sách sản phẩm theo category ID
        $products = Product::getProductsByCategory($categoryId);

        // Hiển thị view
        $this->render('category/show', ['products' => $products, 'category' => $category, 'user' => $_SESSION['user']]);
    }
}
