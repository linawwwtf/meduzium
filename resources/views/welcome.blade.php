@extends('layouts.main')

@section('title', 'Главная')

@section('content')

    <div class="main">
        <div class="container">
            <div class="main-text">
                <span>—— медузариум</span>
                <h1>МЕДУЗИУМ</h1>
                <p class="dec-text">Познакомьтесь с единственной в России <br> коллекцией редких медуз</p>
            </div>
            <div class="btn">
                <a href="/about" class="custom-button">Узнать больше</a>
            </div>
        </div>
    </div>

    <div class="all">
        <div class="about">
            <div class="container">
                <div class="underline">
                    <h3 class="title">О медузариуме</h3>
                </div>
                <p class="about-text">Медузиум - это единственный проект в России с уникальной коллекцией различных
                    видов <br>
                    медуз, который покажет вам разнообразие морского мира.
                </p> <br>
                <p class="about-text">Благодаря современному оборудованию и особому освещению, вы получаете полную
                    иллюзию <br> погружения в глубины океана.
                </p> <br>
                <p class="about-text">Приходите, и вы узнаете, сколько известных человечеству видов медуз живет в
                    океане, какие из них <br> смертельно ядовитые, а какая медуза вообще единственное бессмертное
                    существо на планете.</p>
            </div>
        </div>


        <div class="events">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Мероприятия</h3>
                </div>

                @if($events->count() > 0)
                    <div class="events-container">
                        @foreach($events as $event)
                            <div class="event-card">
                                <h4 class="name-event">{{ $event->title }}</h4>
                                <p class="data-event">
                                    {{ $event->type === 'exhibition' ? 'Выставка' : ($event->type === 'masterclass' ? 'Мастер-класс' : 'Лекция') }}
                                    <br>
                                    @if($event->end_date)
                                        {{ $event->start_date->format('d.m H:i') }}
                                        - {{ $event->end_date->format('d.m H:i') }}
                                    @else
                                        {{ $event->start_date->format('d.m.Y в H:i') }}
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="no-events">Скоро будут новые мероприятия</p>
                @endif
            </div>

            <div class="gallery">
                <div class="container">
                    <div class="underline">
                        <h3 class="title">Галерея</h3>
                    </div>
                </div>
                <ul class="images-grid">
                    <li>
                        <div class="image-wrapper">
                            <img class="preview" src="{{ asset($gallery[0]->image_url) }}" alt="Галлерея1">
                        </div>
                    </li>
                    <li>
                        <div class="image-wrapper">
                            <img class="preview" src="{{ asset($gallery[1]->image_url) }}" alt="Галлерея2">
                        </div>
                    </li>
                    <li>
                        <div class="image-wrapper">
                            <img class="preview" src="{{ asset($gallery[4]->image_url) }}" alt="Галлерея3">
                        </div>
                    </li>
                    <li>
                        <div class="image-wrapper">
                            <img class="preview" src="{{ asset($gallery[2]->image_url) }}" alt="Галлерея4">
                        </div>
                    </li>
                    <li>
                        <div class="image-wrapper">
                            <img class="preview" src="{{ asset($gallery[3]->image_url) }}" alt="Галлерея5">
                        </div>
                    </li>
                </ul>
            </div>

            <div class="prices">
                <div class="container">
                    <div class="underline">
                        <h3 class="title">Цены</h3>
                    </div>

                    <div class="price">
                        <div class="price-container">
                            <table>
                                <tr>
                                    <th></th>
                                    <th>Пн. - Чт.</th>
                                    <th>Пт. - Вс. <br> <span class="highlight">Праздники, выходные</span></th>
                                </tr>
                                <tr>
                                    <td>Детский билет (от 3 до 12 лет)</td>
                                    <td>650 Руб./чел.</td>
                                    <td>850 Руб./чел.</td>
                                </tr>
                                <tr>
                                    <td>Взрослый билет</td>
                                    <td>950 Руб./чел.</td>
                                    <td>1100 Руб./чел.</td>
                                </tr>
                            </table>
                        </div>
                        <div class="btn">
                            <a href="/buy-ticket" class="custom-button">Купить билет</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="contacts">
                <div class="container">
                    <div class="underline" id="contact">
                        <h3 class="title">Контакты</h3>
                    </div>
                    <div class="contact">
                        <div class="contacts-container">

                            <div class="contact-info">
                                <div class="contact-info-item">
                                    <h3 class="contact-info-title">Адрес:</h3>
                                    <p class="contact-info-text">г. Набережные Челны <br> пр. Мира, 24А</p>
                                </div>
                                <div class="contact-info-item">
                                    <h3 class="contact-info-title">Телефон:</h3>
                                    <p class="contact-info-text">8 (999) 999-99-99</p>
                                </div>
                                <div class="contact-info-item">
                                    <h3 class="contact-info-title">Email:</h3>
                                    <p class="contact-info-text">meduzium@mail.ru</p>
                                </div>
                            </div>

                            <div class="contact-form-container">
                                <h3 class="contact-form-heading">Чтобы задать вопросы, закажите обратный
                                    звонок:</h3>
                                <form action="{{ route('contact.main-page') }}" method="POST" class="contact-form">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-input"
                                               placeholder="Ваше имя">
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" id="phone" name="phone" class="form-input"
                                               placeholder="Номер телефона">
                                    </div>
                                    <div class="form-group">
                                            <textarea id="message" name="message" rows="4" class="form-textarea"
                                                      placeholder="Сообщение"></textarea>
                                    </div>

                                    <div class="btn-form">
                                        <div class="btn">
                                            <button type="button" id="submit-contact" class="custom-button">Заказать</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const submitBtn = document.getElementById("submit-contact");
            const form = document.querySelector(".contact-form");

            if (submitBtn && form) {
                submitBtn.addEventListener("click", function () {
                    form.submit();
                });
            }
        });
    </script>
@endsection
