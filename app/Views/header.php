<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELECS SHOP</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/icon_favicon_1_32.0Wecxv.png">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
</head>

<body>
    <!-- <h1>Welcome, <?= htmlspecialchars($user['username']) ?>!</h1>
    <a href="/logout">Logout</a> -->
    <div class="fixed">
        <div class="header w-full h-84 bg-shopee text-white flex justify-between items-center padding-header">
            <a class="" href="/">
                <svg height="42" fill="#fff" viewBox=" 0 0 60 60" class="shopee-svg-icon gksnGw aphts1 icon-shopee-logo ">
                    <g fill-rule="evenodd">
                    <img id="logoimage" src="https://lms.hvnh.edu.vn/pluginfile.php/1/core_admin/logo/0x200/1729648583/Logo%20HVNH.png" style="width: 50px; height: 50px;" class="img-fluid" alt="LMS Học viện Ngân hàng"> <p style="padding-bottom: 10px;" >HVNH - ElecS Store</p>
                    </g>
                </svg>
            </a>
            <div class="flex gap-8">
                <a href="/cart" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a href="/info" title="Hồ sơ cá nhân">
                    <?= htmlspecialchars($user['username']) ?>
                    <i class="fas fa-user"></i>
                </a>
                <a href="/orders">Lịch sử</a>
                <a href="/logout">Đăng xuất</a>
            </div>
        </div>
    </div>