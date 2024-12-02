window.addEventListener("load", () => {
    const labels = document.querySelectorAll(
        "#room-selector label"
    );
    const form = document.querySelector("#form");

    for (var element of labels) {
        element.addEventListener("click", handleSelectorClick);
    }

    form.addEventListener("submit", handleFormSubmit);
});

const handleSelectorClick = (e) => {
    for (var siblings of e.target.parentElement.children) {
        siblings.classList.remove("grow-selector");
    }

    e.target.classList.add("grow-selector");
}

const handleFormSubmit = (e) => {
    e.preventDefault();

    const fields = [];

    fields.push(document.querySelector("#fullname"));
    fields.push(document.querySelector("#email"));
    fields.push(document.querySelector("#check-in"));

    // if at least one of the fields == "empty" - error
    let error = fields.some(f => f.value.trim() === "");

    if (error) {
        Toastify({
            text: "Error: please fill in all fields!",
            duration: 3000,
            style: {
                background: "#1a92bedb",
                color: "#ffffff"
            }
        }).showToast();
    } else {
        Toastify({
            text: "Awesome! Keep an eye on your email for further info.",
            duration: 3000,
            style: {
                background: "#7FA98E"
            }
        }).showToast();
        clearForm();
    }
}

const clearForm = () => {
    // Clears form fields
    document.querySelector("#form").reset();

    // Resets custom room selector field
    document.querySelectorAll("#room-selector label")
        .forEach((f) => {
            f.classList.remove("grow-selector");
        });
    
    document.querySelector("#room-selector > label:nth-child(1)")
        .classList.add("grow-selector");
}