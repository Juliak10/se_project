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

        try {
            // Simulate a backend API call (Replace URL with your backend endpoint)
            const response = await fetch("https://example.com/api/signin", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(payload),
            });

            const data = await response.json();

            if (response.ok) {
                
                alert("Sign-in successful!");
                window.location.href = "profile.html"; 
            } else {
                
                alert(data.message || "Sign-in failed. Please try again.");
            }
        } catch (error) {
            console.error("Error during sign-in:", error);
            alert("An error occurred. Please check your internet connection and try again.");
        }
    });
});
