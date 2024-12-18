<?php include __DIR__ . '/../header.php'; ?>

<style>
    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    input[type="text"]:focus {
        border-color: #007BFF;
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
    }

    button:hover {
        background-color: #0056b3;
    }

    button:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>

<div style="min-height: 80vh">
    <h2 class="pt-4">Thanh toán đơn hàng</h2>
    <form class="mb-4" method="POST" action="/checkout">
        <div>
            <label for="name">Tên người nhận:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div>
            <label for="address">Địa chỉ giao hàng:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div>
            <p><strong>Đơn hàng sẽ được giao trong vòng 3 ngày nữa</strong></p>
        </div>
        <div>
            <button type="submit">Thanh toán</button>
        </div>
    </form>
</div>
<?php include __DIR__ . '/../footer.php'; ?>