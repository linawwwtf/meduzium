@extends('layouts.main')

@section('title', 'Запись на мероприятие')

@section('content')
    <section class="all">
        <div class="container">
            <div class="events-sign-up__wrapper">
                <h1>Записаться на мероприятие</h1>
                <form action="{{ route('events.sign-up.submit') }}" method="POST">
                    @csrf
                    @method("POST")
                    <label>
                        <span>ФИО</span>
                        <input type="text" name="name">
                    </label>
                    <label>
                        <span>Номер телефона</span>
                        <input type="text" name="phone">
                    </label>
                    <label>
                        <span>Мероприятие</span>
                        <select name="event_id">
                            @foreach($events as $event)
                                <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>
                    </label>
                    <button type="submit" class="custom-button">Записаться</button>
                </form>
            </div>
        </div>
    </section>
@endsection
