<template>
    <div class="container">
        <!-- section title -->
        <div class="section_title">
            Корзина
        </div>
        <!-- row -->
        <div class="row" v-if="items.length > 0">
            <!-- Left side -->
            <div class="left_side">
                <!-- row -->
                <div class="row none">
                    <!-- basket item -->
                    <div class="basket_item active" v-for="item in items" :key="item.id">
                        <div class="item_img">
                            <img src="/img/shop.jpg" alt="">
                        </div>
                        <!-- item information -->
                        <div class="item_information">
                            <!-- item title -->
                            <a href="#" class="item_title">
                                {{item.name}}
                            </a>
                            <!-- item inputs and plus -->
                            <div class="input_row">
                                <!-- calculate -->
                                <div class="calculate">
                                    <!-- minus -->
                                    <div class="minus" @click="minusItem(item)">
                                        -
                                    </div>
                                    <input type="number" name="numb" class="number_inp" v-model="item.count" :min="1">
                                    <!-- Plus -->
                                    <div class="plus" @click="plusItem(item)">
                                        +
                                    </div>
                                </div>
                                <!-- heart -->
                                <div class="right_info">
                                    <!-- Price -->
                                    <div class="price">
                                        {{getFloorNumber(item.price * item.count)}} ₽
                                    </div>
                                    <!-- delete btn -->
                                    <div class="delete_btn" @click="deleteItem(item.id)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All of this price -->
                <div class="all_price active">
                    Итого:<span> {{sum}} ₽</span>
                </div>
                <!-- form inputs -->
                <div class="form_inputs">
                    <!-- Left input -->
                    <div class="left_input">
                        <!-- title -->
                        <div class="title">
                            Данные покупателя
                        </div>
                        <!-- inputs -->
                        <div class="inputs">
                            <input type="text" placeholder="ФИО" v-model="name">
                            <input type="text" placeholder="E-mail" v-model="mail">
                            <input type="text" placeholder="Телефон" v-model="phone">
                            <!-- check -->
                            <div class="check">
                                <input type="checkbox" checked>
                                <span>Я даю согласие на обработку персональных данных</span>
                            </div>
                        </div>
                    </div>
                    <!-- Right input -->
                    <div class="right_input">
                        <!-- title -->
                        <div class="title">
                            Доставка
                        </div>
                        <!-- inputs -->
                        <div class="inputs">
                            <input type="text" placeholder="Город" v-model="city">
                            <input type="text" placeholder="Адрес" v-model="address">
                            <input type="text" placeholder="Примечание" v-model="note">
                        </div>
                    </div>
                </div>
                <!-- order btn -->
                <div class="order_buttons">
                    <button class="order_btn" @click="sendCart()">Оформить заказ</button>
                    <a href="/shop" class="basket_btn">Продолжить покупки</a>
                </div>
            </div>
        </div>
        <div v-else class="non_product" style="display: block;">
            Невозможно оформить заказ, поскольку корзина пуста
        </div>
    </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import axios from 'axios';

const items = ref([]);
const name = ref("");
const phone = ref("");
const mail = ref("");
const city = ref("Воронеж");
const address = ref("");
const note = ref("");

const sum = computed(() => {
    let s = 0;
    for (let i = 0; i < items.value.length; i++) {
        s += items.value[i].count * items.value[i].price;
    }
    return Math.floor(s * 100) / 100;
});

const getCartData = () => {
    try {
        return JSON.parse(localStorage.getItem('cart')) || {};
    } catch (e) {
        return {};
    }
};

onMounted(() => {
    const data = getCartData();
    for (let el in data) {
        items.value.push({
            id: el,
            name: data[el][0],
            price: data[el][1],
            count: data[el][2]
        });
    }
});

const getFloorNumber = (n) => {
    return Math.floor(n * 100) / 100;
};

const plusItem = (item) => {
    item.count++;
    updateLocalStorage();
};

const minusItem = (item) => {
    if (item.count > 1) {
        item.count--;
        updateLocalStorage();
    }
};

const updateLocalStorage = () => {
    const cartData = {};
    items.value.forEach(item => {
        cartData[item.id] = [item.name, item.price, item.count];
    });
    localStorage.setItem('cart', JSON.stringify(cartData));
};

const deleteItem = (id) => {
    const cartData = getCartData();
    if (cartData.hasOwnProperty(id)) {
        delete cartData[id];
        localStorage.setItem('cart', JSON.stringify(cartData));
        if (Object.keys(cartData).length === 0) {
            localStorage.clear();
        }
    }
    location.reload();
};

const sendCart = () => {
    axios.post('/api', {
        apiMethod: 'sendCart',
        name: name.value,
        phone: phone.value,
        mail: mail.value,
        city: city.value,
        address: address.value,
        note: note.value,
        items: items.value
    })
    .then(response => {
        console.log(response);
        localStorage.clear();
        location.href = "/thanks";
    })
    .catch(error => {
        console.log(error);
    });
};
</script>

<style scoped>

</style>
