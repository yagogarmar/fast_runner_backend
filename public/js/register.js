const username = document.getElementById("username")
const email = document.getElementById("email")
const password1 = document.getElementById("password1")
const password2 = document.getElementById("password2")

function register() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    if (password1.value === password2.value) {
        fetch("/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": csrfToken
            },
            body: JSON.stringify({
                username: username.value,
                email: email.value,
                password: password1.value
            })
        })
        .then(async response => {
            if (!response.ok) {
                const errorData = await response.json();
                console.error("Errores de validación:", errorData.errors);
                
                throw new Error("Validación fallida");
            }
            return response.json();
        })
        .then(data => {
            window.location = window.location.origin;
            console.log(data);
        })
        .catch(error => console.error("Error:", error));
    } else {
        console.log("Las contraseñas no coinciden");
    }
}
