function setDarkModePreference() {
    const userPrefersDark = localStorage.getItem('dark-mode');
    if (userPrefersDark === 'dark') {
        document.documentElement.classList.add('dark');
        setActiveButton('darkModeButton');
    } else {
        document.documentElement.classList.remove('dark');
        setActiveButton('lightModeButton');
    }
}

// Panggil fungsi saat halaman dimuat
window.onload = setDarkModePreference;

// Fungsi untuk mengatur mode gelap
function enableDarkMode() {
    document.documentElement.classList.add('dark');
    localStorage.setItem('dark-mode', 'dark');
    setActiveButton('darkModeButton');
}

// Fungsi untuk mengatur mode terang
function enableLightMode() {
    document.documentElement.classList.remove('dark');
    localStorage.setItem('dark-mode', 'light');
    setActiveButton('lightModeButton');
}

// Fungsi untuk mengatur tombol aktif
function setActiveButton(activeButtonId) {
    const lightModeButton = document.getElementById('lightModeButton');
    const darkModeButton = document.getElementById('darkModeButton');

    if (activeButtonId === 'lightModeButton') {
        lightModeButton.querySelector('a').classList.add('text-rose-600');
        darkModeButton.querySelector('a').classList.remove('text-rose-600');
    } else if (activeButtonId === 'darkModeButton') {
        darkModeButton.querySelector('a').classList.add('text-rose-600');
        lightModeButton.querySelector('a').classList.remove('text-rose-600');
    }
}
