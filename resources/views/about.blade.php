@extends('layouts.main')

@section('title', 'О нас')

@section('content')
    <div class="main-about">
        <div class="container">
            <div class="main-text">
                <span style="margin-top: 30%;">—— медузариум</span>
                <h1 style="margin-bottom: 10%; ">О нашем медузариуме</h1>
                <p class="dec-text" >Основанный в 2018 году, "Медузиум" стал первым в России специализированным центром, полностью посвященным изучению и демонстрации медуз. Наша цель – предоставить посетителям возможность узнать больше о прекрасных существах океана, насладиться захватывающим опытом и расширить свои знания о морской экосистеме через интерактивные технологии и живые экспозиции.</p>
            </div>
        </div>
    </div>

    <div class="all-about">
        <div class="about-us">
            <div class="container">
                 <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Наша миссия</h2>
                <div class="section-header__divider"></div>
            </div>

                <div class="mission-grid">
                    <div class="mission-card" data-aos="fade-up">
                        <div class="mission-icon">
                            <svg class="pulse-icon" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="40" fill="none" stroke="#4fc3f7" stroke-width="8"/>
                                <path d="M30,50 Q50,30 70,50 Q50,70 30,50" fill="#4fc3f7"/>
                            </svg>
                        </div>
                        <p class="mission-text">Вдохновить людей на заботу о морской жизни</p>
                    </div>

                    <div class="mission-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="mission-icon">
                            <svg class="float-icon" viewBox="0 0 100 100">
                                <path d="M20,60 Q50,20 80,60 L50,80 Z" fill="#26c6da"/>
                            </svg>
                        </div>
                        <p class="mission-text">Создать пространство для погружения в мир медуз</p>
                    </div>

                    <div class="mission-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="mission-icon">
                            <svg class="spin-icon" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="30" fill="none" stroke="#7e57c2" stroke-width="8" stroke-dasharray="15,10"/>
                            </svg>
                        </div>
                        <p class="mission-text">Поддерживать охрану океанов и экологические инициативы</p>
                    </div>
                </div>
            </div>
        </div>

       <div class="offer-tabs">
    <div class="tab-buttons">
        <button class="tab-button active" data-tab="exhibitions">Выставки</button>
        <button class="tab-button" data-tab="education">Образование</button>
        <button class="tab-button" data-tab="events">Мероприятия</button>
    </div>

    <div class="tab-content active" id="exhibitions">
        <div class="offer-card">
            <h4>Интерактивные выставки</h4>
            <p>40+ видов медуз со всего мира в специальных аквариумах с круговым течением. VR-зона погружения и тактильный бассейн.</p>
            
            <div class="btn-center">
                <button class="offer-more" data-target="expand-exhibitions">Подробнее →</button>
            </div>
            <div class="offer-details" id="expand-exhibitions">
                <p>Наши выставки — это погружение в подводный мир через визуальные, звуковые и тактильные эффекты. Более 40 видов медуз из разных уголков планеты обитают в инновационных аквариумах с круговым течением, имитирующим естественную среду. VR-зона позволяет "нырнуть" в глубины океана, а в тактильном бассейне можно безопасно прикоснуться к морским обитателям.</p>
            </div>
        </div>
    </div>

    <div class="tab-content" id="education">
        <div class="offer-card">
            <h4>Образовательные программы</h4>
            <p>Квесты для детей, научные мастер-классы по микроскопии, курсы для педагогов и лекторий с ведущими океанологами.</p>
            <div class="btn-center">
<button class="offer-more" data-target="expand-education">Подробнее →</button>
            </div>
            <div class="offer-details" id="expand-education">
                <p>Образовательные инициативы центра направлены на популяризацию науки и экологии. Для детей — увлекательные квесты и научные шоу. Для подростков и взрослых — мастер-классы по микроскопии, биологии морских организмов и программам устойчивого развития. Также мы проводим курсы повышения квалификации для педагогов и лектории с участием ученых из ведущих институтов страны.</p>
            </div>
        </div>
    </div>

    <div class="tab-content" id="events">
        <div class="offer-card">
            <h4>Специальные мероприятия</h4>
            <p>Ночные светящиеся экскурсии, фестиваль "День медузы", программы для людей с ОВЗ и корпоративные воркшопы.</p>
            <div class="btn-center">
                <button class="offer-more" data-target="expand-events">Подробнее →</button>
            </div>
            <div class="offer-details" id="expand-events">
                <p>Мы организуем тематические события для всех возрастов и интересов. Посетите ночные экскурсии, где медузы светятся в темноте под сопровождение музыки. Участвуйте в ежегодном фестивале «День медузы» с мастер-классами, уличным театром и фуд-кортами. Для людей с ОВЗ предусмотрены адаптированные маршруты и сопровождение. А корпоративные клиенты могут заказать специальные воркшопы по командообразованию в морской атмосфере.</p>
            </div>
        </div>
    </div>
