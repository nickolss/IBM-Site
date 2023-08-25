<?php

    require_once('conexao.php'); //fazendo conexao com o bd

    $emailForm = $_POST['email']; //variavel $emailForm está recebendo o email vindo do form
    
    //query sql select onde o campo email for igual ao email vindo do formulario
    $sql = "SELECT id, nomeCompleto, email FROM cliente WHERE email='$emailForm'";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $quantidadeRegistro = $stmt->rowCount(); //quantidade de registros da variavel sql
    $client_row = $stmt->fetch(PDO::FETCH_ASSOC); //vetor da tupla onde o campo email é igual ao email vindo do formulario

    if($quantidadeRegistro > 0){ //se a quantidade de registros da variavel sql FOR  maior que 0: 
        //echo 'usuario encontrado <br>';
        //cria uma nova senha apenas para o registro do cliente especifico
        $chave_recuperar_senha = password_hash($client_row['id'], PASSWORD_DEFAULT);
        //echo $chave_recuperar_senha;
        //atualiza o campo "recuperar_senha" com a nova senha criada
        $query_update_cliente = "UPDATE cliente 
                                SET recuperar_senha='$chave_recuperar_senha'
                                WHERE email='$emailForm'
                                LIMIT 1";
        $resultado_update_cliente = $pdo->query($query_update_cliente);

        //se a query $resultado_update_cliente FOR executada com sucesso:
        if($resultado_update_cliente->execute()){
            
            $sqlRecuperarSenha = "SELECT id, senha, email FROM cliente WHERE recuperar_senha='$chave_recuperar_senha'";
            $stmtRecuperarSenha = $pdo->query($sqlRecuperarSenha);
            $stmtRecuperarSenha->execute();
            $quantidadeRegistroRecuperarSenha = $stmt->rowCount(); //quantidade de registros da variavel sql
            $client_rowsqlRecuperarSenha = $stmt->fetch(PDO::FETCH_ASSOC); //vetor da tupla onde o campo email é igual ao email vindo do formulario

            if( $quantidadeRegistroRecuperarSenha < 1){
                echo "<script>
                alert('ERRO: Link inválido. Tente novamente.');
                setInterval( function() {
                    window.location.href = 'https://turnmotors.000webhostapp.com/pags/recuperar-senha.php'
                }, 0)
                </script>";
            }else{
                $para = $client_row['email']; //destinatario
                $titulo = 'Recuperar Senha'; //assunto
                $link = "https://turnmotors.000webhostapp.com/pags/atualizar-senha.php?chave=$chave_recuperar_senha";

                $mensagem = "Olá, " . $client_row['nomeCompleto'] . "!     
                            Você solicitou para alteração de senha na conta Turn Motors.
                            Para continuar o processo de recuperação de senha, clique no link abaixo:
                            " . $link . " 
                            Se você não solicitou essa alteração, nenhuma ação é necessária.
                            Sua senha permanecerá a mesma até que você ative esse código.

                            Oficina Turn Motors.";

                    if(mail($para, $titulo, $mensagem)){ //função para enviar email    
                        header("Location: ../../pags/emailEnviadoSucesso.php");
                    }else{
                        echo 'Erro ao enviar email :(';
                    }
            }
        }else{//se a query $resultado_update_cliente NÃO for executada com sucesso:
            echo "<script>
                alert('ERRO: Tente novamente.');
                setInterval( function() {
                    window.location.href = 'https://turnmotors.000webhostapp.com/pags/recuperar-senha.php'
                }, 0)
                </script>";
        }
        
    }else{ //se a quantidade de registros da variavel sql NAO for maior que 0:
        //redirecionamento para a pagina indicada 
        header("Location: ../../pags/modal-email.php");
    }


    

?>