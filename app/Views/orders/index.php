<?php include '../app/Views/header.php'; ?>
<style>
    /* Global Styles */
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Header */
    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    /* Table */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
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

    /* Buttons */
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
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Hover effect for rows */
    .table tr:hover {
        background-color: #f1f1f1;
    }
</style>
<div style="min-height: 80vh">
    <div class="container">
        <h2>Danh sách đơn hàng</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tên người nhận</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Order ID</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; // Khởi tạo biến index 
                ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo htmlspecialchars($order->name); ?></td>
                        <td><?php echo htmlspecialchars($order->phone); ?></td>
                        <td><?php echo htmlspecialchars($order->address); ?></td>
                        <td><?php echo htmlspecialchars($order->id); ?></td>
                        <td><?php echo htmlspecialchars($order->created_at); ?></td>
                        <td><?php echo htmlspecialchars($order->status); ?></td>
                        <td>
                            <a href="/orders/details?id=<?php echo $order->id; ?>" class="btn btn-primary">Chi tiết</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../app/Views/footer.php'; ?>