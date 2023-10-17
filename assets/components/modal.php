<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/modal.min.css">
        <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
        <title>Turn Motors</title>
    </head>
    <body>
        <dialog id="modal">
            <h1 id="modal__titulo"><?= $tituloModal ?></h1>
            <p id="modal__texto"><?= $textoModal ?></p>
            <div class="div__btn">
                <button id="closeModal">Voltar</button>
            </div>
        </dialog>
    </body>
</html>


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