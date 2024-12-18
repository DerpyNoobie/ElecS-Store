<?php include 'header.php'; ?>
<div class="swiper container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="https://cf.shopee.vn/file/sg-11134258-7rfey-m3n44wewgqqf78_xxhdpi" alt="Promotion 1">
        </div>
        <div class="swiper-slide">
            <img src="https://cf.shopee.vn/file/sg-11134258-7rfey-m3n44rux4qn983_xxhdpi" alt="Promotion 2">
        </div>
        <div class="swiper-slide">
            <img src="https://cf.shopee.vn/file/sg-11134258-7rfg2-m3ltquoff8px11_xxhdpi" alt="Promotion 3">
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
<div class="p-4" style="background: url('https://down-vn.img.susercontent.com/file/vn-11134258-7ras8-m3ahvxp9g7vw92') center top / 100% no-repeat; min-width: 1200px; padding-bottom: 0px; margin: 0px auto 4.375rem;">
    <h2 class="section-title">Danh mục sản phẩm</h2>
    <div class="product-list flex gap-4 flex-wrap container">
        <?php foreach ($categories as $category): ?>
            <?php if ($category->count > 0): // Kiểm tra count > 0 
            ?>
                <a href="/category?id=<?php echo $category->id; ?>" class="category-card text-shopee">
                    <i class="fas fa-folder-open"></i>
                    <h3><?php echo htmlspecialchars($category->name); ?></h3>
                    <p><?php echo htmlspecialchars($category->count); ?> sản phẩm</p>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <h2 class="section-title">Sản phẩm nổi bật</h2>
    <div class="products-grid">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <!-- Hình ảnh sản phẩm -->
                <img onclick=" showDetail(<?php echo $product->id ?>)" src="<?php echo htmlspecialchars($product->image_url); ?>" alt="<?php echo htmlspecialchars($product->name); ?>" class="product-image" style="height: 170px">

                <!-- Tên sản phẩm -->
                <h3 onclick="showDetail(<?php echo $product->id ?>)"><?php echo htmlspecialchars($product->name); ?></h3>


                <!-- Đánh giá sản phẩm -->
                <div class="product-rating" onclick="showDetail(<?php echo $product->id ?>)">
                    <?php
                    // Lấy điểm đánh giá trung bình, mặc định là 0 nếu không có đánh giá
                    $rating = isset($product->rating) ? round($product->rating) : 0;

                    // Hiển thị sao đánh giá
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="fas fa-star"></i>';  // Sao vàng (được đánh giá)
                        } else {
                            echo '<i class="far fa-star"></i>';  // Sao xám (chưa đánh giá)
                        }
                    }
                    ?>
                </div>

                <!-- Giá sản phẩm -->
                <p class="price" onclick="showDetail(<?php echo $product->id ?>)"><?php echo number_format($product->price, 0, ',', '.'); ?> VNĐ</p>
                <!-- Nút thêm vào giỏ -->
                <form class="add-to-cart-form" method="POST" action="/cart/add" data-product-id="<?php echo $product->id; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                    <div style="padding-left: 15px; padding-bottom: 15px;">Số lượng <input type="number" name="quantity" value="1" min="1"></div>
                    <button type="submit" class="add-to-cart-btn">Thêm vào giỏ hàng</button>
                </form>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    function showDetail(productId) {
        // Chuyển hướng đến trang chi tiết sản phẩm
        window.location.href = '/product-detail?id=' + productId;
    }
</script>

<?php include 'footer.php'; ?>