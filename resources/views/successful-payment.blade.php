@extends('layouts.main')

@section('content')
    <section class="all">
        <div class="container">
            <h1>Платеж прошел успешно</h1>
            <form action="{{ route('pdf.get') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" value="{{ $orderId }}" name="order_id">
                @foreach ($eventsIds as $id)
                    <input type="hidden" name="events_ids[]" value="{{ $id }}">
                @endforeach
                <button class="custom-button" type="submit">Скачать билеты.pdf</button>
            </form>
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
        });
    </script>
@endsection
