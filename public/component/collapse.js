(function() {
    var triggers = document.querySelectorAll("[data-collapse-target]");
    var collapses = document.querySelectorAll("[data-collapse]");
    var toggleButton = document.getElementById('toggleAll');
    var allOpen = false;

    if (triggers && collapses) {
        Array.from(triggers).forEach(function(trigger) {
            return Array.from(collapses).forEach(function(collapse) {
                if (trigger.dataset.collapseTarget === collapse.dataset.collapse) {
                    trigger.addEventListener("click", function() {
                        if (collapse.style.height && collapse.style.height !== "0px") {
                            collapse.style.height = 0;
                            collapse.style.overflow = "hidden";
                            trigger.removeAttribute("open");
                        } else {
                            collapse.style.height = "".concat(collapse.children[0].clientHeight, "px");
                            collapse.style.overflow = "visible";
                            trigger.setAttribute("open", "");
                        }
                    });
                }
            });
        });
    }

    toggleButton.addEventListener('click', function() {
        if (allOpen) {
            collapses.forEach(function(collapse) {
                collapse.style.height = 0;
                collapse.style.overflow = "hidden";
            });
            triggers.forEach(function(trigger) {
                trigger.removeAttribute("open");
            });
            toggleButton.textContent = "Open All";
        } else {
            collapses.forEach(function(collapse) {
                collapse.style.height = "".concat(collapse.children[0].clientHeight, "px");
                collapse.style.overflow = "visible";
            });
            triggers.forEach(function(trigger) {
                trigger.setAttribute("open", "");
            });
            toggleButton.textContent = "Close All";
        }
        allOpen = !allOpen;
    });
})();