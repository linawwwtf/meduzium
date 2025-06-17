@extends('layouts.main')

@section('title', 'Экспозиции')

@section('content')
    <div class="main-exposition">
        <div class="container">
            <div class="main-text">
                <span>—— медузариум</span>
                <h1>Экспозиции</h1>
                <p class="dec-text">Здесь вы сможете ознакомиться с невероятными <br> выставками, посвященными
                    удивительному миру медуз</p>
            </div>
        </div>
    </div>

    <div class="all-exposition">
        <div class="about-ex">
            <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Разнообразие медуз</h2>
                <div class="section-header__divider"></div>
            </div>
                <p class="about-text">В Медузиуме вас ждет уникальная возможность познакомиться с удивительными обитателями океана — медузами, чья красота и биологические особенности поражают воображение. Наша выставка представляет более 20 видов этих грациозных существ, от крошечных пресноводных гидромедуз до гигантских арктических цианей.
                </p>
                <p class="about-text"> Вот некоторые из них, вы увидите:</p>

                <div class="jellyfishes">
                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[0]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look"
                                      camera-controls tone-mapping="neutral" poster="poster.webp" shadow-intensity="1"
                                      camera-orbit="-18.68deg 83.56deg 4.32m" field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                        </model-viewer>


                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[0]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[0]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="0">Подробнее</button>
                        </div>
                    </div>

                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[1]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look"
                                      camera-controls tone-mapping="neutral" poster="poster.webp" shadow-intensity="1"
                                      camera-orbit="-42.42deg 85.51deg 22.27m" field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                        </model-viewer>

                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[1]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[1]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="1">Подробнее</button>
                        </div>
                    </div>

                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[2]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral"
                                      poster="poster.webp" shadow-intensity="1" camera-orbit="89.12deg 121.4deg 23.15m"
                                      field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                        </model-viewer>


                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[2]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[2]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="2">Подробнее</button>
                        </div>
                    </div>

<div class="jellyfish">
                        <model-viewer src="{{ asset($models[3]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral"
                                      poster="poster.webp" shadow-intensity="1" camera-orbit="-228.1deg 85.12deg 2.064m"
                                      field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                        </model-viewer>

                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[3]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[3]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="3">Подробнее</button>
                        </div>
                    </div>

                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[4]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look"
                                      camera-controls tone-mapping="neutral" poster="poster.webp" shadow-intensity="1"
                                      camera-orbit="-19.46deg 81.23deg 4.775m" field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                            
                        </model-viewer>

                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[4]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[4]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="4">Подробнее</button>
                        </div>
                    </div>

                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[5]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral"
                                      poster="poster.webp" shadow-intensity="1" camera-orbit="89.51deg 147deg 42.01m"
                                      field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                            
                        </model-viewer>

                        <div class="jelly-text">
                            <h3 class="jelly-name">{{$models[5]->name}}</h3>
                            <p class="jelly-description">
                                {{$models[5]->description}}
                            </p>
                            <button class="custom-button more-button" data-jellyfish-index="5">Подробнее</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="jellyfish-cycle">
            <div class="container">
                <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Жизненный цикл медуз</h2>
                <div class="section-header__divider"></div>
            </div>

                <div class="cycle-container">
            <p class="cycle-text">Погрузитесь в завораживающий процесс превращений, где каждая стадия - это новая форма существования. В Медузиуме вас ждет уникальная возможность проследить полный цикл жизни этих древних существ от микроскопической клетки до грациозного взрослого организма.
            </p>

            <div class="cycle-text" style="color: #00e5ff;">
                <strong> Кликайте на иконки, чтобы запустить цикл жизни!</strong>
            </div>
            
            <!-- Интерактивная временная шкала -->
            <div class="lifecycle-timeline">
                <div class="timeline-progress"></div>
                
                <div class="timeline-steps">
                    <div class="step" data-stage="planula">
                        <div class="step-icon">🥚</div>
                        <div class="step-tooltip">Личинка-планула</div>
                    </div>
                    <div class="step" data-stage="polyp">
                        <div class="step-icon">🪸</div>
                        <div class="step-tooltip">Полип</div>
                    </div>
                    <div class="step" data-stage="ephyra">
                        <div class="step-icon">🌊</div>
                        <div class="step-tooltip">Молодая медуза</div>
                    </div>
                    <div class="step" data-stage="adult">
                        <div class="step-icon">🎆</div>
                        <div class="step-tooltip">Взрослая особь</div>
                    </div>
                </div>
            </div>

            <!-- Динамическое описание этапов -->
            <div class="stage-descriptions">
                <div class="stage-info active" data-stage="planula">
                    <h4><span class="cycle-name">Личинка-планула</span></h4>
                    <p class="cycle-text">Удивительный старт жизни: крошечная планула размером с крупинку соли путешествует в океанских течениях. В нашей экспозиции через мощные микроскопы вы увидите эти живые "космические корабли", начинающие великое путешествие
                    </p>
                </div>
                <div class="stage-info" data-stage="polyp">
                    <h4><span class="cycle-name">Полип</span></h4>
                    <p class="cycle-text">Фантастический сад из сотен идентичных существ! В специальных аквариумах с увеличительными стенками мы воссоздали удивительные "коралловые" сообщества медуз, где особи соединены в единую пищевую систему. Они прикрепляются к поверхности и образуют колонии, питаясь планктоном</p>
                </div>
                <div class="stage-info" data-stage="ephyra">
                    <h4><span class="cycle-name">Молодая медуза</span></h4>
                    <p class="cycle-text">Волшебный момент "почкования": как бабочка из кокона, юная медуза отрывается от полипа. Наши динамические инсталляции показывают этот процесс в замедленной съемке с детализированными пояснениями</p>
                </div>
                <div class="stage-info" data-stage="adult">
                    <h4><span class="cycle-name">Взрослая особь</span></h4>
                    <p class="cycle-text">Венец трансформации - идеально сформированная медуза. В нашем цилиндрическом аквариуме "Живой торнадо" вы сможете наблюдать финальную стадию во всей ее гипнотической красоте.</p>
                </div>
            </div>

            <div class="cycle-text" style="color: #00e5ff; margin-top: 80px;">
                <strong> Что Вас ожидает:</strong>
            </div>

            <!-- Интерактивные элементы -->
            <div class="cycle-features">
                <div class="feature-card" onclick="showFeature('infographic')">
                    <div class="feature-icon">📊</div>
                    <h4>Инфографики</h4>
                    <p style="color: #fff">Интерактивные панели, где касанием вы сможете "развернуть" каждый этап развития в подробную схему с анимацией внутренних процессов. Особый хит - сравнение циклов 12 разных видов!</p>
                </div>
                
                <div class="feature-card" onclick="showFeature('video')">
                    <div class="feature-icon">🎥</div>
                    <h4>Видеопрезентации</h4>
                    <p style="color: #fff">360° купольный кинотеатр с фильмом "Один день из жизни медузы", где камера становится частью стаи. Вас ожидают спецэффекты, включающие вибрационные кресла и капельное опрыскивание для полного погружения.</p>
                </div>
                
                <div class="feature-card" onclick="showFeature('ar')">
                    <div class="feature-icon">👁️</div>
                    <h4>AR-модели</h4>
                    <p style="color: #fff">Наведите планшет на аквариум в медузариуме - и увидите, как медуза перед вами "отматывает" свой возраст, превращаясь в полип, а затем в личинку. Технология дополненной реальности позволяет "заморозить" любой этап для изучения.
