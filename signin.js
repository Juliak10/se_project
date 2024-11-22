document.addEventListener("DOMContentLoaded", () => {
    const signInButton = document.querySelector(".btn");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");

    signInButton.addEventListener("click", async (e) => {
        e.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (!email || !password) {
            alert("Please fill in both email and password fields.");
            return;
        }

        const payload = {
            email: email,
            password: password,
        };
    });
});
