document.getElementById("register").addEventListener("submit", function(e) {
    e.preventDefault();
    const username = document.getElementById("reg-username").value;
    const email = document.getElementById("reg-email").value;
    const password = document.getElementById("reg-password").value;

    fetch("auth.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            action: "register",
            username: username,
            email: email,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("register-message").textContent = data.message;
    });
});

document.getElementById("login").addEventListener("submit", function(e) {
    e.preventDefault();
    const username = document.getElementById("login-username").value;
    const password = document.getElementById("login-password").value;

    fetch("auth.php", {
        method: "POST",
        headers: {
            'Content-Type': "application/json",
        },
        body: JSON.stringify({
            action: "login",
            username: username,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("login-message").textContent = data.message;
        if (data.status === "success") {
            localStorage.setItem("authToken", data.token);
        }
    });
});
