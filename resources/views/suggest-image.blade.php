<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Медузиум — Предложите фото</title>
    <style>
        /* Основные стили страницы */
        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg,rgb(36, 33, 170) 0%, #1a3a5a 100%);
            color: #fff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Стили секции */
        .all {
            padding: 80px 0;
        }
        
        .add-suggestion__wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 40px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .add-suggestion__wrapper h1 {
            font-family: 'Comfortaa', cursive;
            font-size: 2.2rem;
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
            font-weight: 600;
        }
        
        /* Стили формы */
        form {
            display: flex;
            flex-direction: column;
        }
        
        /* Область загрузки */
        .upload-container {
            position: relative;
            height: 300px;
            border: 2px dashed rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
            margin-bottom: 25px;
            background: rgba(255, 255, 255, 0.03);
        }
        
        .upload-container:hover {
            border-color: #5e83e2;
            background: rgba(94, 131, 226, 0.05);
        }
        
        .upload-container.dragover {
            border-color: #5e83e2;
            background: rgba(94, 131, 226, 0.1);
            transform: translateY(-3px);
        }
        
        #fileInput {
            display: none;
        }
        
        .upload-text {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            padding: 0 20px;
            transition: all 0.3s ease;
        }
        
        .upload-container:hover .upload-text {
            color: #fff;
        }
        
        /* Предпросмотр изображения */
        #preview {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }
        
        #preview.visible {
            opacity: 1;
        }
        
        /* Стили для ошибок */
        .error {
            color: #ff6b6b;
            margin-bottom: 20px;
            padding: 10px 15px;
            background: rgba(255, 107, 107, 0.1);
            border-radius: 5px;
            text-align: center;
            font-size: 0.9rem;
        }
        
        /* Кнопка отправки */
        .custom-button {
            background: #5e83e2;
            color: white;
            border: none;
            padding: 14px 30px;
            font-size: 1rem;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-family: 'Montserrat', sans-serif;
            margin-top: 10px;
            align-self: center;
            width: auto;
        }
        
        .custom-button:hover {
            background: #4a6bc5;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        /* Адаптивность */
        @media (max-width: 768px) {
            .all {
                padding: 40px 0;
            }
            
            .add-suggestion__wrapper {
                padding: 30px 20px;
            }
            
            .add-suggestion__wrapper h1 {
                font-size: 1.8rem;
            }
            
            .upload-container {
                height: 250px;
            }
        }
        
        @media (max-width: 480px) {
            .add-suggestion__wrapper {
                padding: 25px 15px;
            }
            
            .add-suggestion__wrapper h1 {
                font-size: 1.5rem;
            }
            
            .upload-text {
                font-size: 1rem;
            }
            
            .custom-button {
                padding: 12px 25px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <section class="all">
        <div class="container">
            <div class="add-suggestion__wrapper">
                <h1>Хотите предложить фотографию?</h1>
                <form action="{{ route('suggest-image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-container" id="uploadArea">
                        <input type="file" id="fileInput" accept="image/*" name="image">
                        <span class="upload-text">Нажмите или перенесите изображение</span>
                        <img id="preview" alt="Предпросмотр изображения">
                    </div>
                    @error('image')
                    <div class="error">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="custom-button">Отправить</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    handleFiles(e.dataTransfer.files);
                }
            });

            // Функция обработки файлов
            function handleFiles(files) {
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
                        preview.src = e.target.result;
                        preview.classList.add('visible');
                        uploadText.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</body>
</html>