<template>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-md-12" style="text-align: center">
                <div class="alert alert-primary" role="alert">
                    Если для товара указана цена 0 - стоимость необходимо уточнять у менеджера.
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table class="table" v-if="items.length > 0">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Удалить</th>
                        <th scope="col">Название</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in items" :key="item.id">
                        <td> <i class="material-icons" style="cursor: pointer" @click="deleteItem(item.id)">
                            clear
                        </i></td>
                        <td>{{item.name}}</td>
                        <td><VueNumberInput inline controls v-model="item.count" :min="1"></VueNumberInput></td>
                        <td>{{getFloorNumber(item.price)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>


            <div class="col-md-6">
                <h3><b>Общая сумма заказа:</b></h3>
                <h4>{{sum}} руб.</h4>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  id="exampleInputEmail1" placeholder="Введите email" v-model="mail">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPHONE">Телефон</label>
                        <input type="email" class="form-control" id="exampleInputPHONE" placeholder="Введите телефон" v-model="phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFIO">Фио</label>
                        <input type="email" class="form-control" id="exampleInputFIO"  placeholder="Введите ФИО" v-model="name">
                    </div>

                    <button type="button" class="btn btn-primary" @click="sendCart()">Отправить заказ менеджеру</button>
            </div>
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
