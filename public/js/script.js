// SIDEBAR
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarHiddenElements = document.querySelectorAll('.sidebarHidden');
    const sidebarCenterElements = document.querySelectorAll('.sidebarCenter');
    const iconCenter = document.querySelectorAll('.iconCenter');
    const toggleBtn = document.getElementById('toggleBtn');

    toggleBtn.addEventListener('click', function() {
        sidebar.style.width = sidebar.style.width === '92px' ? '256px' : '92px';
        
        sidebarHiddenElements.forEach(element => {
            element.classList.toggle('hidden');
        });

        iconCenter.forEach(element => {
            element.classList.toggle('justify-center');
        });

        sidebarCenterElements.forEach(element => {
            if (sidebar.style.width === '92px') {
                element.classList.remove('ml-[18px]');
                element.classList.add('justify-center');
            } else {
                element.classList.remove('justify-center');
                element.classList.add('ml-[18px]');
            }
        });
    });
});



const toggleSuccessNotif = (message) => {
    const $successNotif = $('#successNotif');
    if ($successNotif.hasClass('hidden')) {
        $successNotif.removeClass('hidden');
        document.getElementById("successMessage").textContent = message;
        $successNotif.removeClass('slide-out');
        $successNotif.addClass('slide-in');

        setTimeout(() => {
            $successNotif.removeClass('slide-in');
            $successNotif.addClass('slide-out');
            setTimeout(() => {
                $successNotif.addClass('hidden');
            }, 500);
        }, 3000);
    } else {
        $successNotif.removeClass('slide-in');
        $successNotif.addClass('slide-out');
        setTimeout(() => {
            $successNotif.addClass('hidden');
        }, 500);
    }
}

const toggleFailedNotif = (message) => {
    const $failedNotif = $('#failedNotif');
    if ($failedNotif.hasClass('hidden')) {
        $failedNotif.removeClass('hidden');
        document.getElementById("errorMessage").textContent = message;
        $failedNotif.removeClass('slide-out');
        $failedNotif.addClass('slide-in');

        setTimeout(() => {
            $failedNotif.removeClass('slide-in');
            $failedNotif.addClass('slide-out');
            setTimeout(() => {
                $failedNotif.addClass('hidden');
            }, 500);
        }, 3000);
    } else {
        $failedNotif.removeClass('slide-in');
        $failedNotif.addClass('slide-out');
        setTimeout(() => {
            $failedNotif.addClass('hidden');
        }, 500);
    }
}

const toggleWarningNotif = (message) => {
    const $warningNotif = $('#warningNotif');
    if ($warningNotif.hasClass('hidden')) {
        $warningNotif.removeClass('hidden');
        document.getElementById("warningMessage").textContent = message;
        $warningNotif.removeClass('slide-out');
        $warningNotif.addClass('slide-in');

        setTimeout(() => {
            $warningNotif.removeClass('slide-in');
            $warningNotif.addClass('slide-out');
            setTimeout(() => {
                $warningNotif.addClass('hidden');
            }, 500);
        }, 3000);
    } else {
        $warningNotif.removeClass('slide-in');
        $warningNotif.addClass('slide-out');
        setTimeout(() => {
            $warningNotif.addClass('hidden');
        }, 500);
    }
}


const logoutButton = document.getElementById('logoutButton');
    const popover = document.getElementById('popover');
    const overlay = document.getElementById('overlay');

    logoutButton.addEventListener('click', (event) => {
        event.stopPropagation();
        popover.classList.toggle('hidden');
        overlay.classList.toggle('hidden');
    });

    document.addEventListener('click', (event) => {
        const isClickInside = logoutButton.contains(event.target) || popover.contains(event.target);
        if (!isClickInside) {
            popover.classList.add('hidden');
            overlay.classList.add('hidden');
        }
    });

    popover.addEventListener('click', (event) => {
        event.stopPropagation();
    });