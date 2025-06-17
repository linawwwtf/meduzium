<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Comfortaa:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Купить билет | Медузиум</title>
     <style>
        :root {
            --primary-dark: #1a237e;
            --primary-medium: #5e83e2;
            --primary-light: #9747FF;
            --secondary-color: #6c757d;
            --success-color: #4CAF50;
            --bg-dark: #0a1a2a;
            --bg-light: #1a3a5a;
            --text-light: rgba(255, 255, 255, 0.9);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Comfortaa', cursive;
            background: #1a237e;
            color: var(--text-light);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: rgba(26, 35, 126, 0.8);
            backdrop-filter: blur(10px);
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .logo span {
            font-family: 'Comfortaa', cursive;
            font-weight: 700;
            color: white;
            font-size: 1.3rem;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 5px 10px;
            border-radius: 5px;
        }

        nav a:hover {
            color: var(--primary-medium);
            background: rgba(255, 255, 255, 0.1);
        }

        .all.buy-ticket {
            padding: 40px 0;
        }

        .all.buy-ticket h1 {
            font-family: 'Comfortaa', cursive;
            font-size: 2.5rem;
            margin-bottom: 40px;
            color: white;
            position: relative;
            text-align: center;
        }

        .all.buy-ticket h1::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-light), var(--primary-medium));
            border-radius: 2px;
        }

        .ticket-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
        }

        .ticket-buy-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .events-section {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
        }

        .events-section h4 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .events {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .event {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
        }

        .event-name {
            font-weight: 500;
        }

        .event-additional-price {
            color: #00e5ff;
            font-size: 0.9rem;
        }

        .delete-event {
            cursor: pointer;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .delete-event svg {
            transition: all 0.3s ease;
        }

        .delete-event:hover svg {
            stroke: var(--primary-light);
        }

        .add-event i {
    margin-right: 8px;
}


.add-event {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    font-weight: 500;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-align: center;
    user-select: none;
    text-decoration: none;
}

.add-event:hover {
    transform: translateY(-2px);
}

.add-event:active {

    transform: translateY(0);
}


        .buy-ticket-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 0.9rem;
        }

        .form-group input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 12px 15px;
            color: var(--text-light);
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 2px rgba(94, 131, 226, 0.3);
        }

        .form-group input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .tickets-wrapper {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
        }

        .tickets-wrapper h3 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .tickets-btns {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .white-btn {
            background: rgba(255, 255, 255, 0.1);
            color: var(--text-light);
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .white-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .white-btn svg {
            stroke-width: 2;
        }

        .price-button-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .total-price-wrapper {
            font-size: 1.1rem;
        }

        .total-price-wrapper span {
            color: #00e5ff;
            font-weight: 500;
        }

        .tickets-section {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
        }

        .tickets-section h4 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .tickets {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .ticket {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 6px;
        }

        .ticket-price {
            font-weight: 500;
            color: #00e5ff;
        }

        .delete-ticket {
            cursor: pointer;
            padding: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .delete-ticket svg {
            transition: all 0.3s ease;
        }

        .delete-ticket:hover svg {
            stroke: var(--primary-light);
        }

        .modal-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-wrapper.open-modal {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            background: var(--bg-dark);
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 500px;
            border: 1px solid var(--border-color);
            position: relative;
        }

        .modal h3 {
            margin-top: 0;
            margin-bottom: 20px;
            text-align: center;
        }

        .close-wrapper {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
        }

        .close-button {
            display: block;
            width: 20px;
            height: 20px;
            position: relative;
        }

        .close-button::before,
        .close-button::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--text-light);
        }

        .close-button::before {
            transform: rotate(45deg);
        }

        .close-button::after {
            transform: rotate(-45deg);
        }

        .event-select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            color: var(--text-light);
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 20px;
        }

        .event-descriptions {
            margin-bottom: 20px;
        }

        .event-description {
            display: none;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
        }

        .event-description.show-desc {
            display: block;
        }

        .event-price {
            margin-top: 10px;
            color: #00e5ff;
            font-weight: 500;
        }

        .custom-button {
            padding: 15px 30px;
            background: linear-gradient(135deg, #5e83e2, #9747FF);
            color: white;
            border: none;
            border-radius: 50px;
            font-family: 'Comfortaa', cursive;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(94, 131, 226, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

.custom-button:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 25px rgba(94, 131, 226, 0.4);
  background: linear-gradient(135deg, #4a6fc7, #823de8);
}

        .custom-button i {
            font-size: 1.2rem;
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Добавляем стили для выпадающего списка */
    .event-select {
        width: 100%;
        padding: 12px 15px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid var(--border-color);
        border-radius: 6px;
        color: var(--text-light);
        font-family: 'Montserrat', sans-serif;
        margin-bottom: 20px;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='white'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 15px;
    }

    /* Стили для опций выпадающего списка */
    .event-select option {
        background-color: var(--bg-dark);
        color: var(--text-light);
        padding: 10px;
    }

    /* Стили при наведении на опции */
    .event-select option:hover {
        background-color: var(--primary-medium);
    }

    /* Стиль для выбранной опции */
    .event-select option:checked {
        background-color: var(--primary-dark);
    }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 15px;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
            }

            .all.buy-ticket h1 {
                font-size: 2rem;
            }

            .ticket-buy-wrapper {
                gap: 20px;
            }

            .price-button-wrapper {
                flex-direction: column;
                gap: 15px;
            }

            .custom-button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .all.buy-ticket h1 {
                font-size: 1.8rem;
            }

            .ticket-container {
                padding: 20px;
            }

            .tickets-btns {
                flex-direction: column;
            }

            .white-btn {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav-container">
            <a href="/" class="logo">
                <img src="{{ asset('img/logo.svg') }}" alt="Медузиум">
                <span>Медузиум</span>
            </a>
            <nav>
                <a href="/">Главная</a>
                <a href="/exposition">Экспозиции</a>
                <a href="/about">О нас</a>
                <a href="/buy-ticket">Купить билет</a>
            </nav>
        </div>
    </header>
        <section class="all buy-ticket">
        <div class="container">
            <h1>Купить билет в медузариум</h1>
            <div class="ticket-container fade-in">
                <form action="{{ route('ticket.buy') }}" method="POST" class="ticket-buy-wrapper">
                    @csrf
                    @method("POST")
                    <div class="events-section">
                        <h4>Дополнительные мероприятия:</h4>
                        <div class="events">
                            <!-- Сюда будут добавляться мероприятия -->
                        </div>
                        <span class="add-event"><i class="fas fa-plus"></i> Добавить мероприятие</span>

                    </div>

                    <div class="buy-ticket-form">
                        <div class="form-group">
                            <label for="name">
                                <span>ФИО</span>
                                <input type="text" id="name" placeholder="Иванов Иван Иванович" name="name" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="email">
                                <span>Email</span>
                                <input type="email" id="email" placeholder="example@mail.ru" name="email" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="dateInput">
                                <span>Дата посещения</span>
                                <input type="date" id="dateInput" name="date" required>
                            </label>
                        </div>

                        <div class="tickets-wrapper">
                            <h3>Добавить билет</h3>
                            <div class="tickets-btns">
                                <button type="button" class="white-btn" id="adult-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    взрослый
                                </button>
                                <button type="button" class="white-btn" id="child-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    детский
                                </button>
                                <button type="button" class="white-btn" id="group-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    групповой
                                </button>
                                <button type="button" class="white-btn" id="school-btn">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                        <path d="M12 5v14M5 12h14" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                    школьный
                                </button>
                            </div>
                            <input type="hidden" name="adult_tickets_count" id="adultCount" value="0">
                            <input type="hidden" name="child_tickets_count" id="childCount" value="0">
                            <input type="hidden" name="group_tickets_count" id="groupCount" value="0">
                            <input type="hidden" name="school_group_count" id="schoolCount" value="0">
                            <div class="price-button-wrapper">
                                <div class="total-price-wrapper">
                                    Общая сумма: <span><b id="total-price">0</b> руб</span>
                                </div>

                                @if($errors->any())
                                    @foreach($errors->all() as $error)
                                        <span>{{ $error }}</span>
                                    @endforeach
                                @endif

                                <button type="submit" class="custom-button">Перейти к оплате</button>
                            </div>
                        </div>
                    </div>

                    <div class="tickets-section">
                        <h4>Ваши билеты:</h4>
                        <ul class="tickets">
                            <!-- Сюда будут добавляться билеты -->
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Модальное окно выбора мероприятия -->
    <div class="modal-wrapper">
        <div class="modal">
            <h3>Выберите мероприятие</h3>
            <div class="close-wrapper"><span class="close-button"></span></div>
            <select name="event_id" class="event-select">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
            <div class="event-descriptions">
                @foreach($events as $event)
                    <div class="event-description" data-event-id="{{ $event->id }}">
                        <p>{{ $event->description }}</p>
                        <div class="event-price">+100 руб к каждому билету</div>
                    </div>
                @endforeach
            </div>
            <button type="button" class="custom-button add-event-button">Добавить мероприятие</button>
        </div>
    </div>

    <!-- Шаблоны для динамического добавления элементов -->
    <template id="adult-ticket">
        <li class="ticket" data-type="adult">
            <span>Взрослый билет</span>
            <span class="ticket-price adult-ticket-price">{{ $prices->adult_weekday_price }} руб</span>
            <div class="delete-ticket">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </li>
    </template>

    <template id="child-ticket">
        <li class="ticket" data-type="child">
            <span>Детский билет</span>
            <span class="ticket-price child-ticket-price">{{ $prices->child_weekday_price }} руб</span>
            <div class="delete-ticket">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </li>
    </template>

    <template id="group-ticket">
        <li class="ticket" data-type="group">
            <span>Групповой билет (от {{ $prices->group_min_people }} чел.)</span>
            <span class="ticket-price group-ticket-price">{{ $prices->group_price }} руб</span>
            <div class="delete-ticket">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </li>
    </template>

    <template id="school-ticket">
        <li class="ticket" data-type="school">
            <span>Школьная группа</span>
            <span class="ticket-price school-ticket-price">{{ $prices->school_group_price }} руб</span>
            <div class="delete-ticket">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </li>
    </template>

    <template id="event">
        <div class="event" data-event-id="">
            <span class="event-name"></span>
            <span class="event-additional-price">+100 руб × кол-во билетов</span>
            <input type="hidden" name="events_id[]" value="" class="event-input">
            <div class="delete-event">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6L6 18M6 6l12 12" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
    </template>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const adultBtn = document.getElementById('adult-btn');
            const childBtn = document.getElementById('child-btn');
            const groupBtn = document.getElementById('group-btn');
            const schoolBtn = document.getElementById('school-btn');

            const adultTicketsCount = document.getElementById('adultCount');
            const childTicketsCount = document.getElementById('childCount');
            const groupTicketsCount = document.getElementById('groupCount');
            const schoolTicketsCount = document.getElementById('schoolCount');

            const tickets = document.querySelector('.tickets');
            const totalPrice = document.getElementById('total-price');

            // Получаем текущие цены из базы
            const prices = {
                adult: {
                    weekday: {{ $prices->adult_weekday_price }},
                    weekend: {{ $prices->adult_weekend_price }}
                },
                child: {
                    weekday: {{ $prices->child_weekday_price }},
                    weekend: {{ $prices->child_weekend_price }}
                },
                group: {{ $prices->group_price }},
                school: {{ $prices->school_group_price }},
                minGroup: {{ $prices->group_min_people }}
            };

            // Проверяем день недели для определения цены
            const checkDayOfWeek = () => {
                const date = new Date(dateInput.value);
                const dayOfWeek = date.getDay();
                return [5, 6, 0].includes(dayOfWeek); // Пятница, суббота, воскресенье
            };

            // Получаем актуальные цены
            const getCurrentPrices = () => {
                const isWeekend = checkDayOfWeek();
                return {
                    adult: isWeekend ? prices.adult.weekend : prices.adult.weekday,
                    child: isWeekend ? prices.child.weekend : prices.child.weekday,
                    group: prices.group,
                    school: prices.school
                };
            };

            // Обновляем отображение цен
            const updatePricesDisplay = () => {
                const currentPrices = getCurrentPrices();

                document.querySelectorAll('.adult-ticket-price').forEach(el => {
                    el.textContent = currentPrices.adult + ' руб';
                });

                document.querySelectorAll('.child-ticket-price').forEach(el => {
                    el.textContent = currentPrices.child + ' руб';
                });

                document.querySelectorAll('.group-ticket-price').forEach(el => {
                    el.textContent = currentPrices.group + ' руб';
                });

                document.querySelectorAll('.school-ticket-price').forEach(el => {
                    el.textContent = currentPrices.school + ' руб';
                });
            };

            // Обновляем общую стоимость
            const updateTotalPrice = () => {
                const currentPrices = getCurrentPrices();
                const eventsCount = document.querySelectorAll('.event').length;
                const totalPeople = parseInt(adultTicketsCount.value) + parseInt(childTicketsCount.value);

                // Автоматически применяем групповую скидку если достигнуто минимальное количество
                if (totalPeople >= prices.minGroup && parseInt(groupTicketsCount.value) === 0) {
                    groupTicketsCount.value = totalPeople;
                    // Обновляем список билетов
                    // Здесь нужно добавить логику для обновления UI
                }

                const total =
                    adultTicketsCount.value * currentPrices.adult +
                    childTicketsCount.value * currentPrices.child +
                    groupTicketsCount.value * currentPrices.group +
                    schoolTicketsCount.value * currentPrices.school +
                    eventsCount * 100 * (parseInt(adultTicketsCount.value) + parseInt(childTicketsCount.value) + parseInt(groupTicketsCount.value) + parseInt(schoolTicketsCount.value));

                totalPrice.textContent = total;
            };

            // Добавляем билет в список
            const addTicket = (type) => {
                const template = document.getElementById(`${type}-ticket`);
                const clone = template.content.cloneNode(true);
                tickets.appendChild(clone);

                const ticketElement = tickets.lastElementChild;
                const deleteBtn = ticketElement.querySelector('.delete-ticket');

                deleteBtn.addEventListener('click', () => {
                    // Уменьшаем счетчик соответствующего типа билета
                    document.getElementById(`${type}Count`).value =
                        parseInt(document.getElementById(`${type}Count`).value) - 1;

                    ticketElement.remove();
                    updateTotalPrice();
                });
            };

            // Обработчики кнопок
            adultBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 20) return;
                adultTicketsCount.value = parseInt(adultTicketsCount.value) + 1;
                addTicket('adult');
                updateTotalPrice();
            });

            childBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 20) return;
                childTicketsCount.value = parseInt(childTicketsCount.value) + 1;
                addTicket('child');
                updateTotalPrice();
            });

            groupBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 20) return;
                groupTicketsCount.value = parseInt(groupTicketsCount.value) + 1;
                addTicket('group');
                updateTotalPrice();
            });

            schoolBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 20) return;
                schoolTicketsCount.value = parseInt(schoolTicketsCount.value) + 1;
                addTicket('school');
                updateTotalPrice();
            });

            // Остальной код (модальное окно мероприятий и т.д.)
            const eventAddButton = document.querySelector('.add-event');
            const events = document.querySelector('.events');
            const eventSelect = document.querySelector('.event-select');
            const descriptions = document.querySelectorAll('.event-description');
            const modal = document.querySelector('.modal-wrapper');
            const close = document.querySelector('.close-wrapper');

            eventSelect.value = 1;
            descriptions[0].classList.add('show-desc');

            eventSelect.addEventListener('change', function () {
                const active = parseInt(eventSelect.value);
                descriptions.forEach((item, index) => {
                    if (index + 1 !== active) {
                        item.classList.remove('show-desc');
                    } else {
                        item.classList.add('show-desc');
                    }
                });
            });

            eventAddButton.addEventListener('click', function () {
                modal.classList.add('open-modal');
            });

            close.addEventListener('click', function () {
                modal.classList.remove('open-modal');
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.remove('open-modal');
                }
            });

            const addEventButton = document.querySelector('.add-event-button');
            const eventTemplate = document.getElementById('event');
            addEventButton.addEventListener('click', () => {
                const eventId = eventSelect.value;
                const selectedOption = eventSelect.options[eventSelect.selectedIndex];
                const eventTitle = selectedOption.text;

                const eventContent = eventTemplate.content.cloneNode(true);
                const eventDivTitle = eventContent.querySelector('.event-name');
                eventDivTitle.textContent = eventTitle;
                const eventInput = eventContent.querySelector('.event-input');
                eventInput.value = eventId;

                events.appendChild(eventContent);

                const eventsList = document.querySelectorAll('.event');
                const eventDeleteButtons = document.querySelectorAll('.delete-event');
                eventDeleteButtons.forEach((button, index) => {
                    button.addEventListener('click', function () {
                        eventsList[index].remove();
                        updateTotalPrice();
                    });
                });

                modal.classList.remove('open-modal');
                updateTotalPrice();
            });

            const dateInput = document.getElementById('dateInput');
            const today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
            dateInput.min = today;

            dateInput.addEventListener('change', function () {
                updatePricesDisplay();
                updateTotalPrice();
            });

            // Инициализация
            updatePricesDisplay();
            updateTotalPrice();
        });
    </script>

</body>
</html>
