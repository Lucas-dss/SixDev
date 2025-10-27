<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Six Dev | Cadastro de Vendedor</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="icon" href="../img/Icon.png">
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
            <a href="../index.html">
                <img src="../img/Icon.png" alt="logo do SixDev">
                <p>Six Dev</p>
            </a>
        </div>
        <nav>
            <ul>
                <a href="../index.html">
                    <li>Início</li>
                </a>
                <a href="cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="cadastro_ven.php">
                    <li>Vendedor</li>
                </a>
                <a href="venda.php">
                    <li>Vendas</li>
                </a>
                <a href="registro.php">
                    <li>Relatório</li>
                </a>
                <a href="estoque.php">
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
                <a href="../index.html">
                    <li>Início</li>
                </a>
                <a href="cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="cadastro_ven.php">
                    <li>Vendedor</li>
                </a>
                <a href="venda.php">
                    <li>Vendas</li>
                </a>
                <a href="registro.php">
                    <li>Relatório</li>
                </a>
                <a href="estoque.php">
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
                <a href="consulta_ven.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png"
                        alt="icon de consulta"></a>
                <h1>Vendedores</h1>
                <a href="cadastro_ven.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png"
                        alt="icon de cadastro"></a>
            </div>
            <div class="container-formulario">
                <form action="cadastro_ven.php" method="POST" id="form">
                    <h1>Cadastro de Vendedor</h1>
                    <p>* - obrigatório</p>
                    <div class="formulario-bloco">
                        <label for="nome_vende">Nome do Vendedor</label>
                        <input type="text" name="nome_vende" id="idnome" minlength="4" maxlength="50" placeholder="Nome" autofocus required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="tel_vende">Telefone</label>
                        <input type="tel" name="tel_vende" id="idtelefone" minlength="11" maxlength="11" placeholder="Telefone" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="cpf_vende">CPF</label>
                        <input type="tel" name="cpf_vende" id="idcpf" minlength="11" maxlength="11" placeholder="CPF" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="end_vende">Endereço</label>
                        <input type="text" name="end_vende" id="idendereco" minlength="7" maxlength="100" placeholder="Endereço" required>
                    </div>
                    <button type="submit">Salvar</button>
                    <p>SixDev Technology <span>&copy; 2025</span></p>
                </form>
                <?php
                include 'mysqlconecta.php';

                if (
                    $_SERVER["REQUEST_METHOD"] == "POST"
                    && isset($_POST['nome_vende'])
                    && isset($_POST['tel_vende'])
                    && isset($_POST['cpf_vende'])
                    && isset($_POST['end_vende'])
                ) {

                    $nome_vende = $_POST['nome_vende'];
                    $tel_vende = $_POST['tel_vende'];
                    $cpf_vende = $_POST['cpf_vende'];
                    $end_vende = $_POST['end_vende'];

                    $sql = "INSERT INTO vendedor (nome_vende, end_vende, tel_vende, cpf_vende) 
                        VALUES ('$nome_vende', '$end_vende', '$tel_vende', '$cpf_vende')";

                    if (mysqli_query($conexao, $sql)) {
                        echo "<br><div class='mensagem'>Vendedor cadastrado com sucesso!</div><br>";
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
    <script src="../js/script.js"></script>
    <script src="../js/cursorPersonalizado.js"></script>
    <script src="../js/cadastro.js"></script>
</body>

</html>