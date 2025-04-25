console.log()

const numLevel = window.location.pathname.split('/')[2];








function getData(){
    fetch("/login", {
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
        window.location = window.location.origin + "/perfil"
        console.log(data);
    })
    .catch(error => console.error("Error:", error));
    
}
