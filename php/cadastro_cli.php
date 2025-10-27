<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Six Dev | Cadastro de Cliente</title>
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
                <a href="consulta_cli.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png"
                        alt="icon de consulta"></a>
                <h1>Clientes</h1>
                <a href="cadastro_cli.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png"
                        alt="icon de cadastro"></a>
            </div>
            <div class="container-formulario">
                <form action="cadastro_cli.php" method="POST" id="form">
                    <h1>Cadastro de Cliente</h1>
                    <p>* - obrigatório</p>
                    <div class="formulario-bloco">
                        <label for="nome_cliente">Nome do Cliente</label>
                        <input type="text" name="nome_cliente" id="idnome" minlength="4" maxlength="50" placeholder="Nome" autofocus required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="tel">Telefone</label>
                        <input type="tel" name="tel" id="idtelefone" minlength="11" maxlength="11" placeholder="Telefone" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="cpf">CPF</label>
                        <input type="tel" name="cpf" id="idcpf" minlength="11" maxlength="11" placeholder="CPF" required>
                    </div>
                    <div class="formulario-bloco">
                        <label for="end">Endereço</label>
                        <input type="text" name="end" id="idendereco" minlength="7" maxlength="100" placeholder="Endereço" required>
                    </div>
                    <button type="submit">Salvar</button>
                    <p>SixDev Technology <span>&copy; 2025</span></p>
                </form>
                <?php
                include 'mysqlconecta.php';

                if (
                    $_SERVER["REQUEST_METHOD"] == "POST"
                    && isset($_POST['nome_cliente'])
                    && isset($_POST['tel'])
                    && isset($_POST['cpf'])
                    && isset($_POST['end'])
                ) {

                    $nome_cliente = $_POST['nome_cliente'];
                    $tel = $_POST['tel'];
                    $cpf = $_POST['cpf'];
                    $end = $_POST['end'];

                    $sql = "INSERT INTO cliente (nome_cliente, tel, cpf, end) 
                        VALUES ('$nome_cliente', '$tel', '$cpf', '$end')";

                    if (mysqli_query($conexao, $sql)) {
                        echo "<br><div class='mensagem'>Cliente cadastrado com sucesso!</div><br>";
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