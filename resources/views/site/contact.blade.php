@extends('layouts.site')

@section('content')
<main>
    <!-- Breadcrumbs -->
    <section class="breadcrumbs">
        <div class="row">
            <ul class="breadcrumbs_links">
                <li><a href="{{ route('showIndexPage') }}">Главная</a></li>
                <li>Контакты</li>
            </ul>
        </div>
    </section>

    <!-- Contacts -->
    <section class="contacts_page">
        <div class="row">
            <h1 class="contacts_page_title">{{ $h1 }}</h1>

            <div class="contacts_blocks_grid">

                <!-- Address -->
                <div class="contacts_card">
                    <div class="contacts_card_icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="#cfa382"/>
                        </svg>
                    </div>
                    <div class="contacts_card_label">Адрес</div>
                    <div class="contacts_card_text">
                        г. Воронеж,<br>
                        п-т Патриотов 49Б/3<br>
                    </div>
                </div>

                <!-- Phone -->
                <div class="contacts_card">
                    <div class="contacts_card_icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="#cfa382"/>
                        </svg>
                    </div>
                    <div class="contacts_card_label">Телефоны</div>
                    <div class="contacts_card_text">
                        <a href="tel:+79036516410" class="contacts_phone">+7 903 651 64 10</a><br>
                        <a href="tel:+79202136645" class="contacts_phone">+7 920 213 66 45</a><br>
                        <a href="https://max.ru/u/f9LHodD0cOLKZUZMQD727b-Pf931b9XauUfO6d1Gn4aufuVdISTzXxKbdA0" class="contacts_email contacts_max">
                            <svg class="max-icon" width="28" height="28" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 720 720"><path fill="#cfa382" d="M350.4,9.6C141.8,20.5,4.1,184.1,12.8,390.4c3.8,90.3,40.1,168,48.7,253.7,2.2,22.2-4.2,49.6,21.4,59.3,31.5,11.9,79.8-8.1,106.2-26.4,9-6.1,17.6-13.2,24.2-22,27.3,18.1,53.2,35.6,85.7,43.4,143.1,34.3,299.9-44.2,369.6-170.3C799.6,291.2,622.5-4.6,350.4,9.6h0ZM269.4,504c-11.3,8.8-22.2,20.8-34.7,27.7-18.1,9.7-23.7-.4-30.5-16.4-21.4-50.9-24-137.6-11.5-190.9,16.8-72.5,72.9-136.3,150-143.1,78-6.9,150.4,32.7,183.1,104.2,72.4,159.1-112.9,316.2-256.4,218.6h0Z"/></svg>

                            Max</a>
                    </div>
                </div>

                <!-- Email -->
                <div class="contacts_card">
                    <div class="contacts_card_icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="#cfa382"/>
                        </svg>
                    </div>
                    <div class="contacts_card_label">Email</div>
                    <div class="contacts_card_text">
                        <a href="mailto:info@akwagarant.ru" class="contacts_email">info@akwagarant.ru</a>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="contacts_card">
                    <div class="contacts_card_icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" fill="#cfa382"/>
                        </svg>
                    </div>
                    <div class="contacts_card_label">График работы</div>
                    <div class="contacts_card_text">
                        <span class="contacts_schedule_row"><span class="contacts_days">пн – пт</span><span class="contacts_hours">10:00 – 20:00</span></span>
                        <span class="contacts_schedule_row"><span class="contacts_days">сб – вс</span><span class="contacts_hours">11:00 – 18:00</span></span>
                    </div>
                </div>

            </div>

            <!-- Map -->
            <div class="contacts_map_full">
                @if(app()->environment('production'))
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A50586e7cba09cfae1a9b567d1b4a82886fc17a59ff70c5d3e8229adfe0c001b5&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
                @else
                <div class="contacts_map_placeholder">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="#cfa382"/>
                    </svg>
                    <p>г. Воронеж,п-т Патриотов 49Б/3</p>
                </div>
                @endif
            </div>

        </div>
    </section>

    <!-- Meeting form -->
    @include('site.partials.meeting_form', ['formId' => 'contactPageMeetingForm'])
</main>
@endsection
