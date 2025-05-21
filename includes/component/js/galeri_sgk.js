function openModal(imageSrc, captionText) {
    const modal = document.getElementById('modal-sgk');
    const modalImage = document.getElementById('modal-sgk-image');
    const modalCaption = document.getElementById('modal-sgk-caption');

    modal.style.display = 'flex';
    modalImage.src = imageSrc;
    modalCaption.textContent = captionText;
}

function closeModal() {
    const modal = document.getElementById('modal-sgk');
    modal.style.display = 'none';
}
