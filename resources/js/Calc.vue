<template>
    <div class="container calc-wrapper">
        <div class="calc-top-line" v-if="showTitle">
            <div class="calc-title">
                {{questions[currentQuestion-1].text}}
            </div>
            <div class="calc-number-question">
                Вопрос {{currentQuestion}} из {{allQuestion}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 question-body" v-if="currentQuestion == 1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(1)" v-bind:class="isSelectedImage1(1)">
                                <img class="card-img-top" src="/img/calculate/11.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Кирпичный дом</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(2)" v-bind:class="isSelectedImage1(2)">
                                <img class="card-img-top" src="/img/calculate/12.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Деревянный дом</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(3)" v-bind:class="isSelectedImage1(3)">
                                <img class="card-img-top" src="/img/calculate/13.jpg" style="    height: 244px;">
                                <div class="card-body">
                                    <h5 class="card-title">Дом из газобетона</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(4)" v-bind:class="isSelectedImage1(4)">
                                <img class="card-img-top" src="/img/calculate/14.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Другой</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button v-bind:class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                <span class="number2">
                    {{questions[1].value}}
                </span>
                            <vue-slider v-model="questions[1].value" :dotSize="20" :max="30"/>
                        </div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button v-bind:class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="card card-3" @click="selectImage3(1)" v-bind:class="isSelectedImage3(1)">
                                <img class="card-img-top" src="/img/calculate/31.png">
                                <div class="card-body body-3">
                                    <ul>
                                        <ul>
                                            <li>Настенный двухконтурный котёл</li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-3" @click="selectImage3(2)" v-bind:class="isSelectedImage3(2)">
                                <img class="card-img-top" src="/img/calculate/33.jpg">
                                <div class="card-body body-3">
                                    <ul>
                                        <ul>
                                            <li>Настенный одноконтурный котёл</li>
                                            <li>Бойлер косвенного нагрева 200 л</li>
                                            <li>Cмесительный узел для тёплого пола</li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-3" @click="selectImage3(3)" v-bind:class="isSelectedImage3(3)">
                                <img class="card-img-top" src="/img/calculate/32.jpg">
                                <div class="card-body body-3">
                                    <ul>
                                        <ul>
                                            <li>Напольный чугунный котёл</li>
                                            <li>Бойлер косвенного нагрева 200 л</li>
                                            <li>Полная автоматизация отопления</li>
                                            <li>Управление через интернет</li>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button v-bind:class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 4">
                <div class="container">

                             <span class="number2">
                    {{questions[3].value}}
                </span>
                        <vue-slider v-model="questions[3].value" :dotSize="20"  :min="1" :max="500" style="margin-bottom:20px"/>

                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button v-bind:class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 5">
                <div class="container">
                    <div class="row">
                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(1)" v-bind:class="isSelectedImage5(1)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/51.jpg">
                                <div class="card-body">
                                    <span class="card-title">Полипропилен (Россия)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(2)" v-bind:class="isSelectedImage5(2)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/52.jpg">
                                <div class="card-body">
                                    <span class="card-title">Сшитый полиэтилен STOUT (Испания)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(3)" v-bind:class="isSelectedImage5(3)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/53.jpg">
                                <div class="card-body">
                                    <span class="card-title">Сшитый полиэтилен REHAU/UPONOR (Германия)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button v-bind:class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(1)" v-bind:class="isSelectedImage6(1)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/61.jpg" style="width: 65% !important;
    margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Алюминиевые секционные (Китай)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(2)" v-bind:class="isSelectedImage6(2)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/62.jpg" style="width: 65% !important;
    margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Стальные панельные с нижним подключением PRADO (Россия)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(3)" v-bind:class="isSelectedImage6(3)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/63.jpg" style="width: 65% !important;
    margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Медно-алюминиевые JAGA Strada (Бельгия)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(4)" v-bind:class="isSelectedImage6(4)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/64.jpg" style="width: 65% !important;
    margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Трубчатые стальные (Германия)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button v-bind:class="prevActive" @click="prev()">Назад</button>
                    <button  @click="showForm()">Вперед</button>
                </div>
            </div>


            <div class="question-item2" v-if="ishowForm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">


                            <p class="calc-result-subtitle" style="margin-top: 15px;">Спасибо! Теперь у нас есть вся информация, чтобы рассчитать стоимость отопления для вашего дома. Заполните форму ниже и мы пришлем вам 3 варианта сметы в разных ценовых сегментах!</p>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"  v-model="name" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" v-model="mail" aria-describedby="emailHelp" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3" >Телефон</label>
                                    <input type="email" class="form-control" id="exampleInputEmail3" v-model="phone" aria-describedby="emailHelp" >
                                </div>

                                <button  class="btn btn-primary" @click="send()">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="question-item2" v-if="showThanks">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p style="font-size: 19px;">
                                Заявка успешно отправлена!<br>
                                Мы свяжемся с вами в ближайшее время
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

</template>

<script>
    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/antd.css'
    const axios = require('axios');
    axios.defaults.headers.common = {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')    };

    export default {
        name: "Calc",
        components: {
            VueSlider
        },
        data: function () {
            return {
                ishowForm: false,
                showThanks: false,
                questions: [
                    {
                        text: 'Из какого материала ваш дом?',
                        value: '1'
                    },
                    {
                        text: 'Количество окон',
                        value: 0
                    },
                    {
                        text: 'Утройство котельной',
                        value: '1'
                    },
                    {
                        text: 'Площадь теплых полов (квадратных метров)',
                        value: 0
                    },
                    {
                        text: 'Трубы на отопление и водопровод',
                        value: '1'
                    },
                    {
                        text: 'Отопительные приборы',
                        value: '1'
                    },
                ],
                currentQuestion: 1,
                allQuestion: 6,
                name: " ",
                mail: " ",
                phone: " "
            }
        },
        methods: {
            send: function() {
                axios.post('/api', {
                        apiMethod: 'sendMail',
                        name: this.name,
                        phone: this.phone,
                        mail: this.mail,
                        question1: this.questions[0].value,
                        question2: this.questions[1].value,
                        question3: this.questions[2].value,
                        question4: this.questions[3].value,
                        question5: this.questions[4].value,
                        question6: this.questions[5].value,
                    },
                ).then(response => console.log(success))
                    .catch(function (error) {
                        console.log(error)
                    });

                this.ishowForm = false;
                this.showThanks = true;
            },
            showForm: function() {
                this.currentQuestion = 12;
this.ishowForm = true;
            },
            selectImage6(n) {
                this.questions[5].value = n;
            },
            isSelectedImage6: function (n) {
                if (n == this.questions[5].value) {
                    return 'select-image';
                }
            },
            selectImage5(n) {
                this.questions[4].value = n;
            },
            isSelectedImage5: function (n) {
                if (n == this.questions[4].value) {
                    return 'select-image';
                }
            },
            selectImage3(n) {
                this.questions[2].value = n;
            },
            isSelectedImage3: function (n) {
                if (n == this.questions[2].value) {
                    return 'select-image';
                }
            },
            selectImage1(n) {
                this.questions[0].value = n;
            },
            isSelectedImage1: function (n) {
                if (n == this.questions[0].value) {
                    return 'select-image';
                }
            },
            next: function () {
                if (this.currentQuestion != this.allQuestion) {
                    this.currentQuestion++;
                }
            },
            prev: function () {
                if (this.currentQuestion != 1) {
                    this.currentQuestion--;
                }
            }
        },
        computed: {
            showTitle: function() {
                if(this.ishowForm || this.showThanks) {
                    return false;
                } else {
                    return true;
                }
            },
            prevActive: function () {
                if (this.currentQuestion == 1) {
                    return 'disabled-btn';
                }
            },
            nextActive: function () {
                if (this.currentQuestion == this.allQuestion) {
                    return 'disabled-btn';
                }
            },
        }
    }
</script>

<style scoped>
    .calc-result-title {
        background: #2388d9;
        width: 100%;
        display: block;
        box-sizing: border-box;
        color: #fff;
        font-size: 21px;
        height: 65px;
        font-weight: bold;
        padding: 19px;
        text-align: center;
    }

    .calc-result-subtitle {
        font-size: 19px;
        font-weight: bold;
        color: #3e3e3e;

    }
    .select-image::before {
        content: "\2713";
        position: absolute;
        background: #159815;
        color: #fff;
        width: 30px;
        height: 30px;
        font-weight: 600;
        font-size: 20px;
        line-height: 30px;
        text-align: center;
        border-radius: 50%;
        top: 8px;
        left: 8px;
        z-index: 999;
    }
    .number2 {
        width: 100%;
        padding-top: 20px;
        display: block;
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        margin-bottom: 20px;
    }
    .row {
        margin: 30px auto;
    }

    .calc-wrapper {
        margin: 60px auto;
        background-color: #ffffff;
        border: 5px solid #5ca3ff;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
        padding: 15px;
    }

    .card {
        cursor: pointer;
    }

    .card > img {
        height: auto;
    }

    .card-body {
        height: auto;
    }

    .calc-top-line {
        display: flex;
        justify-content: space-between;
        font-size: 25px;
        font-weight: 600;
        letter-spacing: 1px;
    }

    .calc-button-line {
        width: 100%;
        justify-content: space-between;
        display: flex;
    }

    .calc-button-line button {
        color: #fff;
        background-color: #2388d9;
        font-size: .875rem;
        font-weight: 400;
        letter-spacing: .06px;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 3px;
        text-decoration: none;
        line-height: 1;
        display: inline-block;
        max-width: 100%;
        padding: 22px 37.5px;
        cursor: pointer;
        text-align: center;
        overflow: hidden;
        vertical-align: top;
        white-space: nowrap;
        text-overflow: ellipsis;
        border: 1px solid #2388d9;
        box-shadow: none;
        transition: .3s;
    }

    .calc-button-line button:hover {
        color: #fff;
        background: #000;
    }

    .disabled-btn {
        background-color: #cbcbcb !important;
        cursor: default;
        border: 0 !important;
    }
    .body-3 {
        height: 250px;
        padding: 25px;
    }
    .card-3 img {
        width: 87% !important;
    }
    .body-3 ul {
        padding-left: 3px;
    }
</style>