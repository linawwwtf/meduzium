@extends('layouts.main')

@section('title', 'Предложите фото')

@section('content')
    <section class="all">
        <div class="container">
            <div class="add-suggestion__wrapper">
                <h1>Хотите предложить фотографию?</h1>
                <form action="{{ route('suggest-image.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-container" id="uploadArea">
                        <input type="file" id="fileInput" accept="image/*" name="image">
                        <span class="upload-text">Нажмите или перенесите изображение</span>
                        <img id="preview" alt="Предпросмотр изображения">
                    </div>
                    @error('image')
                    <div class="error" style="color: red;">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="custom-button">Отправить</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const preview = document.getElementById('preview');
        const uploadText = uploadArea.querySelector('.upload-text');

        // Открытие выбора файла при клике
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // Обработка выбора файла
        fileInput.addEventListener('change', () => {
            handleFiles(fileInput.files);
        });

        // Обработка перетаскивания
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            fileInput.files = e.dataTransfer.files; // Привязываем файлы к input
            handleFiles(e.dataTransfer.files);
        });

        // Функция обработки файлов
        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        preview.src = e.target.result;
                        preview.classList.add('visible');
                        uploadText.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Пожалуйста, выберите изображение.');
                }
            }
        }
    </script>
@endsection
