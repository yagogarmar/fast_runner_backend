
const username = document.getElementById("username")
const password = document.getElementById("password")
const error = document.getElementById("mensaje_error")

function login() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    if(username.value && username.value){
        error.style.visibility = "hidden";
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
                if(response.status == 401){
                    error.innerText = "La contraseña o el usuario son incorrectos"
                }else{
                    error.innerText = "Ha ocurrido un error inesperado"
                }
                
                error.style.visibility = "visible";
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            window.location = window.location.origin;
            console.log(data);
        })
        .catch(error => console.error("Error:", error));
    }else{
            error.innerText = "Complete todos dos campos"
            error.style.visibility = "visible";
    }
    

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