
const foto_pfp = document.getElementById('foto_pfp');

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
