$(document).ready(function() {
    console.log('load')
    checkFillCart();

    // Кнопка "В корзину" — добавляет товар и остаётся на странице
    $('.basket_btn.add-to-cart').click(function(e) {
        e.preventDefault();
        addToCart($(this));
        toggleAlert();
        showCartLink();
        updateCartCount();
    });

    // Кнопка "Заказать товар" — добавляет товар и переходит в корзину
    $('.order_btn.add-to-cart').click(function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        addToCart($(this));
        showCartLink();
        updateCartCount();
        window.location.href = href;
    });

    // Кнопки на других страницах (карточки товаров в списке)
    $(document).on('click', '.add-to-cart:not(.basket_btn):not(.order_btn)', function(e) {
        e.preventDefault();
        e.stopPropagation();
        addToCart($(this));
        toggleAlert();
        showCartLink();
        updateCartCount();
    });
});

function addToCart($el) {
    var itemId = $el.attr('data-id');
    var itemName = $el.attr('data-name');
    var itemPrice = $el.attr('data-price');
    var cartData = getCartData() || {};
    if(cartData.hasOwnProperty(itemId)){
        cartData[itemId][2] += 1;
    } else {
        cartData[itemId] = [itemName, itemPrice, 1];
    }
    setCartData(cartData);
}

// Получаем данные из LocalStorage
function getCartData(){
    return JSON.parse(localStorage.getItem('cart'));
}
// Записываем данные в LocalStorage
function setCartData(o){
    localStorage.setItem('cart', JSON.stringify(o));
}
function checkFillCart() {
    if (getCartData()) {
        showCartLink();
        updateCartCount();
    }
}
function toggleAlert() {
    var alertWindow = $('.notice-add-item-in-cart');
    alertWindow.fadeToggle();
    setTimeout(function() {
        alertWindow.fadeToggle();
    }, 1800)
}
function showCartLink() {
    $('.cart-link-wrapper').fadeIn();
}
function hideCartLink() {
    $('.cart-link-wrapper').fadeOut();
}
function updateCartCount() {
    var cartData = getCartData();
    var count = 0;
    if (cartData) {
        Object.keys(cartData).forEach(function(key) {
            count += cartData[key][2];
        });
    }
    $('.cart-count').text(count);
}