</div>



        <div class="team">
            <div class="container">
                 <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Наша команда</h2>
                <div class="section-header__divider"></div>
                </div>

                <div class="team-container">
                    <div class="team-card">
                        <div class="card-inner">
                            <div class="card-front">
                                <img src="{{ asset('img/1team.jpg') }}" alt="">
                                <h4 class="name-team">Анна Яковлева</h4>
                                <p class="team-info">Биолог-эколог</p>
                            </div>
                            <div class="card-back">
                                <h4>Анна Яковлева</h4>
                                <p>Изучает поведение медуз, проводит научные экскурсии и ведёт блог о морской биологии.</p>
                                <p><strong>Интересный факт:</strong> ныряет без акваланга до 20 метров!</p>
                            </div>
                        </div>
                    </div>


                    <!-- Игорь Иванов -->
<div class="team-card">
    <div class="card-inner">
        <div class="card-front">
            <img src="{{ asset('img/2team.webp') }}" alt="">
            <h4 class="name-team">Игорь Иванов</h4>
            <p class="team-info">Океанограф</p>
        </div>
        <div class="card-back">
            <h4>Игорь Иванов</h4>
            <p>Изучает влияние изменения климата на морские экосистемы. Консультирует по устойчивому развитию и экотуризму.</p>
            <p><strong>Интересный факт:</strong> участвовал в экспедиции в Арктику в 2022 году.</p>
        </div>
    </div>
</div>

<!-- Мария Климова -->
<div class="team-card">
    <div class="card-inner">
        <div class="card-front">
            <img src="{{ asset('img/3team.jpg') }}" alt="">
            <h4 class="name-team">Мария Климова</h4>
            <p class="team-info">Педагог и организатор</p>
        </div>
        <div class="card-back">
            <h4>Мария Климова</h4>
            <p>Создаёт образовательные программы и мероприятия для всех возрастов. Автор курсов по экопросвещению для школьников.</p>
            <p><strong>Интересный факт:</strong> ранее работала в зоопарке куратором морских обитателей.</p>
        </div>
    </div>
</div>

<!-- Сергей Нечипоренко -->
<div class="team-card">
    <div class="card-inner">
        <div class="card-front">
            <img src="{{ asset('img/4team.webp') }}" alt="">
            <h4 class="name-team">Сергей Петров</h4>
            <p class="team-info">Координатор волонтёров</p>
        </div>
        <div class="card-back">
            <h4>Сергей Петров</h4>
            <p>Формирует волонтёрские команды для мероприятий, акций и экологических рейдов. Помогает новеньким найти своё место в команде.</p>
            <p><strong>Интересный факт:</strong> организовал более 80 волонтёрских выездов за год.</p>
        </div>
    </div>
</div>



                </div>
            </div>
        </div>


        <div class="contacts" id="contact">
        <div class="container">
             <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Контакты</h2>
                <div class="section-header__divider"></div>
            </div>
            <div class="contact">
                    <div class="contacts-container">

                        <div class="contact-info">
    <div class="contact-info-item">
        <i class="fas fa-map-marker-alt contact-icon"></i>
        <div>
            <h3 class="contact-info-title">Адрес:</h3>
            <p class="contact-info-text">г. Набережные Челны, Республика Татарстан <br>
        улица Николая Иванцова, 1Г</p>
        </div>
    </div>
    <div class="contact-info-item">
        <i class="fas fa-phone contact-icon"></i>
        <div>
            <h3 class="contact-info-title">Телефон:</h3>
            <p class="contact-info-text">8 (960) 729-30-99</p>
        </div>
    </div>
    <div class="contact-info-item">
        <i class="fas fa-envelope contact-icon"></i>
        <div>
            <h3 class="contact-info-title">Email:</h3>
            <p class="contact-info-text">meduzium@mail.ru</p>
        </div>
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
        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A782c5ba4627d0d987e1b561c7d6de134ac431181958d6d496a42e800a827af65&amp;source=constructor" width="100%" height="400" frameborder="0"></iframe>
    </div>
        </div>
    </div>
    </div>

    <script>
    // Активация табов
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.dataset.tab;
            
            // Убираем активные классы
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Добавляем активные классы
            button.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Плавная прокрутка для якорей
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Анимация при скролле
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('[data-aos]').forEach(el => {
            observer.observe(el);
        });
    });
</script>

<script>
document.querySelectorAll('.offer-more').forEach(button => {
    button.addEventListener('click', () => {
        const targetId = button.getAttribute('data-target');
        const details = document.getElementById(targetId);
        details.classList.toggle('active');
        button.textContent = details.classList.contains('active') ? 'Скрыть ↑' : 'Подробнее →';
    });
});
</script>

<script>
document.querySelectorAll('.team-card').forEach(card => {
    card.addEventListener('click', () => {
        // Закрыть все карточки, кроме текущей
        document.querySelectorAll('.team-card').forEach(otherCard => {
            if (otherCard !== card) {
                otherCard.classList.remove('flip');
            }
        });
        // Переключить текущую карточку
        card.classList.toggle('flip');
    });
});
</script>



@endsection