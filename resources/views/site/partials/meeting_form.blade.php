<section class="portfolio half">
    <div class="container">
        <form class="free_design" id="{{ $formId ?? 'meetingForm' }}">
            <div class="left_side">
                <div class="item_title">
                    Запишитесь на встречу с нами
                </div>
                <ul class="item_desc">
                    <li>Проработаем для вас стиль интерьера с учетом индивидуальных условий</li>
                    <li>Разработаем планировочное решение с расстановкой мебели</li>
                    <li>Обсудим подробности и возможные особые условия сотрудничества</li>
                </ul>
            </div>
            <div class="right_side">
                <div class="inputs">
                    <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
                    <input type="text" name="name" id="{{ ($formId ?? 'meetingForm') . 'Name' }}" placeholder="Имя">
                    <input id="{{ ($formId ?? 'meetingForm') . 'Phone' }}" type="tel" placeholder="Телефон (например: 9851234567)" />
                </div>
                <a href="#" class="follow_btn" id="{{ ($formId ?? 'meetingForm') . 'Submit' }}">Записаться</a>
                <div class="terms consent_row">
                    <label class="consent_label">
                        <input type="checkbox" id="{{ ($formId ?? 'meetingForm') . 'Consent' }}" class="consent_checkbox">
                        <span>Даю согласие на обработку своих персональных данных в соответствии с <a href="{{ route('showPolicyPage') }}" target="_blank" class="consent_link">политикой конфиденциальности</a>.</span>
                    </label>
                    <div id="{{ ($formId ?? 'meetingForm') . 'ConsentError' }}" class="consent_error" style="display:none;">Необходимо дать согласие на обработку персональных данных</div>
                </div>
                <div id="{{ ($formId ?? 'meetingForm') . 'Message' }}" style="display:none; margin-top:10px; color: #4caf50; font-weight:500;"></div>
            </div>
        </form>
    </div>
</section>
