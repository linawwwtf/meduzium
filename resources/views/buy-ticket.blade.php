@extends('layouts.main')

@section('title', 'Купить билет')

@section('content')
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
                        <span class="add-event">
                            добавить мероприятие
                        </span>
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
                            <input type="hidden" name="adult_tickets_count" id="adultsCount" value="0">
                            <input type="hidden" name="child_tickets_count" id="childrenCount" value="0">
                            <input type="hidden" name="group_tickets_count" id="groupCount" value="0">
                            <input type="hidden" name="school_group_count" id="schoolCount" value="0">
                            <div class="price-button-wrapper">
                                <div class="total-price-wrapper">
                                    Общая сумма: <span><b id="total-price">0</b> руб</span>
                                </div>
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

            const adultTicketsCount = document.getElementById('adultsCount');
            const childTicketsCount = document.getElementById('childrenCount');
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
                if (document.querySelectorAll('.ticket').length >= 10) return;
                adultTicketsCount.value = parseInt(adultTicketsCount.value) + 1;
                addTicket('adult');
                updateTotalPrice();
            });

            childBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 10) return;
                childTicketsCount.value = parseInt(childTicketsCount.value) + 1;
                addTicket('child');
                updateTotalPrice();
            });

            groupBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 10) return;
                groupTicketsCount.value = parseInt(groupTicketsCount.value) + 1;
                addTicket('group');
                updateTotalPrice();
            });

            schoolBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (document.querySelectorAll('.ticket').length >= 10) return;
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
@endsection
