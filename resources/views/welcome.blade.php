@extends('layouts.main')

@php
    $filters = [
        'type' => request('type', null),
        'date' => request('date', null),
        'sort' => request('sort', 'newest')
    ];
@endphp

@section('title', 'Главная')

@section('content')

<div class="main-wrapper">
        <section class="hero">
        <div class="hero__content container">
            <span class="hero__subtitle">—— медузариум</span>
            <h1 class="hero__title">МЕДУЗИУМ</h1>
            <p class="hero__description">Познакомьтесь с единственной в России коллекцией редких медуз</p>
            
            <div class="hero__buttons">
                <a href="/about" class="btn btn--primary">Узнать больше</a>
                <a href="/buy-ticket" class="btn btn--secondary">Купить билет</a>
            </div>
            
            <!-- Инфографика -->
            <div class="stats">
                <div class="stats__item">
                    <div class="stats__number" data-count="50">0</div>
                    <div class="stats__label">видов медуз</div>
                </div>
                <div class="stats__item">
                    <div class="stats__number" data-count="10000">0</div>
                    <div class="stats__label">постоянных посетителей</div>
                </div>
                <div class="stats__item">
                    <div class="stats__number" data-count="5">0</div>
                    <div class="stats__label">интерактивных зон</div>
                </div>
            </div>

        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">О медузариуме</h2>
                <div class="section-header__divider"></div>
            </div>
            
            <div class="about__content">
                <p class="about__text">Медузиум - это единственный проект в России с уникальной коллекцией различных видов медуз, который покажет вам разнообразие морского мира.</p>
                <p class="about__text">Благодаря современному оборудованию и особому освещению, вы получаете полную иллюзию погружения в глубины океана.</p>
                <p class="about__text">Приходите, и вы узнаете, сколько известных человечеству видов медуз живет в океане, какие из них смертельно ядовитые, а какая медуза вообще единственное бессмертное существо на планете.</p>
            </div>
        </div>
    </section>

    <!-- Events Section -->
