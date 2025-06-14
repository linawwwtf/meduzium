@extends('layouts.admin')

@section('title', 'Обратная связь')
@section('header', 'Обратная связь')

@section('content')
<div class="admin-feedback">
    @if($contacts->isEmpty())
        <div class="admin-empty">
            <i class="fas fa-envelope-open-text"></i>
            <p>Нет новых обращений</p>
        </div>
    @else
        <div class="feedback-controls">
            <div class="search-box">
                <input type="text" placeholder="Поиск...">
                <i class="fas fa-search"></i>
            </div>
            <div class="filter-box">
                <select>
                    <option>Все обращения</option>
                    <option>Новые</option>
                    <option>Просмотренные</option>
                </select>
            </div>
        </div>

        <div class="reviews">
            @foreach ($contacts as $contact)
                <div class="review-card">
                    <div class="review-header">
                        <h3>{{ $contact->name }}</h3>
                        <span class="review-date">{{ $contact->created_at->format('d.m.Y H:i') }}</span>
                        <div class="review-actions">
                            <button class="btn-mark" title="Отметить как прочитанное">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="btn-delete" title="Удалить">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div class="review-contact">
                        <span><i class="fas fa-phone"></i> {{ $contact->phone }}</span>
                        @if($contact->email)
                        <span><i class="fas fa-envelope"></i> {{ $contact->email }}</span>
                        @endif
                    </div>
                    <p>{{ $contact->message }}</p>
                </div>
            @endforeach
        </div>


    @endif
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Обработка кнопок в карточках
        document.querySelectorAll('.btn-mark').forEach(btn => {
            btn.addEventListener('click', function() {
                const card = this.closest('.review-card');
                card.classList.add('review-read');
                // Здесь можно добавить AJAX-запрос для отметки прочитанным
            });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if(confirm('Удалить это обращение?')) {
                    const card = this.closest('.review-card');
                    card.style.opacity = '0';
                    setTimeout(() => card.remove(), 300);
                    // Здесь можно добавить AJAX-запрос для удаления
                }
            });
        });
    });
</script>
@endsection
