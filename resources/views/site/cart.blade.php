@extends('layouts.site')

@section('breadcrumbs')
<ul class="old_page">
    <li>
        <a href="{{route('showIndexPage')}}">Главная</a>
    </li>
    <li>
        >
    </li>
    <li>
        <a href="#" class="active">Корзина</a>
    </li>
</ul>
@endsection

@section('content')
<!-- Shop -->
<section class="basket_s">
    <!-- container -->
    <div class="container">
        <!-- section title -->
        <div class="section_title">
            Корзина
        </div>
        <!-- row -->
        <div class="row">
            <!-- Left side -->
            <form class="left_side" id="basket-form">
                <!-- No have product -->
                <div class="non_product" id="non_product" style="display:none;">
                    Невозможно оформить заказ, поскольку корзина пуста
                </div>
                <!-- row -->
                <div class="row" id="basket-items-row">
                    <!-- basket items will be rendered by JS -->
                </div>
                <!-- All of this price -->
                <div class="all_price" id="all_price" style="display:none;">
                    Итого:  <span id="total_price"> 0 ₽</span>
                </div>

                <!-- Delivery -->
                <div class="delivery" id="delivery-block" style="display:none;">
                    <!-- item title -->
                    <div class="title">
                        Способ доставки
                    </div>
                    <!-- row -->
                    <div class="row">
                        <!-- delivery item -->
                        <div class="delivery_item active" id="delivery-courier" data-price="500">
                            <!-- accepted -->
                            <div class="accepted">
                                <svg style="fill: rgb(3, 158, 84); display: block;" version="1.1" class="delivery-checked" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17.837 17.837" xml:space="preserve">
                                    <g>
                                        <path style="fill: #039e54;" d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27
                                            c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0
                                            L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"></path>
                                    </g>
                                </svg>
                            </div>
                            <!-- item img -->
                            <div class="item_img">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 422.518 422.518" xml:space="preserve">
                                    <path d="M422.512,215.424c0-0.079-0.004-0.158-0.005-0.237c-0.116-5.295-4.368-9.514-9.727-9.514h-2.554l-39.443-76.258
                                        c-1.664-3.22-4.983-5.225-8.647-5.226l-67.34-0.014l2.569-20.364c0.733-8.138-1.783-15.822-7.086-21.638
                                        c-5.293-5.804-12.683-9.001-20.81-9.001h-209c-5.255,0-9.719,4.066-10.22,9.308l-2.095,16.778h119.078
                                        c7.732,0,13.836,6.268,13.634,14c-0.203,7.732-6.635,14-14.367,14H126.78c0.007,0.02,0.014,0.04,0.021,0.059H10.163
                                        c-5.468,0-10.017,4.432-10.16,9.9c-0.143,5.468,4.173,9.9,9.641,9.9H164.06c7.168,1.104,12.523,7.303,12.326,14.808
                                        c-0.216,8.242-7.039,14.925-15.267,14.994H54.661c-5.523,0-10.117,4.477-10.262,10c-0.145,5.523,4.215,10,9.738,10h105.204
                                        c7.273,1.013,12.735,7.262,12.537,14.84c-0.217,8.284-7.109,15-15.393,15H35.792v0.011H25.651c-5.523,0-10.117,4.477-10.262,10
                                        c-0.145,5.523,4.214,10,9.738,10h8.752l-3.423,35.818c-0.734,8.137,1.782,15.821,7.086,21.637c5.292,5.805,12.683,9.001,20.81,9.001
                                        h7.55C69.5,333.8,87.3,349.345,109.073,349.345c21.773,0,40.387-15.545,45.06-36.118h94.219c7.618,0,14.83-2.913,20.486-7.682
                                        c5.172,4.964,12.028,7.682,19.514,7.682h1.55c3.597,20.573,21.397,36.118,43.171,36.118c21.773,0,40.387-15.545,45.06-36.118h6.219
                                        c16.201,0,30.569-13.171,32.029-29.36l6.094-67.506c0.008-0.091,0.004-0.181,0.01-0.273c0.01-0.139,0.029-0.275,0.033-0.415
                                        C422.52,215.589,422.512,215.508,422.512,215.424z M109.597,329.345c-13.785,0-24.707-11.214-24.346-24.999
                                        c0.361-13.786,11.87-25.001,25.655-25.001c13.785,0,24.706,11.215,24.345,25.001C134.89,318.131,123.382,329.345,109.597,329.345z
                                         M333.597,329.345c-13.785,0-24.706-11.214-24.346-24.999c0.361-13.786,11.87-25.001,25.655-25.001
                                        c13.785,0,24.707,11.215,24.345,25.001C358.89,318.131,347.382,329.345,333.597,329.345z M396.457,282.588
                                        c-0.52,5.767-5.823,10.639-11.58,10.639h-6.727c-4.454-19.453-21.744-33.882-42.721-33.882c-20.977,0-39.022,14.429-44.494,33.882
                                        h-2.059c-2.542,0-4.81-0.953-6.389-2.685c-1.589-1.742-2.337-4.113-2.106-6.676l12.609-139.691l28.959,0.006l-4.59,50.852
                                        c-0.735,8.137,1.78,15.821,7.083,21.637c5.292,5.806,12.685,9.004,20.813,9.004h56.338L396.457,282.588z">
                                    </path>
                                </svg>
                            </div>
                            <!-- item information -->
                            <div class="item_information">
                                <!-- item title -->
                                <div class="item_title">
                                    Доставка курьером
                                </div>
                                <!-- price -->
                                <div class="price">
                                    500 ₽
                                </div>
                                <!-- item description -->
                                <div class="item_description">
                                    Доставка курьером по Воронежу. C Вами свяжется наш менеджер для подтверждения заказа и согласования времени доставки.
                                </div>
                            </div>
                        </div>
                        <!-- delivery item -->
                        <div class="delivery_item last" id="delivery-pickup" data-price="0">
                            <!-- accepted -->
                            <div class="accepted">
                                <svg style="fill: rgb(3, 158, 84); display: block;" version="1.1" class="delivery-checked" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17.837 17.837" xml:space="preserve">
                                    <g>
                                        <path style="fill: #039e54;" d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27
                                            c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0
                                            L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"></path>
                                    </g>
                                </svg>
                            </div>
                            <!-- item img -->
                            <div class="item_img">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 630 450">
                                    <path d="M512.3,122.9l-18.1-30c-1.6-2.7-4.5-4.3-7.6-4.3h-110c-3.1,0-6,1.6-7.6,4.3l-18.7,31c-0.1,0.1-0.1,0.2-0.1,0.3 c-0.3,0.5-0.5,1-0.7,1.5c-0.1,0.2-0.1,0.4-0.2,0.6c-0.1,0.6-0.2,1.2-0.3,1.8c0,0.1,0,0.2,0,0.3c0,0,0,0,0,0.1v28.4l-50.4-46 l0,0c-7.9-9.5-20.1-14.7-33-13c-20.5,2.5-35,21.2-32.5,41.7l14.3,117.7l-25.1,64.1l-76.6,2.8c-12.2,1.1-21.4,11.6-20.9,23.9 c0.6,12.7,11.3,22.5,24.8,21.9l104.8-4.9l34.7-82.5l62.4,47.8l14.7,75.4c2.9,11.8,14.7,19.4,26.8,17 c12.5-2.5,20.6-14.6,18-27.8l-19.4-92.9L321.4,249l-8.5-70l36.1,31.7v29.4c0,4.9,4,8.9,8.9,8.9h147.4c4.9,0,8.9-4,8.9-8.9 V129.4c0-0.3,0.1-0.6,0.1-0.9C514.2,126.4,513.5,124.5,512.3,122.9z M440.4,106.4h41.1l7.9,13.2h-49V106.4z M381.6,106.4h41.1 v13.2h-49L381.6,106.4z M496.3,231.2H366.8v-16.6l57.5,0.1l2.2,0c11.8-0.2,20.7-9.4,20.5-20.6c-0.2-10.8-8.9-19.5-19.6-19.9 l-59.5-0.1l-1.1-1v-35.7h129.6V231.2z M295.8,93.3c19.5,2.4,37.3-11.4,39.8-30.9c2.4-19.5-11.4-37.3-30.9-39.8 S267.3,34,264.8,53.5C262.4,73,276.3,90.8,295.8,93.3z"></path>
                                </svg>
                            </div>
                            <!-- item information -->
                            <div class="item_information">
                                <!-- item title -->
                                <div class="item_title">
                                    Самовывоз
                                </div>
                                <!-- price -->
                                <div class="price">
                                    бесплатно
                                </div>
                                <!-- item description -->
                                <div class="item_description">
                                    Вы можете забрать заказ в нашем офисе без дополнительной платы за доставку.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- form inputs -->
                    <div class="form_inputs">
                        <!-- Left input -->
                        <div class="left_input">
                            <!-- Item title -->
                            <div class="item_title">
                                Ваши данные
                            </div>
                            <!-- inputs -->
                            <div class="inputs">
                                <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
                                <input type="text" id="cart_name" name="name" placeholder="ФИО *">
                                <div class="cart_field_error" id="cart_name_error" style="display:none; color:#e53935; font-size:13px; margin-top:4px;"></div>
                                <input type="email" id="cart_email" name="email" placeholder="E-mail *">
                                <div class="cart_field_error" id="cart_email_error" style="display:none; color:#e53935; font-size:13px; margin-top:4px;"></div>
                                <input type="tel" id="cart_phone" name="phone" placeholder="Телефон * (например: 9851234567)">
                                <div class="cart_field_error" id="cart_phone_error" style="display:none; color:#e53935; font-size:13px; margin-top:4px;"></div>
                            </div>
                            <!-- checked -->
                            <div class="checked">
                                <input type="checkbox" id="cart_consent" name="check">
                                <div class="description">
                                    Настоящим подтверждаю, что я ознакомлен и согласен с политикой обработки персональных данных.
                                </div>
                            </div>
                            <div id="cart_consent_error" style="display:none; color:#e53935; font-size:13px; margin-top:4px;">Необходимо дать согласие на обработку персональных данных.</div>
                        </div>
                        <!-- Right input -->
                        <div class="right_input">
                            <!-- Item title -->
                            <div class="item_title">
                                Адрес доставки
                            </div>
                            <!-- inputs -->
                            <div class="inputs">
                                <input type="text" id="cart_city" name="city" placeholder="Воронеж (необязательно)">
                                <input type="text" id="cart_address" name="address" placeholder="Адрес (необязательно)">
                                <input type="text" id="cart_note" name="note" placeholder="Примечание (необязательно)">
                            </div>
                        </div>
                    </div>
                    <!-- Button -->
                    <button type="submit" class="send_btn" id="cart_submit_btn" disabled style="opacity:0.5; cursor:not-allowed;">
                        Оформить заказ
                    </button>
                </div>
            </form>
            <!-- Right side -->
            <div class="right_side">
                <!-- title -->
                <div class="title">
                    Доступные способы оплаты:
                </div>
                <!-- description -->
                <div class="description">
                    <span>
                        Наличными или банковской картой в офисе компании
                    </span>
                    при получении после проверки товара. Так же доступен перевод на карту через мобильное приложение.
                </div>
                <!-- img -->
                <img src="/assets/img/payments.png" alt="">
                <!-- description -->
                <div class="description">
                    <span>
                        Если вы воспользуетесь службой доставки. Наличными курьеру при получении, после проверки товара.
                    </span>
                    Так же доступен перевод на карту через мобильное приложение.
                </div>
                <!-- img -->
                <img src="/assets/img/payment.png" alt="">
                <!-- Phone number -->
                <div class="phone_number">
                    Если есть вопросы? Звоните! <br>
                    <a href="tel:+74733003139">+7 473 300-31-39</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site.partials.meeting_form', ['formId' => 'basketMeetingForm'])