<section class="events" id="events-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">Мероприятия</h2>
            <div class="section-header__divider"></div>
        </div>

        <!-- Форма фильтрации -->
        <div class="events-controls">
            <form method="GET" action="{{ route('home') }}" class="events-filters" id="events-filter-form">
                <div class="filter-group">
                    <label for="type">Тип мероприятия:</label>
                    <select name="type" id="type" class="filter-select">
                        <option value="">Все</option>
                        <option value="exhibition" {{ $filters['type'] == 'exhibition' ? 'selected' : '' }}>Выставки</option>
                        <option value="masterclass" {{ $filters['type'] == 'masterclass' ? 'selected' : '' }}>Мастер-классы</option>
                        <option value="lecture" {{ $filters['type'] == 'lecture' ? 'selected' : '' }}>Лекции</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="date">Дата:</label>
                    <select name="date" id="date" class="filter-select">
                        <option value="">Все даты</option>
                        <option value="today" {{ $filters['date'] == 'today' ? 'selected' : '' }}>Сегодня</option>
                        <option value="week" {{ $filters['date'] == 'week' ? 'selected' : '' }}>На этой неделе</option>
                        <option value="month" {{ $filters['date'] == 'month' ? 'selected' : '' }}>В этом месяце</option>
                        <option value="future" {{ $filters['date'] == 'future' ? 'selected' : '' }}>Предстоящие</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="sort">Сортировка:</label>
                    <select name="sort" id="sort" class="filter-select">
                        <option value="newest" {{ $filters['sort'] == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                        <option value="oldest" {{ $filters['sort'] == 'oldest' ? 'selected' : '' }}>Сначала старые</option>
                        <option value="title_asc" {{ $filters['sort'] == 'title_asc' ? 'selected' : '' }}>По названию (А-Я)</option>
                        <option value="title_desc" {{ $filters['sort'] == 'title_desc' ? 'selected' : '' }}>По названию (Я-А)</option>
                    </select>
                </div>

                <button type="submit" class="btn btn--small">Применить</button>
                @if(request()->anyFilled(['type', 'date', 'sort']))
                <a href="{{ route('home') }}" class="btn btn--small btn--outline">Сбросить</a>
            @endif
            </form>
        </div>

        @if($events->count() > 0)
            <div class="events-grid">
                @foreach($events as $event)
                    <div class="event-card">
                        <div class="event-card__type event-card__type--{{ $event->type }}">
                            {{ $event->type === 'exhibition' ? 'Выставка' : ($event->type === 'masterclass' ? 'Мастер-класс' : 'Лекция') }}
                        </div>
                        <h3 class="event-card__title">{{ $event->title }}</h3>
                        <div class="event-card__date">
                            {{ $event->start_date->format('d.m.Y') }}
                            @if($event->end_date)
                                - {{ $event->end_date->format('d.m.Y') }}
                            @endif
                        </div>
                        <div class="event-card__time">
                            {{ $event->start_date->format('H:i') }}
                            @if($event->end_date)
                                - {{ $event->end_date->format('H:i') }}
                            @endif
                        </div>
                        <a href="/buy-ticket?event_id={{ $event->id }}" class="btn btn--small">Записаться</a>
                    </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            @if($events->hasPages())
                <div class="events-pagination">
                    {{ $events->appends($filters)->links() }}
                </div>
            @endif
        @else
            <p class="no-events">Мероприятий не найдено. Попробуйте изменить параметры фильтрации.</p>
        @endif
    </div>
</section>

<style>
    .events-controls {
        margin-bottom: 30px;
        background: rgba(255, 255, 255, 0.1);
        padding: 20px;
        border-radius: 8px;
    }

    .events-filters {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        align-items: flex-end;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        min-width: 200px;
    }

    .filter-group label {
        margin-bottom: 5px;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.8);
    }

    .filter-select {
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(0, 0, 0, 0.2);
        color: white;
    }

    .events-pagination {
        margin-top: 30px;
        display: flex;
        justify-content: center;
    }

    .events-pagination .pagination {
        display: flex;
        gap: 10px;
    }

    .events-pagination .page-item.active .page-link {
        background: #5e83e2;
        border-color: #5e83e2;
    }

    .events-pagination .page-link {
        color: white;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 5px 12px;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .events-filters {
            flex-direction: column;
            align-items: stretch;
        }
    }
</style>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">Галерея</h2>
                <div class="section-header__divider"></div>
            </div>
            
            <div class="gallery-grid">
                @foreach($gallery as $index => $image)
                    <div class="gallery-item {{ $index === 0 ? 'active' : '' }}" 
                        style="background-image: url('{{ asset($image->image_url) }}')">
                        <div class="gallery-caption">{{ $image->caption ?? 'Медузариум' }}</div>
                    </div>
                @endforeach
            </div>
            <div class="btn-center">
                <a href="{{ route('suggest-image') }}" class="custom-button more-button">Отправить свое фото</a>
            </div>
            
        </div>
    </section>

    <!-- Pricing Section -->
<section class="pricing">
    <div class="container">
        <div class="section-header">
            <h2 class="section-header__title">Цены</h2>
            <div class="section-header__divider"></div>
        </div>
        
        <div class="pricing-cards">
            <div class="pricing-card">
                <h3 class="pricing-card__title">Будние дни</h3>
                <div class="pricing-card__price">{{ $prices->adult_weekday_price }} ₽</div>
                <div class="pricing-card__description">Взрослый билет</div>
                <div class="pricing-card__price pricing-card__price--secondary">{{ $prices->child_weekday_price }} ₽</div>
                <div class="pricing-card__description">Детский (3-12 лет)</div>
                <a href="/buy-ticket" class="btn btn--small">Купить</a>
            </div>
            
            <div class="pricing-card pricing-card--featured">
                <div class="pricing-card__badge">Выгодно</div>
                <h3 class="pricing-card__title">Выходные</h3>
                <div class="pricing-card__price">{{ $prices->adult_weekend_price }} ₽</div>
                <div class="pricing-card__description">Взрослый билет</div>
                <div class="pricing-card__price pricing-card__price--secondary">{{ $prices->child_weekend_price }} ₽</div>
                <div class="pricing-card__description">Детский (3-12 лет)</div>
                <a href="/buy-ticket" class="btn btn--small">Купить</a>
            </div>
            
            <div class="pricing-card">
                <h3 class="pricing-card__title">Групповой</h3>
                <div class="pricing-card__price">{{ $prices->group_price }} ₽</div>
                <div class="pricing-card__description">От {{ $prices->group_min_people }} человек</div>
                <div class="pricing-card__price pricing-card__price--secondary">{{ $prices->school_group_price }} ₽</div>
                <div class="pricing-card__description">Школьные группы</div>
                <a href="/buy-ticket" class="btn btn--small">Забронировать</a>
            </div>
        </div>
    </div>
</section>

    <!-- Contacts Section -->
    <section class="contacts" id="contact">
        <div class="container">
            <div class="section-header">
                <h2 class="section-header__title">Обратная связь</h2>
                <div class="section-header__divider"></div>
            </div>
            
            <div class="contacts-flex">
                <div class="contact-form-wrapper">
                    <h3 class="contact-form-title">Обратная связь</h3>
                    <form action="{{ route('contact.main-page') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder="Номер телефона" required>
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" rows="4" placeholder="Сообщение"></textarea>
                        </div>
                        <div class="btn-center">
                            <button type="submit" class="btn btn--primary">
                            <span>Отправить</span>
                        </button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Сохраняем позицию скролла перед обновлением страницы
    window.addEventListener('beforeunload', function() {
        if (window.location.hash === '#events-section') {
            sessionStorage.setItem('scrollPosition', window.scrollY);
        }
    });

    // Восстанавливаем позицию после загрузки
    if (window.location.hash === '#events-section') {
        const savedPosition = sessionStorage.getItem('scrollPosition');
        const eventsSection = document.getElementById('events-section');
        
        if (savedPosition) {
            setTimeout(() => {
                window.scrollTo({
                    top: savedPosition,
                    behavior: 'auto'
                });
                sessionStorage.removeItem('scrollPosition');
            }, 50);
        } else if (eventsSection) {
            setTimeout(() => {
                eventsSection.scrollIntoView({ behavior: 'smooth' });
            }, 50);
        }
    }

    // Обработка формы фильтрации
    const form = document.getElementById('events-filter-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const params = new URLSearchParams(new FormData(form));
            
            // Сохраняем текущую позицию скролла
            sessionStorage.setItem('scrollPosition', 
                document.getElementById('events-section').offsetTop);
            
            // Перенаправляем с параметрами и якорем
            window.location.href = `${form.action}?${params.toString()}#events-section`;
        });
    }

    // Обработка пагинации
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Сохраняем позицию перед переходом
            sessionStorage.setItem('scrollPosition', 
                document.getElementById('events-section').offsetTop);
            
            // Переходим по ссылке
            window.location.href = this.href + '#events-section';
        });
    });
});
</script>

@endsection