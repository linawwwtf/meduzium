// scripts.js
document.addEventListener('DOMContentLoaded', function() {
    // Анимация чисел в статистике
    const animateCounters = () => {
        const counters = document.querySelectorAll('[data-count]');
        const speed = 200;
        
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;
            const increment = target / speed;
            
            if (count < target) {
                const updateCount = () => {
                    const current = +counter.innerText;
                    if (current < target) {
                        counter.innerText = Math.ceil(current + increment);
                        setTimeout(updateCount, 1);
                    } else {
                        counter.innerText = target;
                    }
                };
                
                // Запускаем анимацию при появлении в viewport
                const observer = new IntersectionObserver((entries) => {
                    if (entries[0].isIntersecting) {
                        updateCount();
                        observer.unobserve(counter);
                    }
                });
                
                observer.observe(counter);
            }
        });
    };
    
    // Анимация появления элементов при скролле
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.fade-in');
        
        const checkVisibility = () => {
            elements.forEach(el => {
                if (el.classList.contains('visible')) return;
                
                const rect = el.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight - 100 && rect.bottom >= 0;
                
                if (isVisible) {
                    el.classList.add('visible');
                }
            });
        };
        
        window.addEventListener('scroll', checkVisibility);
        checkVisibility(); // Проверить при загрузке
    };
    
    // Инициализация функций
    animateCounters();
    animateOnScroll();
    
    // Бургер-меню для мобильных устройств
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav');
    
    if (burger && nav) {
        burger.addEventListener('click', function() {
            nav.classList.toggle('active');
            burger.classList.toggle('active');
        });
    }
    
    // Галерея с автоматической прокруткой
    const galleryItems = document.querySelectorAll('.gallery-item');
    if (galleryItems.length > 0) {
        let currentIndex = 0;
        
        setInterval(() => {
            galleryItems[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % galleryItems.length;
            galleryItems[currentIndex].classList.add('active');
        }, 3000);
    }
});

