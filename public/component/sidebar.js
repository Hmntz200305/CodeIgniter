document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarHidden = document.querySelectorAll('.sidebarHidden');
    const sidebarCenter = document.querySelectorAll('.sidebarCenter');
    const sidebarUl = document.querySelectorAll('.sidebarUl');
    const iconCenter = document.querySelectorAll('.iconCenter');
    const toggleBtn = document.getElementById('toggleBtn');
    
    function resizeSidebar() {
        
        if (window.innerWidth <= 900) {
            sidebar.style.width = '92px';

            sidebarHidden.forEach(element => {
                element.classList.add('hidden');
            });

            iconCenter.forEach(element => {
                element.classList.add('justify-center');
            });

            sidebarCenter.forEach(element => {
                element.classList.remove('ml-[18px]');
                element.classList.add('justify-center');
            });

            sidebarUl.forEach(element => {
                element.classList.add('rounded-l-xl');
                element.classList.remove('rounded-xl');
            });

        } else {
            sidebar.style.width = '256px';

            sidebarHidden.forEach(element => {
                element.classList.remove('hidden');
            });

            iconCenter.forEach(element => {
                element.classList.remove('justify-center');
            });

            sidebarCenter.forEach(element => {
                element.classList.remove('justify-center');
                element.classList.add('ml-[18px]');
            });

            sidebarUl.forEach(element => {
                element.classList.remove('rounded-l-xl');
                element.classList.add('rounded-xl');
            });
        }
    }

    resizeSidebar();
    window.addEventListener('resize', resizeSidebar);

    toggleBtn.addEventListener('click', function() {
        sidebar.style.width = sidebar.style.width === '92px' ? '256px' : '92px';
        
        sidebarHidden.forEach(element => {
            element.classList.toggle('hidden');
        });

        iconCenter.forEach(element => {
            element.classList.toggle('justify-center');
        });

        sidebarCenter.forEach(element => {
            if (sidebar.style.width === '92px') {
                element.classList.remove('ml-[18px]');
                element.classList.add('justify-center');
                element.classList.add('justify-center');
            } else {
                element.classList.remove('justify-center');
                element.classList.add('ml-[18px]');
            }
        });

        sidebarUl.forEach(element => {
            if (sidebar.style.width === '92px') {
                element.classList.add('rounded-l-xl');
                element.classList.remove('rounded-xl');
            } else {
                element.classList.remove('rounded-l-xl');
                element.classList.add('rounded-xl');
            }
        });
    });
});

