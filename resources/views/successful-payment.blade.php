@extends('layouts.user')
@section('title', 'Платеж')

@section('content')

    <section class="all">
        <div class="container">
            <h1>Платеж прошел успешно</h1>
            
            <div class="success-message">
                <div class="success-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2>Спасибо за покупку!</h2>
                <p>Ваши билеты успешно оплачены и готовы к скачиванию.</p>
            </div>
            <form action="{{ route('pdf.get') }}" method="POST" >
                @csrf
                @method('POST')
                <input type="hidden" value="{{ $orderId }}" name="order_id">
                @foreach ($eventsIds as $id)
                    <input type="hidden" name="events_ids[]" value="{{ $id }}">
                @endforeach
                <div class="btn-center">
                    <button class="custom-button" type="submit">
                    <i class="fas fa-download"></i> Скачать билеты в pdf</button>
                </div>
                
            </form>

            <div class="additional-actions">
                <a href="/">
                    <i class="fas fa-arrow-left"></i> Вернуться на главную
                </a>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('pdfDownloadForm').addEventListener('submit', async function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            form.addEventListener('submit', async function(event) {
                event.preventDefault();
                
                const button = form.querySelector('button');
                const originalText = button.innerHTML;
                
                // Показываем индикатор загрузки
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Готовим билеты...';
                button.disabled = true;
                
                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });
                    
                    if (response.ok) {
                        const blob = await response.blob();
                        const url = window.URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'билеты_медузиум.pdf';
                        document.body.appendChild(a);
                        a.click();
                        window.URL.revokeObjectURL(url);
                    } else {
                        alert('Произошла ошибка при генерации билетов');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Произошла ошибка при загрузке файла');
                } finally {
                    // Восстанавливаем кнопку
                    button.innerHTML = originalText;
                    button.disabled = false;
                }
            });
        });
    </script>
@endsection
