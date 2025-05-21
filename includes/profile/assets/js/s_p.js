function openModal(imageSrc, captionText) {
    const modal = document.getElementById('modal-s_p');
    const modalImage = document.getElementById('modal-s_p-image');
    const modalCaption = document.getElementById('modal-s_p-caption');

    modal.style.display = 'flex';
    modalImage.src = imageSrc;
    modalCaption.textContent = captionText;
}

function closeModal() {
    const modal = document.getElementById('modal-s_p');
    modal.style.display = 'none';
}
