@extends('layouts.main')

@section('content')
    <section class="all buy-ticket">
        <div class="container">
            <h1>Купить билет</h1>
            <div>
                <form action="{{ route('ticket.buy') }}" method="POST" class="ticket-buy-wrapper">
                    @csrf
                    @method("POST")
                    <div>
                        <h4>Мероприятия:</h4>
                        <div class="events">

                        </div>
                        <span class="add-event">+ добавить мероприятие</span>
                    </div>
                    <div class="buy-ticket-form">
                        <label>
                            <span>ФИО</span>
                            <input type="text" placeholder="Иванов Иван Иванович" name="name">
                        </label>
                        <label>
                            <span>Email</span>
                            <input type="email" placeholder="example@mail.ru" name="email">
                        </label>
                        <label>
                            <span>Дата посещения</span>
                            <input type="date" id="dateInput" name="date">
                        </label>
                        <div class="tickets-wrapper">
                            <h3>Добавить билет</h3>
                            <div class="tickets-btns">
                                <button class="white-btn" id="adult-btn">+ взрослый</button>
                                <button class="white-btn" id="child-btn">+ детский</button>
                            </div>
                            <input type="hidden" name="adult_tickets_count" id="adultsCount" value="1">
                            <input type="hidden" name="child_tickets_count" id="childrenCount" value="0">
                            <div class="price-button-wrapper">
                                <span class="total-price-wrapper">Общая сумма: <span><b
                                            id="total-price">850</b> руб</span></span>
                                <button class="custom-button" type="submit">К оплате</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>Билеты:</h4>
                        <ul class="tickets">
                            <li class="main-ticket">
                                <span>Взрослый билет</span>
                                <span id="mainTicketPrice">+ 850 руб</span>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="modal-wrapper">
        <div class="modal">
            <h3>Добавить мероприятие</h3>
            <div class="close-wrapper"><span class="close-button"></span></div>
            <select name="event_id" class="event-select">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
            <div>
                @foreach($events as $event)
                    <p class="event-description">{{ $event->description }}</p>
                @endforeach
            </div>

            <button class="custom-button add-event-button">Добавить</button>
        </div>
    </div>

    <template id="adult-ticket">
        <li class="ticket" data-type="adult">
            <span>Взрослый билет</span>
            <span class="adult-ticket-price">+ 850 руб</span>
            <div class="delete-ticket">Удалить</div>
        </li>
    </template>

    <template id="child-ticket">
        <li class="ticket" data-type="child">
            <span>Детский билет</span>
            <span class="child-ticket-price">+ 650 руб</span>
            <div class="delete-ticket">Удалить</div>
        </li>
    </template>

    <template id="event">
        <div class="event">
            <span class="event-name"></span>
            <span>+ 100 руб × кол-во билетов </span>
            <input type="hidden" name="events_id[]" value="0" class="event-input">
            <div class="delete-event">Удалить</div>
        </div>
    </template>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const adultBtn = document.getElementById('adult-btn');
            const childBtn = document.getElementById('child-btn');
            const adultTicketsCount = document.getElementById('adultsCount');
            const childTicketsCount = document.getElementById('childrenCount');
            const tickets = document.querySelector('.tickets');
            const totalPrice = document.getElementById('total-price');

            let adultPrice = 1100;
            let childPrice = 950;

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
            })

            eventAddButton.addEventListener('click', function () {
                modal.classList.add('open-modal');
            });

            close.addEventListener('click', function () {
                modal.classList.remove('open-modal');
            });

            modal.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.classList.remove(modalShow);
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
                const eventInput = eventContent.querySelector('.event-input')
                eventInput.value = eventId;

                events.appendChild(eventContent);

                const eventsList = document.querySelectorAll('.event');
                const eventDeleteButtons = document.querySelectorAll('.delete-event');
                eventDeleteButtons.forEach((button, index) => {
                    button.addEventListener('click', function () {
                        eventsList[index].remove();
                        updatePrice();
                    });
                });

                modal.classList.remove('open-modal');

                updatePrice();
            });


            const dateInput = document.getElementById('dateInput');
            const today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
            dateInput.min = today;

            const changeTicketsValue = () => {
                const mainTicketPrice = document.getElementById('mainTicketPrice');
                mainTicketPrice.textContent = '+ ' + adultPrice.toString() + ' руб';

                const adultTicketsPrice = document.querySelectorAll('.adult-ticket-price');
                const childTicketsPrice = document.querySelectorAll('.child-ticket-price');

                adultTicketsPrice.forEach((ticket) => {
                    ticket.textContent = '+ ' + adultPrice.toString() + ' руб'
                })

                childTicketsPrice.forEach((ticket) => {
                    ticket.textContent = '+ ' + childPrice.toString() + ' руб'
                })

                updatePrice();
            }

            const checkDayOfWeek = () => {
                const date = new Date(dateInput.value);
                const dayOfWeek = date.getDay();
                if ([5, 6, 0].includes(dayOfWeek)) {
                    adultPrice = 1100;
                    childPrice = 950;
                } else {
                    adultPrice = 850;
                    childPrice = 650;
                }
            }

            dateInput.addEventListener('change', function () {
                checkDayOfWeek();
                changeTicketsValue();
                updatePrice();
            });

            const adultTemplate = document.getElementById('adult-ticket');
            const childTemplate = document.getElementById('child-ticket');

            const updateTicketsList = (isAdult = true) => {
                let newListItem;

                if (isAdult) {
                    newListItem = adultTemplate.content.cloneNode(true);
                } else {
                    newListItem = childTemplate.content.cloneNode(true);
                }

                const ticketElement = newListItem.querySelector('.ticket');
                tickets.appendChild(newListItem);
                const deleteButton = ticketElement.querySelector('.delete-ticket');
                deleteButton.addEventListener('click', function () {
                    const type = ticketElement.dataset.type;
                    ticketElement.remove();
                    if (type === 'adult') {
                        const oldValue = parseInt(adultTicketsCount.value);
                        adultTicketsCount.value = oldValue - 1;
                    } else {
                        const oldValue = parseInt(childTicketsCount.value);
                        childTicketsCount.value = oldValue - 1;
                    }
                    updatePrice();
                });
            }

            const updatePrice = () => {
                const eventsCount = document.querySelectorAll('.event').length;

                totalPrice.textContent = (adultTicketsCount.value * adultPrice + childTicketsCount.value * childPrice + eventsCount * 100 * (parseInt(adultTicketsCount.value) + parseInt(childTicketsCount.value))).toString();
            }

            adultBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const oldValue = parseInt(adultTicketsCount.value);
                const ticketsCount = document.querySelectorAll('.ticket').length;
                if (ticketsCount >= 10) return;
                adultTicketsCount.value = oldValue + 1;
                updateTicketsList();
                updatePrice();
                changeTicketsValue()
            });

            childBtn.addEventListener('click', function (e) {
                e.preventDefault();
                const oldValue = parseInt(childTicketsCount.value);
                const ticketsCount = document.querySelectorAll('.ticket').length;
                if (ticketsCount >= 10) return;
                childTicketsCount.value = oldValue + 1;
                updateTicketsList(false);
                updatePrice();
                changeTicketsValue();
            });

            checkDayOfWeek();
            changeTicketsValue();
            updatePrice();
        });
    </script>
@endsection
