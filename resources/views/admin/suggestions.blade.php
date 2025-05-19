@extends('layouts.main')

@section('title', 'Галерея')

@section('content')
    <section>
        <div class="container">
            <div class="admin-suggestions">
                <h1 style="color: black">Управление галереей</h1>
                <form action="{{ route('admin.gallery.change') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="images-grid">
                        <li>
                            <div class="upload-container">
                                <input type="file" class="fileInput" accept="image/*" name="image1">
                                <input type="hidden" class="imageUrl" name="image_url1">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="preview" src="{{ asset($gallery[0]->image_url) }}" alt="Предпросмотр изображения">
                            </div>
                        </li>
                        <li>
                            <div class="upload-container">
                                <input type="file" class="fileInput" accept="image/*" name="image2">
                                <input type="hidden" class="imageUrl" name="image_url2">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="preview" src="{{ asset($gallery[1]->image_url) }}" alt="Предпросмотр изображения">
                            </div>
                        </li>
                        <li>
                            <div class="upload-container">
                                <input type="file" class="fileInput" accept="image/*" name="image5">
                                <input type="hidden" class="imageUrl" name="image_url5">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="preview" src="{{ asset($gallery[4]->image_url) }}" alt="Предпросмотр изображения">
                            </div>
                        </li>
                        <li>
                            <div class="upload-container">
                                <input type="file" class="fileInput" accept="image/*" name="image3">
                                <input type="hidden" class="imageUrl" name="image_url3">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="preview" src="{{ asset($gallery[2]->image_url) }}" alt="Предпросмотр изображения">
                            </div>
                        </li>
                        <li>
                            <div class="upload-container">
                                <input type="file" class="fileInput" accept="image/*" name="image4">
                                <input type="hidden" class="imageUrl" name="image_url4">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="preview" src="{{ asset($gallery[3]->image_url) }}" alt="Предпросмотр изображения">
                            </div>
                        </li>
                    </ul>
                    <div class="buttons__admin-suggestions">
                        <button type="submit" class="custom-button">Сохранить</button>
                        <a href="{{ route("admin.gallery.reset") }}">Сбросить</a>
                    </div>
                </form>
                <h2 style="color: black">Предложенные фотографии</h2>
                <ul class="suggestions">
                    @foreach ($suggestions as $suggestion)
                        <li>
                            <img
                                class="suggestion-image"
                                src="{{ asset('/storage/' . $suggestion->image_url) }}"
                                alt="suggestion-image-{{ $suggestion->id }}"
                                draggable="true"
                                data-url="{{ asset('/storage/' . $suggestion->image_url) }}"
                            >
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <script>
        const uploadAreas = document.querySelectorAll('.upload-container');
        const fileInputs = document.querySelectorAll('.fileInput');
        const previews = document.querySelectorAll('.preview');
        const uploadTexts = document.querySelectorAll('.upload-text');
        const imageUrls = document.querySelectorAll('.imageUrl');

        const suggestionImages = document.querySelectorAll('.suggestion-image');
        suggestionImages.forEach(img => {
            img.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', img.dataset.url);
            });
        });

        uploadAreas.forEach((area, index) => {
            area.addEventListener('click', () => {
                fileInputs[index].click();
            });

            fileInputs[index].addEventListener('change', () => {
                handleFiles(fileInputs[index].files, index);
            });

            area.addEventListener('dragover', (e) => {
                e.preventDefault();
                area.classList.add('dragover');
            });

            area.addEventListener('dragleave', () => {
                area.classList.remove('dragover');
            });

            area.addEventListener('drop', (e) => {
                e.preventDefault();
                area.classList.remove('dragover');

                if (e.dataTransfer.files.length > 0) {
                    fileInputs[index].files = e.dataTransfer.files;
                    handleFiles(e.dataTransfer.files, index);
                } else {
                    const imageUrl = e.dataTransfer.getData('text/plain');
                    if (imageUrl) {
                        previews[index].src = imageUrl;
                        uploadTexts[index].style.display = 'none';
                        imageUrls[index].value = imageUrl;
                    }
                }
            });
        });

        function handleFiles(files, index) {
            if (files.length > 0) {
                const file = files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previews[index].src = e.target.result;
                        uploadTexts[index].style.display = 'none';
                        imageUrls[index].value = '';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Пожалуйста, выберите изображение.');
                }
            }
        }
    </script>
@endsection
