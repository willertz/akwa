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
                <table class="table" v-if="items">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Удалить</th>
                        <th scope="col">Название</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in items">
                        <td> <i class="material-icons" style="cursor: pointer" @click="deleteItem(item.id)">
                            clear
                        </i></td>
                        <td>{{item.name}}</td>
                        <td><number-input inline controls v-model="item.count" :min="1"></number-input></td>
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

                    <button v-on:submit.prevent class="btn btn-primary" @click="sendCart()">Отправить заказ менеджеру</button>
            </div>
        </div>
    </div>
</template>

<script>
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };

    export default {
        name: "Cart",
        computed: {
          sum: function() {
              var sum = 0;
              var items = this.items;
              for(var i = 0; i < items.length; i++) {
                  sum += items[i].count * items[i].price
              }
              return (parseInt(sum * 100)) / 100
          }
        },
        mounted: function() {
          var data = this.getCartData();
          var keys = [];
          for(var el in data) {
              console.log(data[el])
              this.items.push(
                  {
                      id: el,
                      name: data[el][0],
                      price: data[el][1],
                      count: data[el][2]
                  }
              )
          }

        },
        data: function() {
            return {
                items: [],
                name: "",
                phone: "",
                mail: "",
            }
        },
        methods: {
            deleteItem: function(id) {
                var cartData = getCartData() || {};
                if(cartData.hasOwnProperty(id)){ // если такой товар уже в корзине, то добавляем +1 к его количеству
                    delete cartData[id];
                    if(!setCartData(cartData)){
                        var i = 0;
                        for(var el in cartData) {
                            i++;
                        }
                        if(i == 0) {
                            localStorage.clear()
                        }


                    }
                }
                location.reload();
            },
            getFloorNumber: function(n) {
                return (parseInt(n * 100)) / 100
            },
            getCartData: function() {
                return JSON.parse(localStorage.getItem('cart'));
            },
            sendCart: function() {
                axios.post('/api', {
                        apiMethod: 'sendCart',
                        name: this.name,
                        phone: this.phone,
                        mail: this.mail,
                        items: this.items
                    },
                )
                    .then(function (response) {
                        console.log(response)
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
                localStorage.clear()
                setTimeout( 'location="/thanks";', 0 );
            },
        }
    }
</script>

<style scoped>

</style>