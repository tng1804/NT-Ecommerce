// Hàm cập nhật tổng giá tiền của sản phẩm khi người dùng thay đổi số lượng
function updateTotalPrice(itemId, newQuantity) {
    var price = parseFloat(document.getElementById('subtotal_' + itemId).innerText) / parseInt(document.getElementById('quantity_' + itemId).value);
    var subtotal = price * newQuantity;
    document.getElementById('subtotal_' + itemId).innerText = subtotal + 'đ';
    updateTotalPriceAll();
}

// Hàm cập nhật tổng giá tiền của toàn bộ giỏ hàng
function updateTotalPriceAll() {
    var totalPrice = 0;
    document.querySelectorAll('[id^="subtotal_"]').forEach(function(subtotalElement) {
        totalPrice += parseFloat(subtotalElement.innerText);
    });
    document.getElementById('total-price').innerText = totalPrice + 'đ';
}
