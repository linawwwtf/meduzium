<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Заказ №{{ $orderId }}</title>
    <style>
        @font-face {
            font-family: 'Times New Roman';
            src: url('{{ storage_path('fonts/Times New Roman.ttf') }}') format('truetype');
        }

        * {
            font-family: 'Times New Roman', serif;
            font-weight: normal;
        }

        h1, body {
            margin: 0.25rem;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .content {
            margin-top: 0.25rem;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border: 1px solid black;
            padding: 1rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
<div>
    <h2 style="text-align: center">Медузариум</h2>
    <div style="text-align: center;">
        <span
            style="display: inline-block; margin-right: 130px; font-size: 12px; text-align: center;">Дата посещения:<br>{{ $visitDate }}</span>
        <span
            style="display: inline-block; font-size: 12px; text-align: center;">Общая цена:<br>{{ $totalPrice }}</span>
    </div>
</div>
<h1>Заказ №{{ $orderId }}</h1>
<p>Дата покупки: {{ $buyDate }}</p>
<div class="content">
    <ul>
        @foreach($ticketsData as $ticket)
            <li>
                <span>Тип: {{ $ticket->children_ticket ? 'Детский' : 'Взрослый' }} билет</span><br>
                <span>Номер билета: {{ $ticket->uniq_identity }}</span>
                <div>
                    @if(count($eventsTitles) > 0)
                        <h4>Мероприятия:</h4>
                        <ul>
                            @foreach($eventsTitles as $title)
                                <li>
                                    <span>{{ $title }}</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
