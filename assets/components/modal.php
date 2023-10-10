<dialog id="modal">
    <h1><?= $tituloModal ?></h1>
    <p><?= $textoModal ?></p>
    <button id="closeModal">Voltar</button>
</dialog>

<script>
    const modal = document.querySelector("#modal")
    const close = document.querySelector("#closeModal")

    window.addEventListener("load", () => {
        modal.showModal()
    })

    close.addEventListener("click" , ()=>{
        modal.close()
        const index = (window.location.pathname).split("/")
        let path = `${window.location.origin}/${index[1]}`
        path = path.replace("," , "/")
        window.location.href = path 
    })
</script>