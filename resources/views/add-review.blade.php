<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оставить отзыв | Медузиум</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Comfortaa:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-dark: #1a237e;
            --primary-medium: #5e83e2;
            --primary-light: #9747FF;
            --secondary-color: #6c757d;
            --danger-color: #f44336;
            --success-color: #4CAF50;
            --warning-color: #FFC107;
            --bg-dark: #0a1a2a;
            --bg-light: #1a3a5a;
            --text-light: rgba(255, 255, 255, 0.9);
            --text-muted: rgba(255, 255, 255, 0.6);
            --border-color: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-light) 100%);
            color: var(--text-light);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .all {
            padding: 80px 0;
        }

        h1 {
            font-family: 'Comfortaa', cursive;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 40px;
            color: white;
            position: relative;
        }

        h1::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(to right, var(--primary-light), var(--primary-medium));
            border-radius: 2px;
        }

        .add-review {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 40px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        label {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label span {
            font-weight: 500;
            font-size: 1.1rem;
        }

        input[type="text"],
        textarea {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 12px 15px;
            color: white;
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 2px rgba(94, 131, 226, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        .rating {
            display: flex;
            gap: 5px;
            margin-top: 5px;
        }

        .star {
            font-size: 2rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star:hover,
        .star.active {
            color: var(--warning-color);
            transform: scale(1.1);
        }

        .btn {
            background: var(--primary-medium);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            text-align: center;
            font-family: 'Montserrat', sans-serif;
        }

        .btn:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .all {
                padding: 40px 0;
            }

            h1 {
                font-size: 2rem;
            }

            .add-review {
                padding: 30px 20px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }

            .star {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
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
                    @if(session('success'))
                        <div style="text-align: center;">
                            {{ session('success') }}
                        </div>
                    @endif
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

                    stars.forEach(s => {
                        s.classList.remove('active');
                        s.style.color = 'var(--text-muted)';
                    });

                    for (let i = 0; i < ratingValue; i++) {
                        stars[i].classList.add('active');
                        stars[i].style.color = 'var(--warning-color)';
                    }
                });

                // Добавляем hover эффект
                star.addEventListener('mouseover', function() {
                    const hoverValue = this.getAttribute('data-value');

                    stars.forEach((s, index) => {
                        if (index < hoverValue) {
                            s.style.color = 'var(--warning-color)';
                        }
                    });
                });

                star.addEventListener('mouseout', function() {
                    const currentValue = ratingInput.value;

                    stars.forEach((s, index) => {
                        if (index >= currentValue) {
                            s.style.color = 'var(--text-muted)';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
