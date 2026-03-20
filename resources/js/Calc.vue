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
                            <div class="card" @click="selectImage1(1)" :class="isSelectedImage1(1)">
                                <img class="card-img-top" src="/img/calculate/11.jpg">
                                <div class="card-body">
                                    <h5 class="card-title">Кирпичный дом</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(2)" :class="isSelectedImage1(2)">
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
                            <div class="card" @click="selectImage1(3)" :class="isSelectedImage1(3)">
                                <img class="card-img-top" src="/img/calculate/13.jpg" style="height: 244px;">
                                <div class="card-body">
                                    <h5 class="card-title">Дом из газобетона</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card" @click="selectImage1(4)" :class="isSelectedImage1(4)">
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
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button :class="nextActive" @click="next()">Вперед</button>
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
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button :class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                            <div class="card card-3" @click="selectImage3(1)" :class="isSelectedImage3(1)">
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
                            <div class="card card-3" @click="selectImage3(2)" :class="isSelectedImage3(2)">
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
                            <div class="card card-3" @click="selectImage3(3)" :class="isSelectedImage3(3)">
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
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button :class="nextActive" @click="next()">Вперед</button>
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
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button :class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 5">
                <div class="container">
                    <div class="row">
                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(1)" :class="isSelectedImage5(1)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/51.jpg">
                                <div class="card-body">
                                    <span class="card-title">Полипропилен (Россия)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(2)" :class="isSelectedImage5(2)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/52.jpg">
                                <div class="card-body">
                                    <span class="card-title">Сшитый полиэтилен STOUT (Испания)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col" style="margin-top: 10px">
                            <div class="card" @click="selectImage5(3)" :class="isSelectedImage5(3)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/53.jpg">
                                <div class="card-body">
                                    <span class="card-title">Сшитый полиэтилен REHAU/UPONOR (Германия)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button :class="nextActive" @click="next()">Вперед</button>
                </div>
            </div>

            <div class="col-md-12 question-body" v-if="currentQuestion == 6">
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(1)" :class="isSelectedImage6(1)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/61.jpg" style="width: 65% !important; margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Алюминиевые секционные (Китай)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(2)" :class="isSelectedImage6(2)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/62.jpg" style="width: 65% !important; margin: 0 auto;">
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
                            <div class="card" @click="selectImage6(3)" :class="isSelectedImage6(3)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/63.jpg" style="width: 65% !important; margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Медно-алюминиевые JAGA Strada (Бельгия)</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5" style="margin-top: 10px">
                            <div class="card" @click="selectImage6(4)" :class="isSelectedImage6(4)" style="height: 100%;">
                                <img class="card-img-top" src="/img/calculate/64.jpg" style="width: 65% !important; margin: 0 auto;">
                                <div class="card-body">
                                    <span class="card-title">Трубчатые стальные (Германия)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <div class="calc-button-line">
                    <button :class="prevActive" @click="prev()">Назад</button>
                    <button @click="showForm()">Вперед</button>
                </div>
            </div>


            <div class="question-item2" v-if="ishowForm">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">


                            <p class="calc-result-subtitle" style="margin-top: 15px;">Спасибо! Теперь у нас есть вся информация, чтобы рассчитать стоимость отопления для вашего дома. Заполните форму ниже и мы пришлем вам 3 варианта сметы в разных ценовых сегментах!</p>
                            <hr>
                            <form @submit.prevent>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" v-model="name" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" v-model="mail" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3" >Телефон</label>
                                    <input type="text" class="form-control" id="exampleInputEmail3" v-model="phone" >
                                </div>

                                <button class="btn btn-primary" @click="send()">Отправить</button>
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

<script setup>
import { ref, computed } from 'vue';
import VueSlider from 'vue-slider-component';
import 'vue-slider-component/theme/antd.css';
import axios from 'axios';

const ishowForm = ref(false);
const showThanks = ref(false);
const questions = ref([
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
]);
const currentQuestion = ref(1);
const allQuestion = ref(6);
const name = ref(" ");
const mail = ref(" ");
const phone = ref(" ");

const showTitle = computed(() => {
    return !(ishowForm.value || showThanks.value);
});

const prevActive = computed(() => {
    return currentQuestion.value === 1 ? 'disabled-btn' : '';
});

const nextActive = computed(() => {
    return currentQuestion.value === allQuestion.value ? 'disabled-btn' : '';
});

const send = async () => {
    try {
        await axios.post('/api', {
            apiMethod: 'sendMail',
            name: name.value,
            phone: phone.value,
            mail: mail.value,
            question1: questions.value[0].value,
            question2: questions.value[1].value,
            question3: questions.value[2].value,
            question4: questions.value[3].value,
            question5: questions.value[4].value,
            question6: questions.value[5].value,
        });
        ishowForm.value = false;
        showThanks.value = true;
    } catch (error) {
        console.error(error);
    }
};

const showForm = () => {
    currentQuestion.value = 12;
    ishowForm.value = true;
};

const selectImage6 = (n) => {
    questions.value[5].value = n;
};

const isSelectedImage6 = (n) => {
    return n == questions.value[5].value ? 'select-image' : '';
};

const selectImage5 = (n) => {
    questions.value[4].value = n;
};

const isSelectedImage5 = (n) => {
    return n == questions.value[4].value ? 'select-image' : '';
};

const selectImage3 = (n) => {
    questions.value[2].value = n;
};

const isSelectedImage3 = (n) => {
    return n == questions.value[2].value ? 'select-image' : '';
};

const selectImage1 = (n) => {
    questions.value[0].value = n;
};

const isSelectedImage1 = (n) => {
    return n == questions.value[0].value ? 'select-image' : '';
};

const next = () => {
    if (currentQuestion.value != allQuestion.value) {
        currentQuestion.value++;
    }
};

const prev = () => {
    if (currentQuestion.value != 1) {
        currentQuestion.value--;
    }
};
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
