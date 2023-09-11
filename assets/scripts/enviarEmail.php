<?php
    require_once('./conexao.php'); //verifica se o arquivo 'conexao.php' está incluido, se sim não irá incluir novamente
    require_once('./iniciarSessao.php'); //verifica se o arquivo 'iniciarSessao.php' está incluindo, executando-o

    $id = (int)$_SESSION['id']; 
    
    // Consulta para obter informações de data e horário do banco de dados
    $stmtAgendamento = $pdo->query("SELECT data_agendamento, horario FROM agendamento WHERE id_cliente='$id'");
    $agendamentos = $stmtAgendamento->fetchAll();
    $quantidadeTupla = $stmtAgendamento->rowCount();

    if($quantidadeTupla > 0){
        //atributos para enviar o email
        $para = $_SESSION['email']; //destinatario
        $titulo = 'Agendamento Turn Motors'; //assunto

        foreach($agendamentos as $agendamento){
            $data = $agendamento['data_agendamento'];
            $horario = $agendamento['horario'];

            $mensagem = "Olá, " . $_SESSION['nomeCliente'] . "!     
                        Seu agendamento foi realizado com sucesso em nossa oficina.
                        Seguem as informações:
                        Procedimento Agendado: [Agendamento.Procedimento]
                        Data: " . $data . "
                        Hora: " . $horario . "
                        Até la!
                        Oficina Turn Motors agradece a preferência.
                        Avenida Turbo Nº1";

            //$mensagem = "Oficina Turn Motors agradece a preferência! \nData do Agendamento: " . $data . "\nHorário do Agendamento: " . $horario; //mensagem do email

            if(mail($para, $titulo, $mensagem)){ //função para enviar email    
                header("Location: ../../pags/agendamento-sucesso.php");
            }else{
                echo 'Erro ao enviar email :(';
            }
        }
    } else{
        echo 'Nenhum resultado encontrado no banco de dados :(';
    }

?>    