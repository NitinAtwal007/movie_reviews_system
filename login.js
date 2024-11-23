const body = document.querySelector("body");
const modal = document.querySelector(".modal");
const modalButton = document.querySelector(".modal-button");
const closeButton = document.querySelector(".close-button");
const scrollDown = document.querySelector(".scroll-down");
let isOpened = false;

const openModal = () => {
    modal.classList.add("is-open");
    body.style.overflow = "hidden";
};

const closeModal = () => {
    modal.classList.remove("is-open");
    body.style.overflow = "initial";
};

window.addEventListener("scroll", () => {
    if (window.scrollY > window.innerHeight / 3 && !isOpened) {
        isOpened = true;
        scrollDown.style.display = "none";
        openModal();
    }
});

modalButton.addEventListener("click", openModal);
closeButton.addEventListener("click", closeModal);

document.onkeydown = evt => {
    evt = evt || window.event;
    if (evt.keyCode === 27) closeModal(); // Escape key
};

// Add event listener to the login button to handle form submission
document.querySelector(".input-button").addEventListener("click", (e) => {
    e.preventDefault();
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Simple validation (you can enhance this)
    if (email && password) {
        alert(`Logging in as ${email}`);
        // Add your login logic here
    } else {
        alert("Please fill in both fields.");
    }
});
