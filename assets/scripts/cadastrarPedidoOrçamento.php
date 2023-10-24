<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/modal.min.css">
        <title>Turn Motors</title>
    </head>
    <body>
        <?php
            require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
            require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o


            //passa as informações do forms para variaveis
            $dataForm = $_POST['data'];
            $horarioForm = (int) $_POST['horario'];
            $categoriaForm = $_GET['categoria'];
            $idCarro = $_POST['idCarro'];
            $idDono = $_SESSION['id']; //atribuindo o 'id' da sessão atual para a variável $id

            $sqlCarros = $pdo->query("SELECT * FROM `carro` WHERE `idVeiculo` = $idCarro");
            $registroCarro = $sqlCarros->fetchAll();

            $corCarro = $registroCarro[0]['cor'];
            $placa = $registroCarro[0]['placa'];


            //comando sql para inserção de dados do agendamento no banco
            $sqlInsertAgendamento = "INSERT INTO `pedido_orcamento` (`data`,`horario`,`corCarro`,`placaCarro`, `personalizacao`, `id_cliente` , `status`) VALUES ('$dataForm','$horarioForm','$corCarro','$placa', '$categoriaForm', '$idDono', 'em avaliação')";

            //preparando o bd para a inserção dos dados 
            $inserirDadosAgendamento = $pdo->prepare($sqlInsertAgendamento);

            //data formatada
            $dataFormatada = date_format(date_create($dataForm), 'd/m/Y');

            if ($inserirDadosAgendamento->execute() ) {
                $tituloModal = "Agendamento do orçamento cadastrado com sucesso!";
                $textoModal = "Venha em noss oficina no dia $dataFormatada às $horarioForm horas para realizar o orçamento de sua personalização. <br> Após a consulta em nossa oficina, entre na sua área de perfil e clique em 'Agendamentos Pendentes' para prosseguir com o pedido.";
                require_once('../components/modal.php');
            }
        ?>
    </body>
</html>