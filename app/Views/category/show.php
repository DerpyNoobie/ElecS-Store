<?php include __DIR__ . '/../header.php'; ?>

<div style="min-height: 80vh">
    <h2 class="section-title">Các sản phẩm của <?php echo htmlspecialchars($category->name) ?></h2>
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
<script>
    function showDetail(productId) {
        // Chuyển hướng đến trang chi tiết sản phẩm
        window.location.href = '/product-detail?id=' + productId;
    }
</script>

<?php include __DIR__ . '/../footer.php'; ?>