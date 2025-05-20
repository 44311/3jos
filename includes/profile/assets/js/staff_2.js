let currentSlide = 0;
const cards = document.querySelectorAll('.cardflip-staff');
const cardContainer = document.querySelector('.cardlip-staff-container');

// Fungsi untuk flip card saat di-click
cards.forEach(card => {
    card.addEventListener('click', () => {
        card.classList.toggle('flip');
    });
});

document.addEventListener('DOMContentLoaded', () => {
    moveSlide(0); // Setup awal untuk menampilkan batch pertama
});
