<footer>
    <p>&copy; 2024 ElecS. Tất cả quyền được bảo lưu.</p>
</footer>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện submit của mỗi form
        const forms = document.querySelectorAll('.add-to-cart-form');

        forms.forEach(function(form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Ngừng gửi form mặc định (ngừng chuyển trang)

                // Lấy ID sản phẩm và số lượng từ form
                const productId = form.querySelector('input[name="product_id"]').value;
                const quantity = form.querySelector('input[name="quantity"]').value;

                // Gửi yêu cầu AJAX tới controller
                fetch('/cart/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: new URLSearchParams({
                            product_id: productId,
                            quantity: quantity
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Sản phẩm đã được thêm vào giỏ hàng!');
                        } else {
                            alert('Lỗi khi thêm sản phẩm vào giỏ hàng!');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
</body>

</html>