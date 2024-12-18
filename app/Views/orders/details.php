<?php include '../app/Views/header.php'; ?>
<style>
    /* Container */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Tiêu đề chính */
    h2 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    /* Thông tin đơn hàng */
    p {
        font-size: 16px;
        margin: 10px 0;
        line-height: 1.6;
    }

    p strong {
        font-weight: bold;
        color: #333;
    }

    /* Tiêu đề sản phẩm trong đơn hàng */
    h3 {
        font-size: 22px;
        margin-top: 30px;
        font-weight: bold;
        color: #333;
    }

    /* Tiêu đề tổng tiền */
    h4 {
        font-size: 20px;
        margin-top: 20px;
        font-weight: bold;
        color: #007bff;
    }

    /* Table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid #ddd;
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f4f4f4;
        font-weight: bold;
        color: #333;
    }

    .table td {
        background-color: #fff;
    }

    /* Hình ảnh sản phẩm */
    .table img {
        width: 50px;
        height: auto;
        border-radius: 4px;
    }

    /* Hover effect for rows */
    .table tr:hover {
        background-color: #f9f9f9;
    }

    /* Tổng tiền */
    h4 {
        color: #28a745;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }

    /* Các lớp nút */
    .btn {
        display: inline-block;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        margin-top: 20px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2>Chi tiết đơn hàng #<?php echo htmlspecialchars($order->id); ?></h2>
    <p><strong>Tên người nhận:</strong> <?php echo htmlspecialchars($order->name); ?></p>
    <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($order->phone); ?></p>
    <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order->address); ?></p>
    <p><strong>Ngày giao dự kiến:</strong> <?php echo htmlspecialchars($order->delivery_date); ?></p>
    <p><strong>Trạng thái:</strong> <?php echo htmlspecialchars($order->status); ?></p>

    <h3>Sản phẩm trong đơn hàng</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $detail): ?>
                <tr>
                    <td>
                        <img src="<?php echo htmlspecialchars($detail->product_image); ?>" alt="<?php echo htmlspecialchars($detail->product_name); ?>" style="width: 50px;">
                    </td>
                    <td><?php echo htmlspecialchars($detail->product_name); ?></td>
                    <td><?php echo htmlspecialchars($detail->quantity); ?></td>
                    <td><?php echo htmlspecialchars(number_format($detail->price, 2)); ?> VND</td>
                    <td><?php echo htmlspecialchars(number_format($detail->quantity * $detail->price, 2)); ?> VND</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h4>
        Tổng tiền:
        <?php
        $totalAmount = array_reduce($orderDetails, function ($sum, $item) {
            return $sum + ($item->quantity * $item->price);
        }, 0);
        echo htmlspecialchars(number_format($totalAmount, 2)) . " VND";
        ?>
    </h4>
</div>

<?php include '../app/Views/footer.php'; ?>