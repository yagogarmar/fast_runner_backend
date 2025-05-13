
const numLevel = window.location.pathname.split('/')[2];
const cont_filas = document.getElementById('filas');
const usernameRecord = document.getElementById('usernameRecord');
const timeRecord = document.getElementById('timeRecord');
const pfp_record = document.getElementById('pfp_record');
const fecha_record = document.getElementById('fecha_record');
const primera_pagina = document.getElementById('primera_pagina');
const ultima_pagina = document.getElementById('ultima_pagina');
const paginador = [document.getElementById('pag_1'),
document.getElementById('pag_2'),
document.getElementById('pag_3'),
document.getElementById('pag_4'),
document.getElementById('pag_5')]

const spinner = document.getElementById('spinner');


let current_page = 0;
console.log(numLevel)

getData(`/time/get/${numLevel}`)
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


function autoExpand(textarea) {
    textarea.style.height = 'auto'; // reinicia el alto
    textarea.style.height = textarea.scrollHeight + 'px'; // lo ajusta al contenido
}


function getData(url) {
    cont_filas.innerHTML = "";
    console.log(url)
    fetch(url, {
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


            current_page = data.data.current_page;

            let top_iterator = current_page * 5 - 5;


            data.data.data.forEach(item => {
                top_iterator++;
                const estructura = `
                    <div class="fila">
                        <div class="col-2">
                            <h2 class="num_top" >${top_iterator}</h2>
                        </div>
                        <div onclick="changeUrl('/perfil/${item.user.username}')" class="col-4 cont_pfp_usuario_tabla" >
                            <img class="img_intento" src="${item.user.pfp}" alt="">
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

            ultima_pagina.setAttribute("onclick", `getData("${data.data.last_page_url}")`);
            primera_pagina.setAttribute("onclick", `getData("${data.data.first_page_url}")`);



            let resultado = [];

            if (current_page === 1) {
                // Caso especial: principio
                for (let i = 1; i <= Math.min(5, data.data.last_page); i++) {
                    resultado.push(i);
                }
            } else if (current_page === 2) {
                // Casi al principio
                for (let i = 1; i <= Math.min(5, data.data.last_page); i++) {
                    resultado.push(i);
                }
            } else if (current_page === data.data.last_page) {
                // Caso especial: final
                for (let i = current_page - 4; i <= current_page; i++) {
                    if (i >= 1) resultado.push(i);
                }
            } else if (current_page === data.data.last_page - 1) {
                // Penúltimo número
                for (let i = current_page - 3; i <= current_page + 1; i++) {
                    if (i >= 1 && i <= data.data.last_page) resultado.push(i);
                }
            } else {
                // Caso general
                for (let i = current_page - 2; i <= current_page + 2; i++) {
                    if (i >= 1 && i <= data.data.last_page) resultado.push(i);
                }
            }

            paginador.forEach(pag => {
                pag.className = "esfera_paginador2";
            })

            let i = 0;
            resultado.forEach(num => {

                paginador[i].children[0].textContent = num;
                paginador[i].setAttribute("onclick", `getData("/time/get/${numLevel}?page=${num}")`);

                if (data.data.current_page == num) {
                    paginador[i].className = "esfera_paginador"
                }


                i++
            })

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


function changeUrl(url){
    window.location = window.origin + url;
}




