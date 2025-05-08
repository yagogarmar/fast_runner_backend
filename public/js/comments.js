const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const text_area_comment = document.getElementById("text_area_comment");
const cont_comentarios = document.getElementById("comentarios");






text_area_comment.addEventListener('keydown', function(event) {
    if (event.key === 'Enter' || event.keyCode === 13) {
        event.preventDefault();

        sendComment()
        
    }
});



function sendComment() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    fetch("/comment", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({
            level_id: numLevel,
            parent_id: null,
            content: text_area_comment.value,
        })
    })
        .then(response => {
            if (response.status === 201) {

                return response.json();
            } else {
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            text_area_comment.value = "";
            cont_comentarios.insertAdjacentHTML(
                'afterbegin', 
                `<div class="comentario_compelto">
                    <div class="comentario">
                        <div class="info_user_comentario">
                            <img src="${data.comment.user.pfp}" alt="">
                            <h2>${data.comment.user.username}</h2>
                            <p>${data.comment.time_string}</p>
                        </div>
                        <p>${data.comment.content}</p>
                    </div>
                </div>`
              );


            console.log(data);
        })
        .catch(error => console.error("Error:", error));

}



function clicButtonResponder(id_cont, pfp_url, comment_id){
    const container_coment = document.getElementById(id_cont);
    const validar_campo = document.getElementById(id_cont);

    container_coment.insertAdjacentHTML(
        'afterend', 
        `<div class="cont_text_area_respuesta" id="cont_respuesta_enviar">
            <div class="linea_replie"></div>
            <div class="cont_text_area">
                <img src="${pfp_url}" alt="" class="pfp_enviar_comentario">
                <div>
                    <textarea name="" id="text_area_replie"  oninput="autoExpand(this)"></textarea>
                    <button onclick="sendReplie(${comment_id}, '${id_cont}')" class="button_enviar_coment">COMENTAR</button>
                </div>
            </div>
        </div>`
      );

    const text_area_replie = document.getElementById("text_area_replie");
    text_area_replie.focus();

    text_area_replie.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.keyCode === 13) {
            event.preventDefault();
    
            sendReplie(comment_id, id_cont)
            
        }
    });
    
    
    
}



function sendReplie(id, id_cont) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const text_area_replie = document.getElementById("text_area_replie");
    const cont_respuesta_enviar = document.getElementById("cont_respuesta_enviar");
    const container_coment = document.getElementById(id_cont);

    fetch("/comment", {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken
        },
        body: JSON.stringify({
            level_id: numLevel,
            parent_id: id,
            content: text_area_replie.value,
        })
    })
        .then(response => {
            if (response.status === 201) {

                return response.json();
            } else {
                throw new Error(`Error en la respuesta: ${response.status} ${response.statusText}`);
            }
        })
        .then(data => {
            cont_respuesta_enviar.remove();
            
            container_coment.insertAdjacentHTML(
                'afterend', 
                `<div class="cont_replie">
                        <div class="linea_replie "></div>
                        <div class="replie">
                            <div class="info_user_comentario">
                                <img src="${data.comment.user.pfp}" alt="">
                                <h2>${data.comment.user.username}</h2>
                                <p>${data.comment.time_string}</p>
                            </div>
                            <p>${data.comment.content}</p>
                        </div>
                        
                    </div>`
              );
        

            console.log(data);
        })
        .catch(error => console.error("Error:", error));

}



function hideReplies(id){
    const replies = document.querySelectorAll(id);
    const button_show = document.getElementById(id);
    button_show.style.display = "block";
    replies.forEach(element => {
        element.style.display = "none";
    });
    
}

function showReplies(id){
    const replies = document.querySelectorAll(id);
    const button_show = document.getElementById(id);
    button_show.style.display = "none";
    replies.forEach(element => {
        element.style.display = "flex";
    });
    
}