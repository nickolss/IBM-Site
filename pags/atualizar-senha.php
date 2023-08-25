<?php
    require_once('../assets/scripts/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Atualizar Senha</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">
  <link rel="stylesheet" href="../assets/css/atualizar-senha.min.css">

  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/mascaraCpf.js" defer></script>
  <script src="../assets/js/mascaraTelefone.js" defer></script>
  <script src="../assets/js/validacaoForm.js" defer></script>
  <script src="../assets/js/js-bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/cadastro-endereco.js" defer></script>
  <!-- O atributo DEFER espera a página carregar para executar o Script -->

</head>

<body id="container__body">
  <?php
  require_once('../assets/components/header.php');
  ?>

    <main class="principal">

        <?php
            //recebendo atraves do metodo get o valor da chave (nova senha) e atribuindo a variavel chave
            $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
            //var_dump($chave);


            if(!empty($chave)){

                $sql = "SELECT id, senha, email FROM cliente WHERE recuperar_senha='$chave'";
                $stmt = $pdo->query($sql);
                $stmt->execute();
                $quantidadeRegistro = $stmt->rowCount(); //quantidade de registros da variavel sql
                $client_row = $stmt->fetch(PDO::FETCH_ASSOC); //vetor da tupla onde o campo email é igual ao email vindo do formulario

                if($quantidadeRegistro < 1){
                    echo "<script>
                        alert('ERRO: Link inválido. Tente novamente.');
                        setInterval( function() {
                            window.location.href = 'recuperar-senha.php'
                        }, 0)
                        </script>";
                }else{
                    ?>
                        <form action="../assets/scripts/atualizarSenha.php" method="POST">
                            <div class="titulo">
                                <h1 class="mainTitle">Atualizar Senha</h1>
                            </div>
                            <div class="cadastro">

                                <div class="caixa__input">
                                    <input type="password" required name="senha" id="senha" autocomplete="off" onchange="conferirSenhas()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
                                    <label for="senha">Nova senha:</label>
                                </div>

                                <div class="caixa__input">
                                    <input type="password" required name="confirmarSenha" id="confirmarSenha" autocomplete="off" onchange="conferirSenhas()">
                                    <label for="senha">Confirmar Senha:</label>
                                </div>

                                <!--input para passar o valor do ID para o script "AtualizarSenha"-->
                                <div style="display:none;" class="caixa__input">
                                    <input type="number" required name="id" id="id" autocomplete="off" value="<?php echo $client_row['id']; ?>">
                                    <label for="senha">ID:</label>
                                </div>
                                
                            </div>

                            <div class="botoes">
                                <div class="botao">
                                    <button class="botao__laranja" type="submit">Atualizar</button>
                                </div>
                            </div> 
                            
                    </form>

                </main>
                    <?php
                }

            }else{
                echo "<script>
                    alert('ERRO: Link inválido. Tente novamente.');
                    setInterval( function() {
                        window.location.href = 'recuperar-senha.php'
                    }, 0)
                    </script>";
            }

            
        ?>

        

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html