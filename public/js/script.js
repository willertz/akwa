
    console.log('load')
    checkFillCart();

    $('.add-to-cart').click(function() {
        console.log('test')
        var itemId = $(this).attr('data-id');
        var itemName = $(this).attr('data-name');
        var itemPrice = $(this).attr('data-price');

        var cartData = getCartData() || {};
        if(cartData.hasOwnProperty(itemId)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
            cartData[itemId][2] += 1;
        } else { // если товара в корзине еще нет, то добавляем в объект
            cartData[itemId] = [itemName, itemPrice, 1];
        }
        if(!setCartData(cartData)){ // Обновляем данные в LocalStorage
            console.log('add') // разблокируем кнопку после обновления LS
        }


        //А теперь выводим корзину
        console.log(getCartData())

        // Показываем уведомление
        toggleAlert();
        showCartLink();

    });


// Получаем данные из LocalStorage
function getCartData(){
    return JSON.parse(localStorage.getItem('cart'));
}
// Записываем данные в LocalStorage
function setCartData(o){
    localStorage.setItem('cart', JSON.stringify(o));
    return false;
}

function checkFillCart() {
    // Если есть товары в корзине - показываем ссылку на корзину
    if (getCartData()) {
        showCartLink();
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
    var cart = $('.cart-link-wrapper');
    cart.fadeIn();
}

function hideCartLink() {
    var cart = $('.cart-link-wrapper');
    cart.fadeOut();
}