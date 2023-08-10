window.addEventListener("DOMContentLoaded", function () {
    // Get the parent block with the "navbar" class
    let navbar = document.querySelector(".navbar");

    // Get all menu items
    let menuItems = document.querySelectorAll(".scrollto");

    // Process a click on each menu item
    menuItems.forEach((item) => {
        item.addEventListener("click", smoothScroll);
    });

    // Function for smooth scrolling to the anchor with offset
    function smoothScroll(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        // Remove "active" class from all menu items
        menuItems.forEach((item) => {
            item.classList.remove("active");
        });

        this.classList.add("active");

        let targetId = this.getAttribute("href"); // Get the value of the href attribute

        // Get the target element using the href value
        let targetElement = document.querySelector(targetId);

        // Get the current height of the parent block
        let navbarHeight = navbar.offsetHeight;

        // Get the target element's top offset position with the offset
        let targetOffset =
            targetElement.getBoundingClientRect().top +
            window.scrollY -
            navbarHeight;

        // Use scrollIntoView method for smooth scrolling to the anchor with the offset
        window.scrollTo({
            top: targetOffset,
            behavior: "smooth",
        });
    }

    function highlightMenu() {
        const scrollPosition = window.scrollY;
        const sectionIds = Array.from(menuItems).map((item) =>
            item.getAttribute("href").slice(1)
        );
        if (sectionIds) {
            const sections = sectionIds.map((id) =>
                document.getElementById(id)
            );
            const navbarHeight = navbar.offsetHeight; // Height of navbar

            for (let i = 0; i < sections.length; i++) {
                const section = sections[i];
                if (section) {
                    // Проверка на существование элемента
                    const computedStyle = getComputedStyle(section, null);
                    const sectionTop =
                        section.offsetTop -
                        parseFloat(computedStyle.marginTop) -
                        navbarHeight;

                    if (scrollPosition >= sectionTop) {
                        // Remove the "active" class from all menu items
                        for (let j = 0; j < menuItems.length; j++) {
                            menuItems[j].classList.remove("active");
                            menuItems[j].blur();
                        }

                        // Add the "active" class only for the current menu item
                        const targetMenuItem = menuItems[i];
                        targetMenuItem.classList.add("active");
                    }
                }
            }
        }
    }

    // Add event listener on scroll
    window.addEventListener("scroll", highlightMenu);
    let gridContainer = document.querySelector(".portfolio-container");
    let gridItems = document.querySelectorAll(".work");
    let filterItems = document.querySelectorAll(".portfolio-filter>li");
    let column_width;

    function updateColumnWidth() {
        column_width = document.querySelector(".work").offsetWidth;
        return column_width;
    }

    window.addEventListener("resize", updateColumnWidth);

    let masonryInstance = new Masonry(gridContainer, {
        itemSelector: ".work",
        layoutMode: "masonry",
        columnWidth: updateColumnWidth() - 0.3,
    });
    masonryInstance.layout();

    // Обработчик события клика на фильтры
    filterItems.forEach(function (item) {
        item.addEventListener("click", function (e) {
            e.preventDefault();
            const activeFilter = document.querySelector(
                ".portfolio-filter li.active"
            );
            activeFilter.classList.remove("active");
            this.classList.add("active");
            const selector = this.getAttribute("data-filter");

            // Фильтрация элементов
            gridItems.forEach(function (item) {
                const tags = item.getAttribute("data-tags");
                if (selector === "*" || tags.includes(selector) === true) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });

            // Обновление элементов Masonry
            masonryInstance.reloadItems();
            masonryInstance.layout();

            return false;
        });
    });

    let modals = document.querySelectorAll(".modal");

    modals.forEach(function (modal) {
        modal.addEventListener("click", (event) => {
            let target = event.target;
            let modalDialog = target.closest(".modal-dialog");

            // Проверяем, что кликнули на ссылку внутри модального окна и не внутри карусели
            if (
                modalDialog &&
                !target.hasAttribute("data-bs-dismiss") &&
                !target.closest(".carousel")
            ) {
                event.preventDefault();

                // Проверяем, есть ли атрибут target="_blank"
                let isBlankTarget = target.getAttribute("target") === "_blank";

                // Дальнейшие действия, такие как переход по ссылке
                if (isBlankTarget) {
                    window.open(target.getAttribute("href"));
                } else {
                    window.location.href = target.getAttribute("href");
                }

                // Закрытие текущего модального окна
                let bootstrapModal = bootstrap.Modal.getInstance(modal);
                bootstrapModal.hide();
            }
        });
    });

    const formSubject = document.getElementById("subject");
    formSubject.addEventListener("change", (item) => {
        let customSubjectInput = document.getElementById("customSubject");
        if (item.target.value === "custom") {
            customSubjectInput.classList.remove("d-none");
            customSubjectInput.setAttribute("required", "required");
        } else {
            customSubjectInput.classList.add("d-none");
            customSubjectInput.removeAttribute("required");
        }
    });

    var orderBtns = document.querySelectorAll(".btn-order-site");
    orderBtns.forEach((orderBtn) => {
        orderBtn.addEventListener("click", (event) => {
            event.preventDefault();

            var modal = event.target.closest(".modal");
            var modalTitle = modal
                .querySelector(".modal-title")
                .textContent.trim();

            var selectElement = document.querySelector("#contact select");

            var newOption = document.createElement("option");
            newOption.value = "orderSite";
            newOption.text = "I want to order a site like this: " + modalTitle;
            newOption.selected = true;

            selectElement.appendChild(newOption);

            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.hide();

            var contactElement = document.querySelector("#contact");
            contactElement.scrollIntoView({ behavior: "smooth" });
        });
    });

    const collapseHobby = document.querySelector("#collapseHobby");
    const collapseButton = document.querySelector("#collapseHobbyButton");
    const readMoreSpan = collapseButton.querySelectorAll(".read-more-text")[0];
    const hideMoreSpan = collapseButton.querySelectorAll(".hide-text")[0];

    collapseHobby.addEventListener("show.bs.collapse", (event) => {
        readMoreSpan.classList.add("d-none");
        hideMoreSpan.classList.remove("d-none");
    });

    collapseHobby.addEventListener("hide.bs.collapse", (event) => {
        readMoreSpan.classList.remove("d-none");
        hideMoreSpan.classList.add("d-none");
    });

    /* document
        .getElementById("contactForm")
        .addEventListener("submit", function (event) {
            event.preventDefault();

            grecaptcha.ready(function () {
                grecaptcha
                    .execute("6LcZCrkbAAAAAM2jsXfhjwi1CjR2lMr2PXUgHiL6", {
                        action: "submit",
                    })
                    .then(function (token) {
                        var hiddenInput = document.createElement("input");
                        hiddenInput.type = "hidden";
                        hiddenInput.name = "g-recaptcha-response";
                        hiddenInput.value = token;

                        var form = document.getElementById("contactForm");
                        form.insertBefore(hiddenInput, form.firstChild);
                        form.removeEventListener("submit", this);
                        form.submit();
                    });
            });
        }); */
});
