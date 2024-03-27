let currentIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    const newTransformValue = -index * 100 + '%';
    document.querySelector('.slides').style.transform = 'translateX(' + newTransformValue + ')';
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(currentIndex);
}