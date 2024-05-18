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

$(document).ready(function() {
    function showPopover(button, popover) {
        var sidebar = $('#sidebar');
        if (sidebar.width() === 92) {
            var buttonOffset = button.offset();
            var buttonWidth = button.outerWidth();

            popover.css({
                top: buttonOffset.top,
                left: buttonOffset.left + buttonWidth
            }).removeClass('opacity-0 pointer-events-none').addClass('opacity-100');
        }
    }

    function hidePopover(popover) {
        popover.removeClass('opacity-100').addClass('opacity-0 pointer-events-none');
    }

    $('#popoverToggleDashboard').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentDashboard'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentDashboard'));
    });

    $('#popoverToggleAlternative').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentAlternative'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentAlternative'));
    });

    $('#popoverToggleCriteria').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentCriteria'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentCriteria'));
    });

    $('#popoverToggleAssessment').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentAssessment'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentAssessment'));
    });

    $('#popoverToggleCalculation').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentCalculation'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentCalculation'));
    });

    $('#popoverToggleDecission').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentDecission'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentDecission'));
    });

    $('#popoverToggleHistory').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentHistory'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentHistory'));
    });

    $('#popoverToggleUsers').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentUsers'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentUsers'));
    });

    $('#popoverToggleLogout').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentLogout'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentLogout'));
    });

    $('#lightModeButton').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentLight'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentLight'));
    });

    $('#darkModeButton').on('mouseenter', function() {
        showPopover($(this), $('#popoverContentDark'));
    }).on('mouseleave', function() {
        hidePopover($('#popoverContentDark'));
    });
});


$(document).ready(function() {
    $('#menu-1').on('change', function() {
        if ($(this).is(':checked')) {
            $('.ri-dropdown-list').css('transform', 'rotateX(180deg)');
        } else {
            $('.ri-dropdown-list').css('transform', 'rotateX(0deg)');
        }
    });
});