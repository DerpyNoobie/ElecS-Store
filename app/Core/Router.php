<?php
class Router
{
    private static $routes = [
        ['GET', '', 'HomeController@index'],
        ['GET', '/login', 'AuthController@login'],
        ['POST', '/login', 'AuthController@login'],
        ['GET', '/logout', 'AuthController@logout'],
        ['GET', '/register', 'AuthController@register'],  // Đường dẫn đến trang đăng ký
        ['POST', '/register', 'AuthController@register'],
        ['GET', '/info', 'AuthController@info'],
        ['GET', '/category', 'CategoryController@show'],  // Routes cho sản phẩm theo category
        ['GET', '/product-detail', 'ProductController@show'], // Routes xem chi tiết sản phẩm
        ['GET', '/cart', 'CartController@index'], // Routes cho giỏ hàng
        ['POST', '/cart/add', 'CartController@addToCart'],
        ['POST', '/cart/update', 'CartController@updateCart'],

        ['GET', '/checkout-view', 'CheckoutController@showCheckoutForm'], // Hiển thị form thanh toán
        ['POST', '/checkout', 'CheckoutController@processCheckout'], // Xử lý thanh toán
        ['GET', '/order/success', 'CheckoutController@successCheckout'], // Xử lý thanh toán thành công
        ['GET', '/orders', 'OrderController@show'], // Lấy danh sách đơn hàng
        ['GET', '/orders/details', 'OrderController@details'], // Chi tiết đơn hàng
    ];

    // Phương thức addRoute() để thêm route mới
    public static function addRoute($method, $path, $controllerAction)
    {
        self::$routes[] = [$method, $path, $controllerAction];
    }

    public static function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        foreach (self::$routes as $route) {
            $method = $route[0]; // Phương thức (GET, POST, ...)
            $path = $route[1]; // Đường dẫn
            $controllerAction = $route[2]; // Controller@action

            // Kiểm tra xem phương thức và đường dẫn có khớp với request không
            if ($_SERVER['REQUEST_METHOD'] === $method && trim($url, '/') === trim($path, '/')) {
                if (!empty($controllerAction) && is_string($controllerAction)) {
                    // Tách controller và action
                    $controllerActionParts = explode('@', $controllerAction);
                    $controllerName = $controllerActionParts[0];
                    $actionName = $controllerActionParts[1];

                    // Xử lý controller và method
                    $controllerFile = __DIR__ . '/../Controllers/' . $controllerName . '.php';
                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;
                        $controller = new $controllerName();
                        if (method_exists($controller, $actionName)) {
                            $controller->$actionName();
                            return; // Thoát ngay khi route được xử lý
                        } else {
                            http_response_code(404);
                            die("Method $actionName không tồn tại trong controller $controllerName!");
                        }
                    } else {
                        http_response_code(404);
                        die("Controller $controllerName không tồn tại!");
                    }
                }
            }
        }

        // Nếu không có route nào khớp
        http_response_code(404);
        die("Route không tồn tại!");
    }

    private static function matchRoute($uri, $routePath)
    {
        // Logic để so khớp đường dẫn với tham số động (ví dụ: /cart/{userId})
        // Đây là phương thức giả định để bạn xử lý URL với tham số động
        $routePattern = preg_replace('/{[a-zA-Z0-9_]+}/', '([a-zA-Z0-9_]+)', $routePath);
        return preg_match("#^$routePattern$#", $uri);
    }
}
