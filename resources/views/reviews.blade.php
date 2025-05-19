@extends('layouts.main')

@section('title', 'Отзывы')

@section('content')
    <section class="all">
        <div class="container">
            <div class="reviews">
                @foreach($reviews as $review)
                    <div class="review-card">
                        <h4 class="name-event">{{ $review->name }}</h4>
                        @for($i = 0; $i < $review->rating; $i++ )
                            <span class="star active">&#9733;</span>
                        @endfor
                        @for($i = $review->rating; $i < 5; $i++ )
                            <span class="star">&#9733;</span>
                        @endfor
                        <p class="data-event">{{ $review->content }}</p>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                        <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn">Удалить</button>
                        </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
