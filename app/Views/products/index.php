<?php include __DIR__ . '/../header.php'; ?>
<style>
    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product-view {
        display: flex;
        gap: 20px;
    }

    .product-image {
        flex: 1;
    }

    .product-image img {
        max-width: 100%;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .product-details {
        flex: 2;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .product-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .product-price {
        font-size: 28px;
        font-weight: bold;
        color: #ff5722;
    }

    .product-description {
        font-size: 16px;
        color: #555;
        line-height: 1.6;
    }

    .buy-section {
        display: flex;
        gap: 10px;
    }

    .buy-section input {
        width: 60px;
        text-align: center;
        padding: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    .buy-section button {
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        background-color: #ff5722;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .buy-section button:hover {
        background-color: #e64a19;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color: #007bff;
        text-decoration: none;
        font-size: 16px;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>
<div style="min-height: 80vh">
    <div class="container">
        <div class=" product-view">
            <!-- Product Image -->
            <div class="product-image">
                <img src="<?= htmlspecialchars($product->image_url) ?>" alt="<?= htmlspecialchars($product->name) ?>">
            </div>

            <!-- Product Details -->
            <div class="product-details">
                <div class="product-title"><?= htmlspecialchars($product->name) ?></div>
                <div class="product-price"><?= number_format($product->price, 0, ',', '.') ?> VND</div>

                <!-- Buy Section -->
                <div class="buy-section">
                    <form class="add-to-cart-form" method="POST" action="/cart/add" data-product-id="<?php echo $product->id; ?>">
                        <input type="number" name="quantity" value="1" min="1">
                        <input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
                        <button type="submit">Thêm vào giỏ hàng</button>
                    </form>
                </div>
                <div class="product-description"><?= htmlspecialchars($product->description) ?></div>
            </div>
        </div>

        <!-- Back to Home -->
        <a href="/" class="back-link">Quay lại trang chủ</a>
    </div>
</div>


<?php include __DIR__ . '/../footer.php'; ?>