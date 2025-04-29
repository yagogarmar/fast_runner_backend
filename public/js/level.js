
const numLevel = window.location.pathname.split('/')[2];
const cont_filas = document.getElementById('filas');
const usernameRecord = document.getElementById('usernameRecord');
const timeRecord = document.getElementById('timeRecord');
const pfp_record = document.getElementById('pfp_record');
const fecha_record = document.getElementById('fecha_record');

console.log(numLevel)

getData()
getRecord()


function getRecord() {
    fetch(`/time/record/${numLevel}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        }
    })
        .then(response => {
            if (response.status === 200) {
                return response.json();
            } else {
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            console.log("RECORD: ")
            console.log(data);

            usernameRecord.innerText = data.data.user.username;
            timeRecord.innerText = formatearTiempo(data.data.time);
            fecha_record.innerText = formatearFecha(data.data.created_at);
            pfp_record.src = data.data.user.pfp;
        })
        .catch(error => console.error("Error:", error));
}





function getData() {
    fetch(`/time/get/${numLevel}`, {
        method: "GET",
        headers: {
            "Content-Type": "application/json",
        }
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

            data.data.data.forEach(item => {
                const estructura = `
                    <div class="fila">
                        <div class="col-2">
                            <p>1</p>
                        </div>
                        <div class="col-4">
                            <img src="/img/pfp.png" alt="">
                            <p>${item.user.username}</p>
                        </div>
                        <div class="col-3">
                            <p>${formatearTiempo(item.time)}</p>
                        </div>
                        <div class="col-3">
                            <p>${formatearFecha(item.created_at)}</p>
                        </div>
                    </div>
              `;


                cont_filas.innerHTML += estructura

            });
        })
        .catch(error => console.error("Error:", error));
}


function formatearTiempo(ms) {
    const minutos = Math.floor(ms / 60000);
    const segundos = Math.floor((ms % 60000) / 1000);
    const milisegundos = ms % 1000;

    // Formateamos para que siempre tengan 2 dígitos (minutos y segundos) y 3 dígitos (milisegundos)
    const minutosStr = minutos.toString().padStart(2, '0');
    const segundosStr = segundos.toString().padStart(2, '0');
    const milisegundosStr = milisegundos.toString().padStart(3, '0');

    return `${minutosStr}:${segundosStr}:${milisegundosStr}`;
}

function formatearFecha(fechaIso) {
    const fecha = new Date(fechaIso);

    const dia = fecha.getDate().toString().padStart(2, '0');
    const mes = (fecha.getMonth() + 1).toString().padStart(2, '0'); // Ojo: enero = 0
    const anio = fecha.getFullYear();

    return `${dia}/${mes}/${anio}`;
}
