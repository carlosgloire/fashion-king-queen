let currentIndex = 0;
let images = [];

async function fetchImages() {
    try {
        const response = await fetch('pages/background_images.php'); // Adjust the path to your PHP script
        images = await response.json();
        changeBg(); // Start the background change once images are loaded
    } catch (error) {
        console.error('Error fetching images:', error);
    }
}

function changeBg() {
    if (images.length === 0) return;

    const page = document.querySelector('.home-page');
    const bg = `url("${images[currentIndex]}")`;
    currentIndex = (currentIndex + 1) % images.length;
    page.style.backgroundImage = bg;
}

document.addEventListener('DOMContentLoaded', () => {
    fetchImages();
    setInterval(changeBg, 2500);
});


// Événement de chargement de la page
document.addEventListener('DOMContentLoaded', startValueAnimation);
// Fonction pour démarrer l'animation des valeurs
function startValueAnimation() {
    let valueDisplays = document.querySelectorAll('.num');
    let interval = 4000;

    valueDisplays.forEach((valueDisplay) => {
        let startValue = 0;
        let endValue = parseInt(valueDisplay.getAttribute('data-Val'));
        let decimalPart = endValue % 1; // Obtenir la partie décimale
        let steps = Math.floor(endValue); // Nombre d'étapes entières
        let stepDuration = interval / steps;
        let counter = setInterval(function () {
            if (startValue < steps) {
                startValue += 1;
                valueDisplay.textContent = startValue;
            } else if (startValue === steps && decimalPart > 0) {
                // Gérer la partie décimale si présente
                startValue += decimalPart;
                valueDisplay.textContent = endValue.toFixed(1); // Afficher avec 1 décimale
            } else {
                clearInterval(counter);
            }
        }, stepDuration);
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const testimonials = document.querySelectorAll('.testimonial-item');
    const circles = document.querySelectorAll('.circle');
    let currentIndex = 0;

    function showItem(index) {
        testimonials[currentIndex].style.display = 'none';
        circles[currentIndex].classList.remove('active');
        testimonials[index].style.display = 'block';
        circles[index].classList.add('active');
        currentIndex = index;
    }

    function showNextItem() {
        const nextIndex = (currentIndex + 1) % testimonials.length;
        showItem(nextIndex);
    }

    function showPreviousItem() {
        const prevIndex = (currentIndex - 1 + testimonials.length) % testimonials.length;
        showItem(prevIndex);
    }

    function goToItem(index) {
        showItem(index);
    }

    // Initial display setup
    testimonials.forEach((item, index) => {
        if (index !== currentIndex) {
            item.style.display = 'none';
        }
    });

    circles.forEach((circle, index) => {
        circle.addEventListener('click', () => {
            goToItem(index);
        });
    });

    // Auto-scroll functionality
    setInterval(showNextItem, 9000);
});