</p>
                </div>
            </div>
        </div>



        <div class="interactive-zone">
    <div class="container">
        <div class="container">
                <div class="container">
                <div class="section-header">
                <h2 class="section-header__title__dark">Интерактивные зоны</h2>
                <div class="section-header__divider"></div>
            </div>
        
        <div class="interactive-slider">
            <!-- Карточка 1 - Фотозона -->
            <div class="slider-card photo-zone">
                <div class="card-content">
                    <div class="card-icon">📸</div>
                    <h4>Фотозона "В стае медуз"</h4>
                    <div class="card-details">
                        <p>Иммерсивный 360° экран для уникальных фото:</p>
                        <ul>
                            <li>AR-маски "Медуза" для селфи</li>
                            <li>Эффект "Подводного мира"</li>
                            <li>Моментальная печать фото</li>
                        </ul>
                    </div>
                </div>
                <div class="wave-effect"></div>
            </div>
            
            <!-- Карточка 2 - Игры -->
            <div class="slider-card game-zone">
                <div class="card-content">
                    <div class="card-icon">🎮</div>
                    <h4>Игровая станция</h4>
                    <div class="card-details">
                        <p>Интерактивные игры с сенсорными экранами:</p>
                        <ul>
                            <li>"Спаси океан" - экологический квест</li>
                            <li>"Медузометр" - тест на знание видов</li>
                            <li>"Эволюция" - симулятор развития медузы</li>
                        </ul>
                    </div>
                </div>
                <div class="wave-effect"></div>
            </div>
            
            <!-- Карточка 3 - Обсуждения -->
            <div class="slider-card talk-zone">
                <div class="card-content">
                    <div class="card-icon">💬</div>
                    <h4>Дискуссионный клуб</h4>
                    <div class="card-details">
                        <p>Каждые 2 часа в зоне:</p>
                        <ul>
                            <li>Живые выступления биологов</li>
                            <li>Сессия вопрос-ответ с экспертами</li>
                            <li>Демонстрация кормления медуз</li>
                        </ul>
                    </div>
                </div>
                <div class="wave-effect"></div>
            </div>

            <!-- Карточка 4 - Лаборатория -->
<div class="slider-card lab-zone">
    <div class="card-content">
        <div class="card-icon">🔬</div>
        <h4>Микроскопная станция</h4>
        <div class="card-details">
            <p>Станьте учёным в нашей лаборатории:</p>
            <ul>
                <li>Настоящие микроскопы с живыми образцами</li>
                <li>Изучение клеточного строения медуз</li>
                <li>Эксперименты с биолюминесценцией</li>
                <li>Детектор ядовитых щупалец</li>
            </ul>
            <button class="card-button">Включить УФ-подсветку →</button>
        </div>
    </div>
    <div class="wave-effect"></div>
