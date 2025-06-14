@extends('layouts.admin')

@section('title', 'Отзывы')

@section('content')
    <section class="all">
        <div class="container">
            <div class="reviews">
                <h2>Архивные отзывы</h2>
                <a href="{{ route('admin.reviews.index') }}">Новые отзывы</a>
                @foreach ($archives as $archive)
                    <div class="review-card">
                        <h3>{{$archive->name}}</h3>
                        @for($i = 0; $i < $archive->rating; $i++ )
                            <span class="star active">&#9733;</span>
                        @endfor
                        @for($i = $archive->rating; $i < 5; $i++ )
                            <span class="star">&#9733;</span>
                        @endfor
                        <p>{{$archive->content}}</p>
                        <p>{{ $archive->created_at }}</p>
                        <div class="btns">
                            <form action="{{ route('admin.reviews.delete', $archive->id) }}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                {{ $archives->links() }}
            </div>
        </div>
    </section>
@endsection
