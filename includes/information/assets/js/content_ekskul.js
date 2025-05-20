let currentIndex = 0;
        const slides = document.querySelectorAll('.slider-item');
        const totalSlides = slides.length;
        const indicatorContainer = document.getElementById('indicator-container');

        function updateIndicators() {
            indicatorContainer.innerHTML = '';
            for (let i = 0; i < totalSlides; i++) {
                const indicator = document.createElement('div');
                indicator.className = 'indicator w-3 h-3 bg-gray-400 rounded-full cursor-pointer';
                indicator.style.margin = '0 4px';
                indicator.addEventListener('click', () => moveToSlide(i));
                indicatorContainer.appendChild(indicator);
            }
            updateIndicatorStyles();
        }

        function updateIndicatorStyles() {
            const indicators = document.querySelectorAll('.indicator');
            indicators.forEach((ind, index) => {
                ind.classList.toggle('bg-blue-500', index === currentIndex);
                ind.classList.toggle('bg-gray-400', index !== currentIndex);
            });
        }

        function moveSlide(direction) {
            currentIndex += direction;
            if (currentIndex < 0) currentIndex = totalSlides - 1;
            if (currentIndex >= totalSlides) currentIndex = 0;
            moveToSlide(currentIndex);
        }

        function moveToSlide(index) {
            currentIndex = index;
            const newTranslate = -currentIndex * 100;
            document.querySelectorAll('.slider-item').forEach(slide => {
                slide.style.transform = `translateX(${newTranslate}%)`;
            });
            updateIndicatorStyles();
        }

        updateIndicators();