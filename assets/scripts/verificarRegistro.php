    <?php
    require_once('./conexao.php');

    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $senhaFormatada = md5($senhaForm);

    $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.email='$emailForm' && cliente.senha='$senhaFormatada'");
    $quantidadeRegistrosCliente = $sqlCliente->rowCount();
    $registroCliente = $sqlCliente->fetchAll();

    $sqlFuncionario = $pdo->query("SELECT * FROM `funcionario` WHERE funcionario.email='$emailForm' && funcionario.senha='$senhaFormatada'");
    $quantidadeRegistrosFuncionario = $sqlFuncionario->rowCount();
    $registroFuncionario = $sqlFuncionario->fetchAll();


    if ($quantidadeRegistrosCliente == 1) {
        require_once('./iniciarSessao.php');

        $_SESSION['nomeCliente'] = $registroCliente[0]['nomeCompleto'];
        $_SESSION['plano'] = $registroCliente[0]['plano'];
        $_SESSION['quantidadePontos'] = $registroCliente[0]['quantidadePontos'];
        $_SESSION['fotoPerfil'] = $registroCliente[0]['fotoPerfil'];
    }

    if($quantidadeRegistrosFuncionario == 1){
        require_once('./iniciarSessao.php');
        $_SESSION['rf'] = $registroFuncionario[0]['rf'];
        $_SESSION['nomeFuncionario'] = $registroFuncionario[0]['nome'];
    }