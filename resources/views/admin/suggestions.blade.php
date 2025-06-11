<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Медузиум — Управление галереей</title>
    <style>
        /* Основные стили */
        :root {
            --primary-dark: #1a237e;
            --primary-medium: #5e83e2;
            --primary-light: #9747FF;
            --secondary-color: #6c757d;
            --danger-color: #f44336;
            --glass-color: rgba(26, 35, 126, 0.2);
            --white: #ffffff;
            --text-light: rgba(255, 255, 255, 0.9);
            --text-dark: #333;
            --success-color: #4CAF50;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(rgba(26, 35, 126, 0.7), rgba(26, 35, 126, 0.9)), url('/img/bg-exposition.jpg') center/cover no-repeat fixed;
            color: var(--white);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Заголовки */
        .admin-gallery__title {
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            position: relative;
            font-family: 'Comfortaa', cursive;
        }
        
        .admin-gallery__title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-light), var(--primary-medium));
            border-radius: 2px;
        }
        
        .suggestions-title {
            font-size: 1.8rem;
            text-align: center;
            margin: 3rem 0 1.5rem;
            position: relative;
        }
        
        /* Основная галерея */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .gallery-item {
            aspect-ratio: 1 / 1;
            transition: transform 0.3s ease;
        }
        
        /* Контейнер для загрузки */
        .upload-container {
            position: relative;
            width: 100%;
            height: 100%;
            background: var(--glass-color);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            border: 2px dashed rgba(255, 255, 255, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .upload-container:hover {
            border-color: var(--primary-medium);
            background: rgba(26, 35, 126, 0.3);
            transform: translateY(-3px);
        }
        
        .upload-container.dragover {
            border-color: var(--primary-light);
            background: rgba(151, 71, 255, 0.2);
        }
        
        .file-input {
            display: none;
        }
        
        .upload-text {
            color: var(--text-light);
            font-size: 1rem;
            text-align: center;
            padding: 0 1rem;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .image-preview {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 0;
        }
        
        /* Предложенные фото */
        .suggestions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 1.5rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .suggestion-item {
            aspect-ratio: 1 / 1;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            position: relative;
            background: rgba(0, 0, 0, 0.3);
        }
        
        .suggestion-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        
        .suggestion-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: grab;
            transition: opacity 0.3s ease;
        }
        
        .suggestion-item:hover .suggestion-image {
            opacity: 0.8;
        }
        
        /* Кнопки */
        .gallery-actions {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 3rem;
            flex-wrap: wrap;
        }
        
        .gallery-button {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            padding: 12px 24px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-family: 'Montserrat', sans-serif;
        }
        
        .gallery-button i {
            font-size: 1.1rem;
        }
        
        .gallery-button--primary {
            background-color: var(--primary-medium);
            color: white;
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.3);
        }
        
        .gallery-button--primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(26, 35, 126, 0.4);
        }
        
        .gallery-button--secondary {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .gallery-button--secondary:hover {
            background-color: #5a6268;
            transform: translateY(-3px);
        }
        
        /* Сообщения */
        .message {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }
        
        .message-success {
            background-color: rgba(76, 175, 80, 0.2);
            border-left: 4px solid var(--success-color);
        }
        
        .message-error {
            background-color: rgba(244, 67, 54, 0.2);
            border-left: 4px solid var(--danger-color);
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .admin-gallery__title {
                font-size: 1.8rem;
            }
            
            .suggestions-title {
                font-size: 1.5rem;
            }
            
            .gallery-actions {
                flex-direction: column;
                gap: 1rem;
            }
            
            .gallery-button {
                width: 100%;
                justify-content: center;
            }
        }
        
        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
            
            .suggestions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .admin-gallery__title {
                font-size: 1.6rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <section class="admin-gallery">
        <div class="container">
            <div class="admin-gallery__wrapper">
                <h1 class="admin-gallery__title">Управление галереей</h1>
                
                @if(session('success'))
                <div class="message message-success">
                    {{ session('success') }}
                </div>
                @endif
                
                @if(session('error'))
                <div class="message message-error">
                    {{ session('error') }}
                </div>
                @endif
                
                <form action="{{ route('admin.gallery.update') }}" method="POST" enctype="multipart/form-data" class="gallery-form">
                    @csrf
                    <ul class="gallery-grid">
                        @foreach([0,1,4,2,3] as $index)
                        <li class="gallery-item">
                            <div class="upload-container">
                                <input type="file" class="file-input" accept="image/*" name="image{{ $index+1 }}">
                                <input type="hidden" class="image-url" name="image_url{{ $index+1 }}" value="{{ $gallery[$index]->image_url ?? '' }}">
                                <span class="upload-text">Нажмите или перенесите изображение</span>
                                <img class="image-preview" src="{{ isset($gallery[$index]) ? asset($gallery[$index]->image_url) : '' }}" alt="Изображение галереи {{ $index+1 }}">
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    
                    <div class="gallery-actions">
                        <button type="submit" class="gallery-button gallery-button--primary">
                            <i class="fas fa-save"></i> Сохранить изменения
                        </button>
                        <a href="{{ route('admin.gallery.reset') }}" class="gallery-button gallery-button--secondary">
                            <i class="fas fa-undo"></i> Сбросить
                        </a>
                    </div>
                </form>
                
                <h2 class="suggestions-title">Предложенные фотографии</h2>
                @if($suggestions->isEmpty())
                <p style="text-align: center; opacity: 0.8;">Нет предложенных фотографий</p>
                @else
                <ul class="suggestions-grid">
                    @foreach ($suggestions as $suggestion)
                        <li class="suggestion-item">
                            <img class="suggestion-image"
                                src="{{ asset('/storage/' . $suggestion->image_url) }}"
                                alt="Предложенное фото {{ $suggestion->id }}"
                                draggable="true"
                                data-url="{{ '/storage/' . $suggestion->image_url }}"
                            >
                        </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadAreas = document.querySelectorAll('.upload-container');
            const fileInputs = document.querySelectorAll('.file-input');
            const previews = document.querySelectorAll('.image-preview');
            const uploadTexts = document.querySelectorAll('.upload-text');
            const imageUrls = document.querySelectorAll('.image-url');

            // Инициализация предпросмотра для уже загруженных изображений
            previews.forEach((preview, index) => {
                if (preview.src && !preview.src.includes('undefined')) {
                    uploadTexts[index].style.display = 'none';
                }
            });

            // Настройка drag-and-drop для предложенных фото
            const suggestionImages = document.querySelectorAll('.suggestion-image');
            suggestionImages.forEach(img => {
                img.addEventListener('dragstart', (e) => {
                    e.dataTransfer.setData('text/plain', img.dataset.url);
                    setTimeout(() => {
                        img.style.opacity = '0.4';
                    }, 0);
                });
                
                img.addEventListener('dragend', () => {
                    img.style.opacity = '1';
                });
            });

            // Обработка загрузки изображений
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
                        // Обработка загрузки файла
                        fileInputs[index].files = e.dataTransfer.files;
                        handleFiles(e.dataTransfer.files, index);
                    } else {
                        // Обработка перетаскивания из предложенных фото
                        const imageUrl = e.dataTransfer.getData('text/plain');
                        if (imageUrl) {
                            previews[index].src = '{{ asset('') }}' + imageUrl;
                            uploadTexts[index].style.display = 'none';
                            imageUrls[index].value = imageUrl;
                            fileInputs[index].value = ''; // Очищаем input file
                        }
                    }
                });
            });

            function handleFiles(files, index) {
                if (files.length > 0) {
                    const file = files[0];
                    
                    // Проверка типа файла
                    if (!file.type.startsWith('image/')) {
                        alert('Пожалуйста, выберите изображение (JPG, PNG).');
                        return;
                    }
                    
                    // Проверка размера файла (5MB)
                    if (file.size > 5 * 1024 * 1024) {
                        alert('Файл слишком большой. Максимальный размер: 5MB.');
                        return;
                    }
                    
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        previews[index].src = e.target.result;
                        uploadTexts[index].style.display = 'none';
                        imageUrls[index].value = ''; // Очищаем URL при загрузке нового файла
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</body>
</html>