<!-- Popup успешного заказа -->
<div id="cart-order-popup" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%,-50%); z-index:9999; background:#fff; border-radius:12px; box-shadow:0 8px 40px rgba(0,0,0,0.18); padding:40px 48px; text-align:center; max-width:420px; width:90%;">
    <div style="font-size:48px; margin-bottom:16px;">✅</div>
    <div style="font-size:20px; font-weight:700; color:#222; margin-bottom:12px;">Ваш заказ принят!</div>
    <div style="font-size:15px; color:#555;">В ближайшее время менеджер свяжется с вами.</div>
    <div style="font-size:13px; color:#aaa; margin-top:16px;">Это окно закроется автоматически через 5 секунд.</div>
</div>
<div id="cart-order-popup-overlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.4); z-index:9998;"></div>

<script>
$(document).ready(function() {
    renderBasket();

    // ==== Валидация и активация кнопки ====
    function getCartPhone() {
        var iti = window.itiInstances && window.itiInstances['#cart_phone'];
        if (iti) return iti.getNumber().trim();
        return $('#cart_phone').val().trim();
    }
    function validateCartForm() {
        var name    = $('#cart_name').val().trim();
        var email   = $('#cart_email').val().trim();
        var phone   = getCartPhone();
        var consent = $('#cart_consent').is(':checked');
        var valid = name.length > 0 && email.length > 0 && phone.length > 0 && consent;
        if (valid) {
            $('#cart_submit_btn').prop('disabled', false).css({'opacity': '1', 'cursor': 'pointer'});
        } else {
            $('#cart_submit_btn').prop('disabled', true).css({'opacity': '0.5', 'cursor': 'not-allowed'});
        }
    }

    $('#cart_name, #cart_email').on('input change keyup', validateCartForm);
    // intlTelInput оборачивает input — слушаем нативное событие
    var cartPhoneEl = document.getElementById('cart_phone');
    if (cartPhoneEl) {
        cartPhoneEl.addEventListener('input', validateCartForm);
        cartPhoneEl.addEventListener('countrychange', validateCartForm);
    }
    $('#cart_consent').on('change', validateCartForm);
    validateCartForm();

    // Валидация при потере фокуса
    $('#cart_name').on('blur', function() {
        if (!$(this).val().trim()) {
            $('#cart_name_error').text('Укажите ваше ФИО.').show();
        } else {
            $('#cart_name_error').hide();
        }
    });
    $('#cart_email').on('blur', function() {
        var val = $(this).val().trim();
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!val) {
            $('#cart_email_error').text('Укажите адрес электронной почты.').show();
        } else if (!re.test(val)) {
            $('#cart_email_error').text('Введите корректный адрес электронной почты.').show();
        } else {
            $('#cart_email_error').hide();
        }
    });
    $('#cart_phone').on('blur', function() {
        if (!getCartPhone()) {
            $('#cart_phone_error').text('Укажите номер телефона.').show();
        } else {
            $('#cart_phone_error').hide();
        }
    });
    $('#cart_consent').on('change', function() {
        if (!$(this).is(':checked')) {
            $('#cart_consent_error').show();
        } else {
            $('#cart_consent_error').hide();
        }
    });

    // Выбор способа доставки
    $('#delivery-courier, #delivery-pickup').click(function() {
        $('#delivery-courier, #delivery-pickup').removeClass('active');
        $(this).addClass('active');
        updateTotal();
    });

    // Изменение количества товара
    $(document).on('click', '.minus', function() {
        var input = $(this).siblings('.number_inp');
        var val = parseInt(input.val());
        if (val > 1) {
            input.val(val - 1);
            updateItemQty(input.closest('.basket_item').data('id'), val - 1);
        }
    });
    $(document).on('click', '.plus', function() {
        var input = $(this).siblings('.number_inp');
        var val = parseInt(input.val());
        input.val(val + 1);
        updateItemQty(input.closest('.basket_item').data('id'), val + 1);
    });
    $(document).on('change', '.number_inp', function() {
        var val = parseInt($(this).val());
        if (val < 1) val = 1;
        $(this).val(val);
        updateItemQty($(this).closest('.basket_item').data('id'), val);
    });

    // Удаление товара
    $(document).on('click', '.delete_btn', function() {
        var id = $(this).closest('.basket_item').data('id');
        var cartData = getCartData() || {};
        delete cartData[id];
        setCartData(Object.keys(cartData).length ? cartData : null);
        renderBasket();
        updateCartCount();
    });

    // Отправка заказа
    $('#basket-form').submit(function(e) {
        e.preventDefault();
        var cartData = getCartData();
        if (!cartData || Object.keys(cartData).length === 0) return;

        // Финальная проверка перед отправкой
        var name    = $('#cart_name').val().trim();
        var email   = $('#cart_email').val().trim();
        var phone   = getCartPhone();
        var consent = $('#cart_consent').is(':checked');
        var hasError = false;

        if (!name) { $('#cart_name_error').text('Укажите ваше ФИО.').show(); hasError = true; } else { $('#cart_name_error').hide(); }
        if (!email) { $('#cart_email_error').text('Укажите адрес электронной почты.').show(); hasError = true; }
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { $('#cart_email_error').text('Введите корректный адрес электронной почты.').show(); hasError = true; }
        else { $('#cart_email_error').hide(); }
        if (!phone) { $('#cart_phone_error').text('Укажите номер телефона.').show(); hasError = true; } else { $('#cart_phone_error').hide(); }
        if (!consent) { $('#cart_consent_error').show(); hasError = true; } else { $('#cart_consent_error').hide(); }
        if (hasError) return;

        var deliveryType = $('#delivery-courier').hasClass('active') ? 'Доставка курьером (500 ₽)' : 'Самовывоз (бесплатно)';
        var items = [];
        Object.keys(cartData).forEach(function(id) {
            items.push({
                id: parseInt(id),
                name: cartData[id][0],
                price: parseFloat(cartData[id][1]),
                count: cartData[id][2]
            });
        });

        $.ajax({
            url: '/api/send-cart',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({
                name: name,
                email: email,
                phone: phone,
                city: $('#cart_city').val(),
                address: $('#cart_address').val(),
                note: $('#cart_note').val(),
                delivery: deliveryType,
                consent: true,
                items: items,
                _token: '{{ csrf_token() }}'
            }),
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            success: function() {
                localStorage.removeItem('cart');
                updateCartCount();
                renderBasket();
                $('#cart_name').val('');
                $('#cart_email').val('');
                $('#cart_phone').val('');
                $('#cart_city').val('');
                $('#cart_address').val('');
                $('#cart_note').val('');
                $('#cart_consent').prop('checked', false);
                validateCartForm();
                var cartPopupTimer = setTimeout(function() {
                    $('#cart-order-popup-overlay, #cart-order-popup').fadeOut();
                }, 5000);
                $('#cart-order-popup-overlay, #cart-order-popup').fadeIn();
                $('#cart-order-popup-overlay').off('click.cartpopup').on('click.cartpopup', function() {
                    clearTimeout(cartPopupTimer);
                    $('#cart-order-popup-overlay, #cart-order-popup').fadeOut();
                });
            },
            error: function() {
                alert('Ошибка при отправке заказа. Попробуйте позже.');
            }
        });
    });
});

