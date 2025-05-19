const cont_filas = document.getElementById('filas');
const primera_pagina = document.getElementById('primera_pagina');
const ultima_pagina = document.getElementById('ultima_pagina');
const paginador = [document.getElementById('pag_1'),
document.getElementById('pag_2'),
document.getElementById('pag_3'),
document.getElementById('pag_4'),
document.getElementById('pag_5')] 


getData(`/global`)


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
            let peorValor = data.min;
            let mejorValor = data.max;

            console.log(data.min)

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
                            <p>${transformarPuntuacion(item.media_zscore, peorValor, mejorValor)}</p>
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
                paginador[i].setAttribute("onclick", `getData("/global?page=${num}")`);

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



function transformarPuntuacion(puntuacion, peorValor, mejorValor) {
  const invertida = -puntuacion;

  const invertidoPeor = -mejorValor; 
  const invertidoMejor = -peorValor;

  const normalizada = (invertida - invertidoPeor) / (invertidoMejor - invertidoPeor);

  return Math.round(normalizada * 1000);
}