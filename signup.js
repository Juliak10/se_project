document.addEventListener("DOMContentLoaded", () => {
    const signUpForm = document.querySelector("form");
    const firstNameInput = document.getElementById("fname");
    const lastNameInput = document.getElementById("lname");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput = document.getElementById("confirmpassword");
    const dobInput = document.getElementById("dob");
    const genderInput = document.getElementById("gender");
    const mobileInput = document.getElementById("mobile");
    const roleInput = document.getElementById("role");

    signUpForm.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (passwordInput.value !== confirmPasswordInput.value) {
            alert("Passwords do not match.");
            return;
        }

        const formData = {
            firstName: firstNameInput.value.trim(),
            lastName: lastNameInput.value.trim(),
            email: emailInput.value.trim(),
            password: passwordInput.value.trim(),
            dob: dobInput.value,
            gender: genderInput.value,
            mobile: mobileInput.value.trim(),
            role: roleInput.value,
        };

        try {
            // Simulate a backend API call (Replace URL with your actual backend endpoint)
            const response = await fetch("https://example.com/api/signup", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify(formData),
            });

            const data = await response.json();

            if (response.ok) {
                alert("Sign-up successful! Please log in.");
                window.location.href = "profile.html"; 
            } else {
                alert(data.message || "Sign-up failed. Please try again.");
            }
        } catch (error) {
            console.error("Error during sign-up:", error);
            alert("An error occurred. Please check your internet connection and try again.");
        }
    });
});
