document.querySelector("form").addEventListener("submit", function(e) {
    const fullname = document.getElementById("fullname").value.trim();
    const email = document.getElementById("email").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const dob = document.getElementById("dob").value;
    const gender = document.querySelector('input[name="gender"]:checked');
    const address = document.getElementById("address").value.trim();
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;
    const termsChecked = document.getElementById("newsletter").checked;

    let errors = [];

    if (fullname === "") errors.push("Full Name is required.");
    if (email === "") {
        errors.push("Email is required.");
    } else {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) errors.push("Invalid email format.");
    }

    if (phone === "") {
        errors.push("Phone number is required.");
    } else {
        const phoneRegex = /^[0-9]{10,15}$/;
        if (!phoneRegex.test(phone)) errors.push("Phone number must be 10 to 15 digits.");
    }

    if (dob === "") errors.push("Date of Birth is required.");
    if (!gender) errors.push("Please select your gender.");
    if (address === "") errors.push("Address is required.");
    if (username === "") errors.push("Username is required.");
    if (password === "") errors.push("Password is required.");
    if (confirmPassword === "") errors.push("Please confirm your password.");
    if (password !== confirmPassword) errors.push("Passwords do not match.");
    if (!termsChecked) errors.push("You must agree to the terms of service.");

    if (errors.length > 0) {
        e.preventDefault(); // Prevent form submission
        alert(errors.join("\n"));
    }
});