</div>

<!-- Карточка 5 - VR-океан -->
<div class="slider-card vr-zone">
    <div class="card-content">
        <div class="card-icon">👓</div>
        <h4>VR-погружение</h4>
        <div class="card-details">
            <p>Полное погружение в мир медуз:</p>
            <ul>
                <li>360° видео среди косяков медуз</li>
                <li>Игра "Спасите риф от загрязнения"</li>
                <li>Эффект присутствия с тактильной обратной связью</li>
            </ul>
            <button class="card-button">Начать погружение →</button>
        </div>
    </div>
    <div class="wave-effect"></div>
</div>

<!-- Карточка 6 - Музыка медуз -->
<div class="slider-card music-zone">
    <div class="card-content">
        <div class="card-icon">🎵</div>
        <h4>Биомузыка</h4>
        <div class="card-details">
            <p>Услышьте "голос" медуз:</p>
            <ul>
                <li>Интерактивный звуковой атлас</li>
                <li>Генератор музыки из импульсов медуз</li>
                <li>Танцующий аквариум с подсветкой под ритм</li>
                <li>Создайте свою медузо-мелодию</li>
            </ul>
            <button class="card-button">Играть на щупальцах →</button>
        </div>
    </div>
    <div class="wave-effect"></div>
</div>

<!-- Карточка 7 - Кафе -->
<div class="slider-card cafe-zone">
    <div class="card-content">
        <div class="card-icon">🍽️</div>
        <h4>Медузо-кафе</h4>
        <div class="card-details">
            <p>Гастрономические эксперименты:</p>
            <ul>
                <li>Дегустация экологичных морепродуктов</li>
                <li>Коктейли с "медузами" из спирулины</li>
                <li>Мастер-класс по безопасному приготовлению</li>
                <li>Сравнение вкусов 5 съедобных видов</li>
            </ul>
            <button class="card-button">Меню дегустации →</button>
        </div>
    </div>
    <div class="wave-effect"></div>
</div>
        </div>
        
        <div class="slider-controls">
            <button class="slider-arrow prev">←</button>
            <div class="slider-dots"></div>
            <button class="slider-arrow next">→</button>
        </div>
        
    </div>
</div>

    </div>
    <div class="modals">
        @foreach($models as $model)
            <div class="modal-wrapper">
                <div class="modal">
                    <h2>{{ $model->name }}</h2>
                    <p>{{ $model->full_description }}</p>
                    <div class="close-wrapper"><span class="close-button"></span></div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        const buttons = document.querySelectorAll('.more-button');
        const modals = document.querySelectorAll('.modal-wrapper');
        const close = document.querySelectorAll('.close-wrapper');
        const modalShow = 'open-modal';

        buttons.forEach((button, index) => {
            button.addEventListener('click', function () {
                modals[index].classList.add(modalShow);
            });
        });

        close.forEach((button, index) => {
            button.addEventListener('click', function () {
                modals[index].classList.remove(modalShow);
            });
        })

        modals.forEach((modalWrapper) => {
            modalWrapper.addEventListener('click', function (event) {
                if (event.target === modalWrapper) {
                    modalWrapper.classList.remove(modalShow);
                }
            });
        });
    </script>

        <script>
    // Анимация временной шкалы
    document.querySelectorAll('.step').forEach(step => {
        step.addEventListener('click', function() {
            const stage = this.dataset.stage;
            
            // Обновляем активный шаг
            document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
            this.classList.add('active');
            
            // Обновляем прогресс
            const steps = document.querySelectorAll('.step');
            const index = Array.from(steps).indexOf(this);
            const progress = (index / (steps.length - 1)) * 400;
            document.querySelector('.timeline-progress').style.width = progress + '%';
            
            // Показываем соответствующее описание
            document.querySelectorAll('.stage-info').forEach(info => {
                info.classList.remove('active');
                if(info.dataset.stage === stage) {
                    info.classList.add('active');
                }
            });
        });
    });

    // Показываем первый этап по умолчанию
    document.querySelector('.step').click();

</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.interactive-slider');
    const cards = document.querySelectorAll('.slider-card');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    
    if (!slider || !cards.length || !prevBtn || !nextBtn) return;
    
    let currentIndex = 0;
    const cardWidth = cards[0].offsetWidth + 30; // ширина карточки + gap
    
    function updateSlider() {
        slider.scrollTo({
            left: currentIndex * cardWidth,
            behavior: 'smooth'
        });
    }
    
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % cards.length;
        updateSlider();
    });
    
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + cards.length) % cards.length;
        updateSlider();
    });
    
    // Добавляем обработчики для свайпа на мобильных
    let startX;
    slider.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
    });
    
    slider.addEventListener('touchend', (e) => {
        if (!startX) return;
        
        const endX = e.changedTouches[0].clientX;
        if (startX - endX > 50) {
            nextBtn.click(); // Свайп влево
        } else if (endX - startX > 50) {
            prevBtn.click(); // Свайп вправо
        }
        startX = null;
    });
});
</script>

@endsection
