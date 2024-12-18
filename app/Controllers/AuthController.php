<?php
require_once '../app/Core/Controller.php';
require_once '../app/Models/User.php';

class AuthController extends Controller
{
    public function login()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::authenticate($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: /');
                exit();
            } else {
                $this->render('login', ['error' => 'Thông tin đăng nhập không chính xác!']);
                return;
            }
        }
        $this->render('login');
    }

    public function logout()
    {
        session_start();
        session_destroy(); // Hủy phiên người dùng
        header('Location: /login'); // Chuyển hướng về trang login
        exit();
    }

    public function index()
    {
        header('Location: /login');
    }

    public function info()
    {
        session_start();
        if (isset($_SESSION['user'])) {
            $this->render('info', ['user' => $_SESSION['user']]);
            exit();
        }

        header('Location: /login');
    }

    // Phương thức đăng ký
    public function register()
    {
        // Kiểm tra nếu người dùng đã đăng nhập rồi thì không cho đăng ký
        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: /');
            exit();
        }

        // Kiểm tra nếu form đã được submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $full_name = $_POST['full_name'];
            $email = $_POST['email'];

            // Validate dữ liệu (có thể thêm các kiểm tra thêm)
            if (empty($username) || empty($password) || empty($full_name) || empty($email)) {
                $error = "Tất cả các trường đều phải được điền đầy đủ.";
            } else {
                // Thêm người dùng vào cơ sở dữ liệu
                $user = new User();
                $user->register($username, $password, $full_name, $email);

                // Redirect về trang chủ
                header('Location: /login');

                exit();
            }
        }

        // Hiển thị view đăng ký
        $this->render('register');
    }
}
