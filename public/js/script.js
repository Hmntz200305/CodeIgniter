// SIDEBAR
const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');
const sidebarHidden = document.querySelectorAll('.sidebarHidden');
const sidebarCenter = document.querySelectorAll('.sidebarCenter');

toggleBtn.addEventListener('click', () => {
    const isNarrow = sidebar.offsetWidth === 92;
        sidebar.style.width = isNarrow ? '256px' : '92px';
        sidebarHidden.forEach(item => item.style.display = isNarrow ? '' : 'none');
        sidebarCenter.forEach(item => item.style.justifyContent = isNarrow ? '' : 'center');
});
