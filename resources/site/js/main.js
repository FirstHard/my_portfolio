window.addEventListener("DOMContentLoaded", function () {
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

    /* const formSubject = document.getElementById("subject");
    formSubject.addEventListener("change", (item) => {
        let customSubjectInput = document.getElementById("customSubject");
        if (item.target.value === "custom") {
            customSubjectInput.classList.remove("d-none");
            customSubjectInput.setAttribute("required", "required");
        } else {
            customSubjectInput.classList.add("d-none");
            customSubjectInput.removeAttribute("required");
        }
    }); */

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
});
