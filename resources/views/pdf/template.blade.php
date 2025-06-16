<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Билет в Медузариум №{{ $orderId }}</title>
    <style>
        @font-face {
            font-family: 'Comfortaa';
            src: url('{{ storage_path('fonts/Comfortaa-VariableFont_wght.ttf') }}') format('truetype');
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comfortaa', sans-serif;
            color: #1a237e;
            background-color: #f5f7fa;
            padding: 20px;
        }

        .ticket-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(26, 35, 126, 0.2);
            position: relative;
            border: 1px solid #5e83e2;
        }

        .ticket-header {
            background: linear-gradient(135deg, #5e83e2, #1a237e);
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }

        .ticket-header h2 {
            font-size: 28px;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .ticket-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 100%;
            height: 30px;
            background-color: #5e83e2;
            clip-path: path('M0,0 L100,0 L100,5 C75,10 25,10 0,5 Z');
        }

        .ticket-meta {
            display: flex;
            justify-content: space-between;
            padding: 15px 25px;
            background: rgba(94, 131, 226, 0.1);
            border-bottom: 2px dashed #5e83e2;
        }

        .meta-item {
            text-align: center;
            flex: 1;
        }

        .meta-label {
            font-size: 12px;
            color: #5e83e2;
            margin-bottom: 5px;
            display: block;
        }

        .meta-value {
            font-size: 16px;
            font-weight: bold;
        }

        .ticket-body {
            padding: 25px;
        }

        .order-number {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #1a237e;
        }

        .buy-date {
            text-align: center;
            color: #666;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .ticket-list {
            list-style: none;
        }

        .ticket-item {
            border: 2px solid #5e83e2;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            background: rgba(94, 131, 226, 0.05);
            position: relative;
            overflow: hidden;
        }

        .ticket-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(to bottom, #5e83e2, #9747FF);
        }

        .ticket-type {
            font-size: 16px;
            margin-bottom: 10px;
            color: #1a237e;
        }

        .ticket-number {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
            display: block;
        }

        .events-title {
            font-size: 16px;
            font-weight: normal;
            color: #5e83e2;
            margin: 15px 0 10px;
            padding-bottom: 5px;
            border-bottom: 1px dashed #5e83e2;
        }

        .events-list {
            list-style: none;
            padding-left: 15px;
        }

        .event-item {
            position: relative;
            padding-left: 20px;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .event-item::before {
            content: '•';
            position: absolute;
            left: 0;
            color: #9747FF;
            font-size: 20px;
            line-height: 1;
        }

        .watermark {
            position: absolute;
            opacity: 0.1;
            font-size: 120px;
            color: #1a237e;
            transform: rotate(-30deg);
            z-index: 0;
            top: 30%;
            left: 10%;
            pointer-events: none;
            font-weight: bold;
        }

        .barcode {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px dashed #ccc;
            font-family: monospace;
            font-size: 24px;
            letter-spacing: 3px;
        }

        /* Альтернативный вариант без SVG */
        .wave-divider {
            height: 20px;
            background: #5e83e2;
            position: relative;
            overflow: hidden;
        }

        .wave-divider::after {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: white;
            border-radius: 50%;
            transform: translateY(50%);
        }
    </style>
</head>
<body>
    <div class="ticket-container">
        

        <div class="ticket-header">
            <h2>Медузариум</h2>
            <!-- Альтернативный разделитель -->
            <div class="wave-divider"></div>
        </div>

        <div class="ticket-meta">
            <div class="meta-item">
                <span class="meta-label">Дата посещения</span>
                <span class="meta-value">{{ $visitDate }}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">Общая стоимость</span>
                <span class="meta-value">{{ $totalPrice }} </span>руб
            </div>
        </div>

        <div class="ticket-body">
            <div class="order-number">Билет №{{ $orderId }}</div>
            <div class="buy-date">Дата покупки: {{ $buyDate }}</div>

            <ul class="ticket-list">
                @foreach($ticketsData as $ticket)
                <li class="ticket-item">
                    <div class="ticket-type">
                        {{ $ticket->children_ticket ? 'Детский билет' : 'Взрослый билет' }}
                    </div>
                    <span class="ticket-number">Номер билета: {{ $ticket->uniq_identity }}</span>

                    @if(count($eventsTitles) > 0)
                        <h4 class="events-title">Мероприятия:</h4>
                        <ul class="events-list">
                            @foreach($eventsTitles as $title)
                                <li class="event-item">{{ $title }}</li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
            </ul>

            <div class="barcode">
                {{ strtoupper(substr(md5($orderId), 0, 12)) }}
            </div>
        </div>
    </div>
</body>
</html>
