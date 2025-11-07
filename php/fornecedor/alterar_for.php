<?php
include "../mysqlconecta.php";

if (isset($_GET["id"])) {
    $id_fornecedor = $_GET["id"];

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_fornecedor = $_POST["nome_fornecedor"];
        $tel = $_POST["tel"];
        $cnpj = $_POST["cnpj"];
        $custo_unitario = $_POST["custo_unitario"];
        $prod_fornecido = $_POST["prod_fornecido"];

        $query = mysqli_query(
            $conexao,
            "UPDATE fornecedor 
         SET nome_fornecedor = '$nome_fornecedor', 
             tel = '$tel', 
             cnpj = '$cnpj', 
             custo_unitario = '$custo_unitario', 
             prod_fornecido = '$prod_fornecido'
         WHERE id_fornecedor = '$id_fornecedor'"
        ) or die("Erro na atualização");

        if ($query) {
            echo "<div class='mensagem'>ALTERADO COM <span> SUCESSO </span></div>";
        } else {
            echo "<div class='mensagem'><h1>ERRO AO ALTERAR</h1></div>";
        }
    }
}

$query = mysqli_query(
    $conexao,
    "SELECT id_fornecedor, nome_fornecedor, tel, cnpj, custo_unitario, prod_fornecido 
                 FROM fornecedor 
                 WHERE id_fornecedor = '$id_fornecedor'"
) or die("ERRO");

while ($saida = mysqli_fetch_array($query)) {
    $id_fornecedor = $saida['id_fornecedor'];
    $nome_fornecedor = $saida['nome_fornecedor'];
    $tel = $saida['tel'];
    $cnpj = $saida['cnpj'];
    $custo_unitario = $saida['custo_unitario'];
    $prod_fornecido = $saida['prod_fornecido'];
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Alterar Fornecedor</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="stylesheet" href="../../css/alterar.css">
    <link rel="icon" href="../../img/Icon.png">
</head>

<body>
    <div class="custom-cursor site-wide">
        <div class="pointer"></div>
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
        <section>
            <div class="container-navegador">
                <a href="consulta_for.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png" alt="icon de consulta"></a>
                <h1>Fornecedores</h1>
                <a href="cadastro_for.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png" alt="icon de cadastro"></a>
            </div>
            <div class="container-alterar">
                <form method="POST" action="">
                    <h1>Alteração do Registro do Fornecedor</h1>
                    <div class="container-tabela">
                        <table>
                            <tr>
                                <td><b>ID</b></td>
                                <td><b>Nome</b></td>
                                <td><b>Telefone</b></td>
                                <td><b>CNPJ</b></td>
                                <td><b>Custo Unitário</b></td>
                                <td><b>Produto Fornecido</b></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="id" value="<?php echo $id_fornecedor; ?>" readonly></td>
                                <td><input type="text" name="nome_fornecedor" value="<?php echo $nome_fornecedor; ?>" minlength="4" maxlength="50" autofocus></td>
                                <td><input type="text" name="tel" value="<?php echo $tel; ?>" minlength="11" maxlength="11"></td>
                                <td><input type="text" name="cnpj" value="<?php echo $cnpj; ?>" minlength="14" maxlength="14"></td>
                                <td><input type="text" name="custo_unitario" value="<?php echo $custo_unitario; ?>" minlength="1" maxlength="5"></td>
                                <td><input type="text" name="prod_fornecido" value="<?php echo $prod_fornecido; ?>" minlength="4" maxlength="50"></td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit">Salvar</button>
                </form>
            </div>
            <?php
            echo ("<div class='container-botoes'><a href=consulta_for.php><button>PÁGINA ANTERIOR</button></a>");
            echo ("<a href=../../index.html><button>VOLTAR PARA A PÁGINA INICIAL</button></a></div>");
            mysqli_close($conexao);
            ?>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../../js/script.js"></script>
    <script src="../../js/cursorPersonalizado.js"></script>
</body>

</html>