function renderBasket() {
    var cartData = getCartData();
    var itemsRow = $('#basket-items-row');
    itemsRow.empty();

    if (!cartData || Object.keys(cartData).length === 0) {
        $('#non_product').show();
        $('#all_price').hide();
        $('#delivery-block').hide();
        return;
    }

    $('#non_product').hide();
    $('#all_price').show();
    $('#delivery-block').show();

    Object.keys(cartData).forEach(function(id) {
        var item = cartData[id];
        var name = item[0];
        var price = parseFloat(item[1]);
        var qty = item[2];
        var html = '<div class="basket_item active" data-id="' + id + '">' +
            '<div class="item_img"><img src="/assets/img/no_product.png" alt=""></div>' +
            '<div class="item_information">' +
            '<div class="item_title">' + name + '</div>' +
            '<div class="input_row">' +
            '<div class="calculate">' +
            '<div class="minus">-</div>' +
            '<input type="number" name="numb" class="number_inp" value="' + qty + '">' +
            '<div class="plus">+</div>' +
            '</div>' +
            '<div class="right_info">' +
            '<div class="price">' + (price * qty).toLocaleString('ru-RU') + ' ₽</div>' +
            '<div class="delete_btn"></div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        itemsRow.append(html);
    });

    updateTotal();
}

