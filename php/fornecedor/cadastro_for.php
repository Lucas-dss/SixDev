<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Cadastro de Fornecedor</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="stylesheet" href="../../css/cadastro.css">
    <link rel="icon" href="../../img/Icon.png">
</head>

<body>
    <!-- div para o cursor -->
    <div class="custom-cursor site-wide">
        <div class="pointer"></div>
    </div>
    <!-- div para as ondas do background -->
    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>
    <header>
        <div class="icon">
            <a href="../../index.html">
                <img src="../../img/Icon.png" alt="logo do SixDev">
                <p>Six Dev</p>
            </a>
        </div>
        <nav>
            <ul>
                <a href="../../index.html">
                    <li>Início</li>
                </a>
                <a href="../cliente/cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="../vendedor/cadastro_ven.php">
                    <li>Vendedor</li>
                </a>
                <a href="../venda.php">
                    <li>Vendas</li>
                </a>
                <a href="../registro.php">
                    <li>Relatório</li>
                </a>
                <a href="../estoque.php">
                    <li>Estoque</li>
                </a>
            </ul>
            <button class="modo" id="modo">🌑</button>
            <div class="hamburguer" id="hamburguer">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="menu" id="menu">
                <a href="../../index.html">
                    <li>Início</li>
                </a>
                <a href="../cliente/cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="../vendedor/cadastro_ven.php">
                    <li>Vendedor</li>
                </a>
                <a href="../venda.php">
                    <li>Vendas</li>
                </a>
                <a href="../registro.php">
                    <li>Relatório</li>
                </a>
                <a href="../estoque.php">
                    <li>Estoque</li>
                </a>
            </ul>
            <div class="x" id="x">
                <span class="xBarra1"></span>
                <span class="xBarra2"></span>
            </div>
        </nav>
    </header>
    <!-- conteúdo principal -->
    <main>
        <!-- seção -->
        <section>
            <div class="container-navegador">
                <a href="consulta_for.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png" alt="icon de consulta"></a>
                <h1>Fornecedores</h1>
                <a href="cadastro_for.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png" alt="icon de cadastro"></a>
            </div>
            <div class="container-formulario">
                <form action="cadastro_for.php" method="POST">
                    <h1>Cadastro de Fornecedor</h1>
                    <p>* - obrigatório</p>
                    <div class="formulario-bloco">
                        <label for="nome_for">Nome do Fornecedor</label>
                        <input type="text" name="nome_for" id="nome_for" minlength="4" maxlength="50" placeholder="Nome" autofocus required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="tel_for">Telefone</label>
                        <input type="tel" name="tel_for" id="tel_for" minlength="11" maxlength="11" placeholder="Telefone" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="end_for">Endereço</label>
                        <input type="text" name="end_for" id="end_for" minlength="7" maxlength="100" placeholder="Endereço" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="cnpj_for">CNPJ</label>
                        <input type="tel" name="cnpj_for" id="cnpj_for" minlength="14" maxlength="14" placeholder="CNPJ" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="custo_for">Custo Unitário</label>
                        <input type="tel" name="custo_for" id="custo_for" minlength="1" maxlength="5" placeholder="Custo Unitário" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="prod">Produto Vendido</label>
                        <input type="text" name="prod" id="prod" minlength="4" maxlength="50" placeholder="Produto Vendido" required>
                    </div>
                    <button type="submit">Salvar</button>
                    <p>SixDev Technology <span>&copy; 2025</span></p>
                </form>
                <?php
                include "../mysqlconecta.php";

                if (
                    $_SERVER["REQUEST_METHOD"] == "POST"
                    && isset($_POST['nome_for'])
                    && isset($_POST['tel_for'])
                    && isset($_POST['end_for'])
                    && isset($_POST['cnpj_for'])
                    && isset($_POST['custo_for'])
                    && isset($_POST['prod'])
                ) {

                    $nome_for = $_POST['nome_for'];
                    $tel_for = $_POST['tel_for'];
                    $end_for = $_POST['end_for'];
                    $cnpj = $_POST['cnpj_for'];
                    $custo = $_POST['custo_for'];
                    $produto = $_POST['prod'];

                    $sql = "INSERT INTO fornecedor (nome_fornecedor, tel, end, cnpj, custo_unitario, prod_fornecido) 
                VALUES ('$nome_for','$tel_for','$end_for','$cnpj','$custo','$produto')";

                    if (mysqli_query($conexao, $sql)) {
                        echo "<br><div class='mensagem'>Cliente fornecedor com sucesso!</div><br>";
                    } else {
                        echo "<div class='mensagem'>Erro: " . mysqli_error($conexao) . "</div>";
                    }

                    mysqli_close($conexao);
                }
                ?>

            </div>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../../js/script.js"></script>
    <script src="../../js/cursorPersonalizado.js"></script>
    <script src="../../js/cadastro.js"></script>
</body>

</html>