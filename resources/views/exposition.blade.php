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
                <div class="underline">
                    <h3 class="title">Разнообразие медуз</h3>
                </div>
                <p class="about-text">На этой выставке вы познакомитесь с более чем 20 различными видами медуз, каждую
                    из которых <br> мы представляем с подробной информацией о её среде обитания и особенностях.
                </p> <br>
                <p class="about-text"><span class="cycle-name">Вы увидите: </span></p>

                <div class="jellyfishes">
                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[0]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look"
                                      camera-controls tone-mapping="neutral" poster="poster.webp" shadow-intensity="1"
                                      camera-orbit="-18.68deg 83.56deg 4.32m" field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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
                </div>
            </div>
        </div>

        <div class="jellyfish-cycle">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Жизненные циклы медуз</h3>
                </div>

                <div class="cycle-container">
                    <p class="cycle-text">В этой части экспозиции вы сможете узнать о том,<br> как медузы проходят все
                        стадии своего<br> жизненного цикла.</p>
                    <p class="cycle-text">Выставка включает:<br><span
                            class="cycle-name">--- Инфографики и модели:</span> Наглядные схемы, показывающие этапы
                        развития медуз от<br> планктона до взрослых особей.<br><span class="cycle-name">--- Видеопрезентации:</span>
                        Увлекательные ролики, рассказывающие о процессах<br> размножения и миграции медуз.</p>
                </div>
            </div>
        </div>

        <div class="rare-jellyfishes">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Редкие виды и их особенности</h3>
                </div>

                <p class="about-text">Погрузитесь в невероятный мир редких видов медуз, которые встречаются на Земле.
                    Узнайте об<br> их уникальных характеристиках и условиях обитания.
                </p> <br>
                <p class="about-text"><span class="cycle-name">Вы увидите: </span></p>

                <div class="jellyfishes">
                    <div class="jellyfish">
                        <model-viewer src="{{ asset($models[3]->model_url) }}" ar
                                      ar-modes="webxr scene-viewer quick-look" camera-controls tone-mapping="neutral"
                                      poster="poster.webp" shadow-intensity="1" camera-orbit="-228.1deg 85.12deg 2.064m"
                                      field-of-view="30deg">
                            <div class="progress-bar hide" slot="progress-bar">
                                <div class="update-bar"></div>
                            </div>
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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
                            <button slot="ar-button" id="ar-button">
                                View in your space
                            </button>
                            <div id="ar-prompt">
                                <img src="https://modelviewer.dev/shared-assets/icons/hand.png">
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

        <div class="interactive-zone">
            <div class="container">
                <div class="underline">
                    <h3 class="title">Интерактивные зоны</h3>
                </div>
                <div class="contact">
                    <div class="contacts-container">
                        <div class="interactive-container">
                            <p class="cycle-text">Погружаясь в экспозицию, не забудьте посетить наши<br> интерактивные
                                зоны, где вы сможете:</p>
                            <p class="cycle-text"><span class="cycle-name">--- Зафиксировать момент:</span> Используйте
                                фотозоны с уникальными фонами,<br> чтобы сделать незабываемые снимки.<br><span
                                    class="cycle-name">--- Исследовать:</span> Участвуйте в интерактивных играх и
                                викторинах на тему медуз<br> и их экологии.<br>
                                <span class="cycle-name">--- Обсуждать:</span> Присоединяйтесь к обсуждениям с
                                экспертами и биологами,<br> задавайте вопросы и углубляйте свои знания о медузах.
                            </p>
                        </div>
                    </div>
                        <div class="btn-inter">
                            <a href="/buy-ticket" class="custom-button">Купить билет</a>
                        </div>
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

@endsection
