@extends('layouts.main')

@section('title', 'Отзыв')

@section('content')
    <section class="all">
        <div class="container">
            <div class="add-review">
                <h1>Оставить отзыв</h1>
                <form action="{{ route('review.store') }}" method="POST">
                    @csrf
                    <label>
                        <span>Ваше имя</span>
                        <input type="text" name="name" required>
                    </label>
                    <label>
                        <span>Оценка</span>
                        <div class="rating">
                            <input type="hidden" name="rating" id="rating" value="0">
                            <span class="star" data-value="1">&#9733;</span>
                            <span class="star" data-value="2">&#9733;</span>
                            <span class="star" data-value="3">&#9733;</span>
                            <span class="star" data-value="4">&#9733;</span>
                            <span class="star" data-value="5">&#9733;</span>
                        </div>
                    </label>
                    <label>
                        <span>Текст отзыва</span>
                        <textarea name="content" rows="10" cols="30" required></textarea>
                    </label>
                    <button type="submit" class="btn">Отправить</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const ratingValue = this.getAttribute('data-value');
                    ratingInput.value = ratingValue;

                    stars.forEach(s => s.classList.remove('active'));

                    for (let i = 0; i < ratingValue; i++) {
                        stars[i].classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
