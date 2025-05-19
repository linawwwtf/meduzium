@extends('layouts.main')

@section('title', 'О нас')

@section('content')
    <div class="main-about">
        <div class="container">
            <div class="main-text">
                <span >—— медузариум</span>
                <h1>О нашем медузариуме</h1>
                <p class="dec-text">Наша цель – предоставить посетителям возможность узнать больше о<br> прекрасных существах океана, насладиться захватывающим опытом и<br> расширить свои знания о морской экосистеме.</p>
            </div>
        </div>
    </div>

    <div class="all-about">
        <div class="about-us">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Наша миссия</h3>
                </div>

                <div class="infographics">
                    <div class="infographic">
                        <img class="info-img" src="{{ asset('img/info1.svg') }}" alt="">
                        <p class="info-text">Вдохновить людей<br> на заботу о<br> морской жизни</p>
                    </div>

                    <div class="infographic">
                        <img class="info-img" src="{{ asset('img/info2.svg') }}" alt="">
                        <p class="info-text">Создать пространство, где<br> каждый может погрузиться<br> в удивительный мир медуз</p>
                    </div>

                    <div class="infographic">
                        <img class="info-img" src="{{ asset('img/info3.svg') }}" alt="">
                        <p class="info-text">Поддерживать охрану<br> океанов и экологические<br> инициативы</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="proposal">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Что мы предлагаем</h3>
                </div>

                <div class="proposal-container">
                    <p class="about-text">
                        <span class="cycle-name">В нашем Медузариуме вы найдете: </span>
                    </p> 
                    <p class="about-us-text">
                        <span class="cycle-name">--- Интерактивные выставки:</span> Узнайте больше о разнообразии медуз и их среде обитания.<br>
                        <span class="cycle-name">--- Образовательные программы:</span> Участвуйте в увлекательных мастер-классах и лекциях для всех возрастов.<br>
                        <span class="cycle-name">--- Специальные мероприятия:</span> Не пропустите наши тематические выставки и встречи с учеными<br> и исследователями.
                    </p>
                </div>
            </div>
        </div>

        <div class="team">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Наша команда</h3>
                </div>

                <div class="team-container">
                    <div class="team-card">
                        <img src="{{ asset('img/team.jpg') }}" alt="" style="border-radius: 20px;">
                        <h4 class="name-team">Анна Яковлева</h4>
                        <p class="team-info">биолог-эколог, изучающая<br> поведение медуз. Она<br> делится своими знаниями и<br> вдохновляет посетителей </p>
                    </div>

                    <div class="team-card">
                        <img src="{{ asset('img/team.jpg') }}" alt="" style="border-radius: 20px;">
                        <h4 class="name-team">Игорь Иванов</h4>
                        <p class="team-info">океанограф, который<br> помогает нам понять<br> влияние изменений<br> климата на экосистему </p>
                    </div>

                    <div class="team-card">
                        <img src="{{ asset('img/team.jpg') }}" alt="" style="border-radius: 20px;">
                        <h4 class="name-team">Мария Климова</h4>
                        <p class="team-info">педагог и организатор<br> мероприятий, создатель<br> образовательных<br> программ </p>
                    </div>

                    <div class="team-card">
                        <img src="{{ asset('img/team.jpg') }}" alt="" style="border-radius: 20px;">
                        <h4 class="name-team">Сергей Нечипоренко</h4>
                        <p class="team-info">координатор волонтеров,<br> составляет команды для<br> мероприятий и акций по<br> сохранению моря </p>
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
                            <h3 class="contact-form-heading">Чтобы задать вопросы, закажите обратный звонок:</h3>
                            <form action="#" method="POST" class="contact-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="name" name="name" class="form-input" placeholder="Ваше имя">
                                </div>
                                <div class="form-group">
                                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="Номер телефона">
                                </div>
                                <div class="form-group">
                                    <textarea id="message" name="message" rows="4" class="form-textarea" placeholder="Сообщение"></textarea>
                                </div> 
                                <div class="btn-form">
                        <div class="btn">
                            <a href="#" class="custom-button">Заказать</a>
                    </div>
                    </div>
                            </form>
                        </div>
                    </div>
                   
                        
                    
                </div>
            </div>
                <div class="map">
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3Aea2305aec80936ecca005ba94f5c4200ab2807b73fa51882cf4d83a6b76a1c10&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
    </div>
        </div>
    </div>
    </div>
@endsection