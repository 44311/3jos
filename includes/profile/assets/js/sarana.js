function openModal(imageSrc, captionText) {
    const modal = document.getElementById('modal-sarana');
    const modalImage = document.getElementById('modal-sarana-image');
    const modalCaption = document.getElementById('modal-sarana-caption');

    modal.style.display = 'flex';
    modalImage.src = imageSrc;
    modalCaption.textContent = captionText;
}

function closeModal() {
    const modal = document.getElementById('modal-sarana');
    modal.style.display = 'none';
}
