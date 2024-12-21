<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/icon_favicon_1_32.0Wecxv.png">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>

    <nav class="container h-84 flex items-center">
        <div class="">
            <div class="flex gap-4 intems-center">
                <a class="" href="/">
                <svg height="42" fill="#fff" viewBox=" 0 0 60 60" class="shopee-svg-icon gksnGw aphts1 icon-shopee-logo ">
                    <g fill-rule="evenodd">
                    <img id="logoimage" src="https://lms.hvnh.edu.vn/pluginfile.php/1/core_admin/logo/0x200/1729648583/Logo%20HVNH.png" style="width: 50px; height: 50px;" class="img-fluid" alt="LMS Học viện Ngân hàng"> <p style="padding-bottom: 10px;" >HVNH - ElecS Store</p>
                    </g>
                </svg>
                </a>
                <div class="text-24 lead-52">Đăng nhập</div>
            </div>
        </div>
    </nav>
    <div class="flex justify-center h-full w-full padding-100">
        <form method="POST" action="/login" class="flex flex-col gap-30 border w-400 h-400 bg-white padding-30 width-340">
            <h1 class="text-center">ĐĂNG NHẬP</h1>
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>
            <input class="h-40 w-full font-14 p-4" type="text" name="username" required placeholder="Tên Đăng Nhập">
            <input class="h-40 w-full font-14 p-4" type="password" name="password" required placeholder="Mật Khẩu">
            <button class="h-40 w-full bg-shopee text-white font-14 border-none" type="submit">ĐĂNG NHẬP</button>
            <div class="text-gray-200">Bạn mới biết đến App? <a class="" href="/register">Đăng ký</a></div>
        </form>
    </div>
</body>

</html>