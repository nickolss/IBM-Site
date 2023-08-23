<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turn Motors | Cadastro</title>

  <!--LINK ICONES-->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <link rel="stylesheet" href="../assets/css/reset.min.css">
  <link rel="stylesheet" href="../assets/css/cadastro.min.css">
  <link rel="stylesheet" href="../assets/css/estilos-importantes.css">

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
    <form action="../assets/scripts/cadastrarCliente.php" method="POST">
      <div class="titulo">
        <h1 class="mainTitle">Cadastrar-se</h1>
        <h2 class="subTitle">Veja seus pedidos de forma fácil, compre mais rápido e
          tenha uma experiência personalizada</h2>
      </div>
        <div class="cadastro">
          <div class="caixa__input">
            <input type="text" required name="nome" id="nome" autocomplete="off">
            <label for="nome">Nome</label>
          </div>
          <div class="caixa__input">
            <input type="email" required name="email" id="email" autocomplete="off">
            <label for="email">Email</label>
          </div>
          <div class="caixa__input">
            <input type="password" required name="senha" id="senha" autocomplete="off" onchange="conferirSenhas()" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#*$%^&+=!])(?!.*\s).{8,}$" title="A senha precisa conter pelo menos 8 caractéres, uma letra maiúscula e uma minúscula e um símbolo.">
            <label for="senha">Senha</label>
          </div>
          <div class="caixa__input">
            <input type="password" required name="confirmarSenha" id="confirmarSenha" autocomplete="off" onchange="conferirSenhas()">
            <label for="senha">Confirmar Senha</label>
          </div>
          <!-- VALIDAÇÃO EM DESENVOLVIMENTO -->
          <div class="caixa__input">
            <input type="text" required name="tel" id="tel" autocomplete="off" maxlength="14" pattern="^\(\d{2}\)\d{5}-\d{4}$">
            <label for="tel">Telefone</label>
          </div>
          <div class="caixa__input">
            <input type="date" required name="data" id="data" autocomplete="off">
            <label for="data">Data de Nascimento</label>
          </div>
          <div class="caixa__input">
            <input type="text" required name="cpf" id="cpf" autocomplete="off" maxlength="14">
            <label for="cpf">CPF</label>
          </div>
          <!--<div class="div__termos">
            <div class="filho__termos"><label for="termos"><input type="checkbox" name="termos" id="termos" required>Aceitar Termos de condições</label></div>
          </div>-->
        </div>

        <div class="cadastro">

          <div class="caixa__input">
            <input type="text" required name="cep" id="cep" autocomplete="off" minlength="8" maxlength="8">
            <label for="cep">CEP</label>
          </div>
          
          <div class="input__endereco">

            <div class="caixa__input">
              <input type="text" required name="address" id="address" autocomplete="off" disabled data-input>
              <label for="address">Rua</label>
            </div>

            <div class="caixa__input caixa__input__margin">
              <input type="number" required name="numero" id="numero" autocomplete="off" minlength="1" maxlength="5" disabled data-input>
              <label for="numero">Número</label>
            </div>

          </div>

          <div class="input__endereco">

            <div class="caixa__input">
              <input type="text" name="complemento" id="complemento" autocomplete="off" disabled data-input>
              <label for="complemento">Complemento</label>
            </div>

            <div class="caixa__input caixa__input__margin">
              <input type="text" required name="neighborhood" id="neighborhood" autocomplete="off" disabled data-input>
              <label for="neighborhood">Bairro</label>
            </div>

          </div>

          <div class="input__endereco input__endereco__last">

            <div class="caixa__input">
              <input type="text" required name="city" id="city" autocomplete="off" disabled data-input>
              <label for="city">Cidade</label>
            </div>

            <div class="caixa__input caixa__input__select">
              <div class="dropdown-categorias">
                <label id="label__dropdown__categoria" for="region">Estado:</label>
                <select id="region" name="region" required disabled data-input>
                  <option class="opcao__categoria" selected>Estado</option>
                  <option class="opcao__categoria" value="AC">Acre</option>
                  <option class="opcao__categoria" value="AL">Alagoas</option>
                  <option class="opcao__categoria" value="AP">Amapá</option>
                  <option class="opcao__categoria" value="AM">Amazonas</option>
                  <option class="opcao__categoria" value="BA">Bahia</option>
                  <option class="opcao__categoria" value="CE">Ceará</option>
                  <option class="opcao__categoria" value="ES">Espírito Santo</option>
                  <option class="opcao__categoria" value="GO">Goiás</option>
                  <option class="opcao__categoria" value="MA">Maranhão</option>
                  <option class="opcao__categoria" value="MT">Mato Grosso</option>
                  <option class="opcao__categoria" value="MS">Mato Grosso do Sul</option>
                  <option class="opcao__categoria" value="MG">Minas Gerais</option>
                  <option class="opcao__categoria" value="PA">Pará</option>
                  <option class="opcao__categoria" value="PB">Paraíba</option>
                  <option class="opcao__categoria" value="PR">Paraná</option>
                  <option class="opcao__categoria" value="PE">Pernambuco</option>
                  <option class="opcao__categoria" value="PI">Piauí</option>
                  <option class="opcao__categoria" value="RJ">Rio de Janeiro</option>
                  <option class="opcao__categoria" value="RN">Rio Grande do Norte</option>
                  <option class="opcao__categoria" value="RS">Rio Grande do Sul</option>
                  <option class="opcao__categoria" value="RO">Rondônia</option>
                  <option class="opcao__categoria" value="RR">Roraima</option>
                  <option class="opcao__categoria" value="SC">Santa Catarina</option>
                  <option class="opcao__categoria" value="SP">São Paulo</option>
                  <option class="opcao__categoria" value="SE">Sergipe</option>
                  <option class="opcao__categoria" value="TO">Tocantins</option>
                </select>
              </div>
              <br>
            </div>

          </div>

        </div>

        <section class="planos">
          <div class="plano__background-azul">
            <div class="plano-comum">
              <div class="plano__cabecalho">
                <img src="../assets/img/velocimetroDevagar.svg">
                <h2 class="plano-comum__titulo">Plano Comum</h2>
              </div>
              <ul class="plano-comum__lista">
                <li class="lista__itens-comum">Entrega segura e em todo país</li>
                <li class="lista__itens-comum">Melhores preços entre as lojas</li>
                <li class="lista__itens-comum">Fornecedores confiáveis</li>
                <li class="lista__itens-comum">Pontos para utilizar em descontos</li>
              </ul>

              <button type="submit" value="comum" class="formulario__botao formulario__botao--comum" name="plano">Cadastrar-se</button>

            </div>
          </div>

          <div class="plano__background-rosa">
            <div class="plano-turbinado">
              <div class="plano__cabecalho">
                <img src="../assets/img/velocimetro.svg">
                <h2 class="plano-turbinado__titulo">Plano Turbinado</h2>
              </div>
              <ul class="plano-turbinado__lista">
                <li class="lista__itens-turbinado">Frete grátis e entregas mais rápidas</li>
                <li class="lista__itens-turbinado">Acesso ao programa de pontos em dobro</li>
                <li class="lista__itens-turbinado">Atendimento personalizado para esclarecer suas dúvidas</li>
                <li class="lista__itens-turbinado">Brindes mensais para personalizar seu carro</li>
                <li class="lista__itens-turbinado">Ofertas exclusivas</li>
                <li class="lista__itens-turbinado">Cashback em algumas compras</li>
                <li class="lista__itens-turbinado">Entrega segura e em todo país </li>
                <li class="lista__itens-turbinado">Melhores preços entre as lojas</li>
                <li class="lista__itens-turbinado">Fornecedores confiáveis</li>
                <li class="lista__itens-turbinado">Pontos para utilizar em descontos</li>
              </ul>
              <p class="plano-turbinado__preco">apenas <span class="preco">R$29,90</span></p>
              <a href="pagamentoTurbinado.html"><button type="submit" value="turbinado" class="formulario__botao formulario__botao--turbinado" name="plano">Cadastrar-se</button></a>
            </div>
          </div>
        </section>

    </form>

  </main>

  <?php
  require_once('../assets/components/footer.php');
  ?>


</body>

</html