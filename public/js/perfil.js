const foto_pfp = document.getElementById('foto_pfp');


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

update_pfp()
function update_pfp() {
    foto_pfp.click()
}
foto_pfp.addEventListener('change', async function () {
    console.log('enviar');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const file = this.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('foto', file);

    try {
        const response = await fetch('/perfil/foto', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer TU_TOKEN_AQUI',
                'X-CSRF-TOKEN': csrfToken
            },
            body: formData
        });

        if (response.ok) {
            // Opcionalmente puedes mostrar un mensaje antes de recargar
            console.log('Foto subida correctamente');
            location.reload(); // 👉 recarga la página
        } else {
            const data = await response.json();
            console.error('Error en la subida:', data);
        }
    } catch (error) {
        console.error('Error subiendo la imagen:', error);
    }
});


getData(`/time/user`)


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

            const completed = item?.completed ? "<h3 class='yes'>YES</h3>" : "<h3>NO</h3>";


                const estructura = `
                    <div class="fila">
                        <div class="col-2 level_name_perfil" onclick="changeUrl('/levels/${item.level.id}')">
                            <h5>${item.level.name}</h5>
                        </div>
                        <div class="col-3">
                            <h3>${formatearTiempo(item.time)}</h3>
                        </div>
                        <div class="col-4">
                            <h3>${formatearFecha(item.created_at)}</h3>
                        </div>
                        <div class="col-3">
                            ${completed}
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
                paginador[i].setAttribute("onclick", `getData("/time/user?page=${num}")`);

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






