
const username = document.getElementById("username")
const password = document.getElementById("password")

function login() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch("/login", {
        method: "POST",
        headers: {
            "Accept": "application/json",
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

function logout() {
    fetch("/logout", {
        method: "GET"
    })
        .then(response => {
            if (response.status === 200) {
                return response.json();
            } else {
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error("Error:", error));
}