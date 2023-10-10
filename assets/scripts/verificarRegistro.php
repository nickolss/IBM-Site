    <?php
    require_once('./conexao.php');
    
    

    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $senhaFormatada = md5($senhaForm);

    $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE email='$emailForm' && senha='$senhaFormatada'");
    $quantidadeRegistrosCliente = $sqlCliente->rowCount();
    $registroCliente = $sqlCliente->fetchAll();

    $sqlFuncionario = $pdo->query("SELECT * FROM `funcionario` WHERE email='$emailForm' && senha='$senhaFormatada'");
    $quantidadeRegistrosFuncionario = $sqlFuncionario->rowCount();
    $registroFuncionario = $sqlFuncionario->fetchAll();


    if ($quantidadeRegistrosCliente == 1) {
        if (isset($_SESSION)) {
            require_once('./logout.php');
        }

        require_once('./iniciarSessao.php');


        $_SESSION['id'] = $registroCliente[0]['id'];
        $_SESSION['nomeCliente'] = $registroCliente[0]['nomeCompleto'];
        $_SESSION['email'] = $registroCliente[0]['email'];
        $_SESSION['telefone'] = $registroCliente[0]['telefone'];
        $_SESSION['dataNasc'] = $registroCliente[0]['dataNasc'];
        $_SESSION['cpf'] = $registroCliente[0]['cpf'];

        $_SESSION['plano'] = $registroCliente[0]['plano'];
        $_SESSION['quantidadePontos'] = $registroCliente[0]['quantidadePontos'];
        $_SESSION['fotoPerfil'] = $registroCliente[0]['fotoPerfil'];

        header('Location: ../../pags/perfil.php');
    } else {
        $tituloModal = "Erro ao Logar!";
        $textoModal = "Email ou senha inválidos, tente novamente";
        require_once("../components/modal.php");
    }
    
    if ($quantidadeRegistrosFuncionario == 1) {
        if (isset($_SESSION)) {
            require_once('./logout.php');
        }
        require_once('./iniciarSessao.php');

        $_SESSION['rf'] = $registroFuncionario[0]['rf'];
        $_SESSION['nomeFuncionario'] = $registroFuncionario[0]['nome'];

        header("Location: ../../administrador/dashboard.php");
    }