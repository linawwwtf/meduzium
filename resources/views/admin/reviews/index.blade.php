@extends('layouts.admin')

@section('title', 'Отзывы')

@section('content')
    <section class="all">
        <div class="container">
            <div class="reviews">
                <h2>Новые отзывы</h2>
                <a href="{{ route('admin.reviews.archive') }}" class="custom-button">
    <i class="fas fa-archive"></i> Архивные отзывы</a>

                @foreach ($reviews as $review)
                    <div class="review-card">
                        <h3>{{$review->name}}</h3>
                        @for($i = 0; $i < $review->rating; $i++ )
                            <span class="star active">&#9733;</span>
                        @endfor
                        @for($i = $review->rating; $i < 5; $i++ )
                            <span class="star">&#9733;</span>
                        @endfor
                        <p>{{$review->content}}</p>
                        <p>{{ $review->created_at }}</p>
                        <div class="btns">
                            <form action="{{ route('admin.reviews.updateStatus', $review->id) }}" method="POST">
                                @csrf
                                @method("PATCH")
                                    <button class="custom-button">Проверен</button>
                            </form>

                            <form action="{{ route('admin.reviews.delete', $review->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                    <button class="custom-button">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="admin-pagination">
                    {{ $reviews->links() }}
                </div>
                
            </div>
        </div>
    </section>
@endsection
