<?php include '../app/Views/header.php'; ?>

<style>
    /* Global Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #fff;
    }

    thead {
        background-color: #007BFF;
        color: #fff;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        text-transform: uppercase;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .quantity-control input {
        width: 40px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 4px;
        background-color: #f9f9f9;
    }

    .quantity-control .button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        padding: 4px 8px;
        cursor: pointer;
        font-size: 14px;
    }

    .quantity-control .button:hover {
        background-color: #0056b3;
    }

    .btn-remove {
        background-color: #dc3545;
        color: #fff;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-remove:hover {
        background-color: #b02a37;
    }

    img {
        border-radius: 4px;
    }

    .total-amount {
        text-align: right;
        margin-top: 10px;
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .checkout-btn {
        text-align: right;
        margin-top: 20px;
    }

    .checkout-btn .btn {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    .checkout-btn .btn:hover {
        background-color: #218838;
    }
</style>
<div style="min-height: 80vh">
    <div class="container">

        <h2 style="text-align: center; margin-top:30px">Giỏ hàng</h2>

        <?php if ($user): ?>
            <div class="message message-welcome">
                <p>Xin chào, <?= htmlspecialchars($user['username']) ?>!</p>
            </div>
        <?php else: ?>
            <div class="message message-login">
                <p>Vui lòng đăng nhập để tiếp tục mua sắm.</p>
            </div>
        <?php endif; ?>

        <div class="cart-container">
            <?php if (!empty($cart)): ?>
                <form action="/cart/update" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cart as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                                    <td>
                                        <img src="<?php echo htmlspecialchars($item['image_url']); ?>"
                                            alt="<?php echo htmlspecialchars($item['name']); ?>"
                                            width="50">
                                    </td>
                                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                                    <td>
                                        <div class="quantity-control">
                                            <button class="btn" type="submit" name="update" value="decrease-<?php echo $item['id']; ?>" class="btn-minus">-</button>
                                            <input type="text" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" readonly>
                                            <button class="btn" type=" submit" name="update" value="increase-<?php echo $item['id']; ?>" class="btn-plus">+</button>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VND</td>
                                    <td>
                                        <button type="submit" name="remove" value="<?php echo $item['id']; ?>" class="btn-remove">Xóa</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="total-amount">
                        <h3>Tổng số tiền: <?php echo number_format($totalAmount, 0, ',', '.'); ?> VND</h3>
                    </div>
                </form>

                <div class="checkout-btn">
                    <form action="/checkout-view" method="GET">
                        <button type="submit" class="btn">Thanh toán</button>
                    </form>
                </div>
            <?php else: ?>
                <div class="message message-cart-empty">
                    <p>Giỏ hàng của bạn đang trống!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include '../app/Views/footer.php'; ?>