function updateTotal() {
    var cartData = getCartData();
    var total = 0;
    if (cartData) {
        Object.keys(cartData).forEach(function(id) {
            total += parseFloat(cartData[id][1]) * cartData[id][2];
        });
    }
    var deliveryPrice = $('#delivery-courier').hasClass('active') ? 500 : 0;
    total += deliveryPrice;
    $('#total_price').text(' ' + total.toLocaleString('ru-RU') + ' ₽');
}

function updateItemQty(id, qty) {
    var cartData = getCartData() || {};
    if (cartData[id]) {
        cartData[id][2] = qty;
        setCartData(cartData);
        // Обновить цену строки
        var price = parseFloat(cartData[id][1]);
        $('[data-id="' + id + '"] .price').text((price * qty).toLocaleString('ru-RU') + ' ₽');
        updateTotal();
        updateCartCount();
    }
}

function getCartData() {
    return JSON.parse(localStorage.getItem('cart'));
}
function setCartData(o) {
    if (o === null) {
        localStorage.removeItem('cart');
    } else {
        localStorage.setItem('cart', JSON.stringify(o));
    }
    return false;
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
    if (count > 0) {
        $('.cart-link-wrapper').fadeIn();
    } else {
        $('.cart-link-wrapper').fadeOut();
    }
}
</script>
@endsection
