<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    $id = (int)$_SESSION['id']; 
    
    // Consulta para obter informações de data e horário do banco de dados
    $stmtOrcamento = $pdo->query("SELECT `data`, `horario` FROM `pedido_orcamento` WHERE `id_cliente`='$id'");
    $orcamentos = $stmtOrcamento->fetchAll();
    $quantidadeTupla = $stmtOrcamento->rowCount();

    if($quantidadeTupla > 0){
        //atributos para enviar o email
        $para = $_SESSION['email']; //destinatario
        $titulo = 'Agendamento Turn Motors'; //assunto

        foreach($orcamentos as $orcamento){
            $data = $orcamento['data'];
            $horario = $orcamento['horario'];
            $categoria = $orcamento['personalizacao'];

            $mensagem = "Olá, " . $_SESSION['nomeCliente'] . "!     
                        Seu agendamento para realizar o orçamento da personalização foi realizado com sucesso em nossa oficina.
                        Seguem as informações:
                        Procedimento Agendado: " . $categoria . "
                        Data: " . $data . "
                        Hora: " . $horario . "
                        Até la!
                        Oficina Turn Motors agradece a preferência.
                        Avenida Turbo Nº1";
            
            //se a função mail for executada irá redirecionar para a pag agendamento-sucesso, caso contrario ira exibir mensagem de erro
            if(mail($para, $titulo, $mensagem)){ //função para enviar email    
                header("Location: ../../pags/agendamento-sucesso.php");
            }else{
                echo "<script>
                    alert('Erro ao enviar email. Tente novamente.');
                    setInterval( function() {
                        window.location.href = '../../pags/login.php'
                    }, 0)
                </script>";
            }
        }
    } else{
        echo "<script>
                    alert('Nenhum registro encontrado em nosso banco de dados.');
                    setInterval( function() {
                        window.location.href = '../../pags/login.php'
                    }, 0)
                </script>";
    }

?>    