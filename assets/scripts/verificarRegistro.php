    <?php
    require_once('./conexao.php');

    $emailForm = $_POST['email'];
    $senhaForm = $_POST['senha'];
    $senhaFormatada = md5($senhaForm);

    $sqlCliente = $pdo->query("SELECT * FROM `cliente` WHERE cliente.email='$emailForm' && cliente.senha='$senhaForm'");
    $quantidadeRegistrosCliente = $sqlCliente->rowCount();
    $registroCliente = $sqlCliente->fetchAll();

    $sqlFuncionario = $pdo->query("SELECT * FROM `funcionario` WHERE funcionario.email='$emailForm' && funcionario.senha='$senhaForm'");
    $quantidadeRegistrosFuncionario = $sqlFuncionario->rowCount();
    $registroFuncionario = $sqlFuncionario->fetchAll();


    if ($quantidadeRegistrosCliente == 1) {
        require_once('./logout.php');
        require_once('./iniciarSessao.php');
        
        $_SESSION['nomeCliente'] = $registroCliente[0]['nomeCompleto'];
        $_SESSION['plano'] = $registroCliente[0]['plano'];
        $_SESSION['quantidadePontos'] = $registroCliente[0]['quantidadePontos'];
        $_SESSION['fotoPerfil'] = $registroCliente[0]['fotoPerfil'];
        header("Location: ../../pags/login.php");
    }else{
        echo "<script>
            alert('Email ou Senha incorretos.');
            setInterval( function() {
                window.location.href = 'http://localhost/IBM-Site/pags/login.php'
            }, 1000)
        </script>";
    }

    if ($quantidadeRegistrosFuncionario == 1) {
        require_once('./logout.php');
        require_once('./iniciarSessao.php');

        $_SESSION['rf'] = $registroFuncionario[0]['rf'];
        $_SESSION['nomeFuncionario'] = $registroFuncionario[0]['nome'];
        header("Location: ../../pags/login.php");
    }else{
        echo "<script>
            alert('Email ou Senha incorretos.');
            setInterval( function() {
                window.location.href = 'http://localhost/IBM-Site/pags/login.php'
            }, 1000)
        </script>";
    }
