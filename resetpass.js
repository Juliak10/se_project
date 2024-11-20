document.addEventListener("DOMContentLoaded", () => {
    const resetButton = document.querySelector(".btn");
    const emailInput = document.querySelector("input[type='email']");

    resetButton.addEventListener("click", async (e) => {
        e.preventDefault();

        const email = emailInput.value.trim();

        // Validate email format
        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        try {
            // Simulate a backend API call (Replace URL with your backend endpoint)
            const response = await fetch("https://example.com/api/reset-password", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ email }),
            });

            const data = await response.json();

            if (response.ok) {
                alert("A password reset link has been sent to your email.");
            } else {
                alert(data.message || "Failed to send reset link. Please try again.");
            }
        } catch (error) {
            console.error("Error during password reset:", error);
            alert("An error occurred. Please check your internet connection and try again.");
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});
