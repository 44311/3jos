document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll(".card-staff");
    const contentContainer = document.querySelector(".content-container-staff");
    const contentItems = document.querySelectorAll(".content-item-staff");
    const closeBtns = document.querySelectorAll(".close-btn-staff"); // Pilih semua tombol close

    // Fungsi untuk menutup konten
    function closeContent(index) {
        contentItems[index].classList.remove("active");
        contentContainer.classList.remove("active");

        // Scroll ke atas setelah menutup konten
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }

    cards.forEach((card, index) => {
        card.addEventListener("click", (e) => {
            e.preventDefault(); // Prevent default anchor behavior

            // Jika container sudah aktif dan konten yang sama diklik, maka tutup
            if (contentContainer.classList.contains("active") && contentItems[index].classList.contains("active")) {
                closeContent(index);
                return;
            }

            // Tutup semua konten sebelumnya
            contentItems.forEach(item => item.classList.remove("active"));

            // Tampilkan konten baru
            contentItems[index].classList.add("active");
            contentContainer.classList.add("active");

            // Scroll smooth ke content-container-staff dengan offset
            const offset = -100; // Ubah jarak scroll di sini (negatif = ke atas)
            const elementPosition = contentContainer.getBoundingClientRect().top + window.scrollY;
            const offsetPosition = elementPosition + offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        });
    });

    // Aksi untuk tombol close
    closeBtns.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            closeContent(index);
        });
    });
});
