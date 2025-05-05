const username = document.getElementById("username")
const password1 = document.getElementById("password1")
const password2 = document.getElementById("password2")

function register() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch("/register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({
            username: username.value,
            password: password.value
        })
    })
        .then(response => {
            if (response.status === 200) {
                return response.json();
            } else {
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            window.location = window.location.origin;
            console.log(data);
        })
        .catch(error => console.error("Error:", error));

}