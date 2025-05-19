@extends('layouts.main')

@section('title', 'Обратная связь')

@section('content')
    <section class="all">
        <div class="container">
            <h1>Обратная связь</h1>
            <div class="reviews">
                @foreach ($contacts as $contact)
                    <div class="review-card">
                        <h3>{{$contact->name}}</h3>
                        <span>{{ $contact->phone }}</span>
                        <p>{{ $contact->message }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
