<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Registro</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/registro.css">
    <link rel="icon" href="../img/Icon.png">
</head>

<body>
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
                <a href="cliente/cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="fornecedor/cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="vendedor/cadastro_ven.php">
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
                <a href="cliente/cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="fornecedor/cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="vendedor/cadastro_ven.php">
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
                <h1>Registros</h1>
            </div>
            <div class='container-tabela'>
                <?php
                include "mysqlconecta.php";
                $sql_venda = "SELECT id_venda, id_cliente, id_vendedor, quantidade, prod_venda FROM venda";
                $result_venda = mysqli_query($conexao, $sql_venda);

                echo ("<table><thead>");
                echo ("<tr>
                <th>ID</th>
                <th>Nome do Cliente</th>
                <th>Nome do Vendedor</th>
                <th>Produto Vendido</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
                <th>Nota Fiscal</th>
                </tr></thead><tbody>");

                while ($row_venda = mysqli_fetch_array($result_venda)) {
                    $id = $row_venda[0];
                    $cli = $row_venda[1];
                    $vendedor = $row_venda[2];
                    $quant = $row_venda[3];
                    $prod = $row_venda[4];

                    $sql_cli = "SELECT * FROM cliente WHERE id_cliente like '%$cli%'";
                    $sql_vendedor = "SELECT * FROM vendedor WHERE id_vendedor like'%$vendedor%'";
                    $sql_prod = "SELECT * FROM produto WHERE id_produto like '%$prod%'";
                    $result_cli = mysqli_query($conexao, $sql_cli);
                    $result_vendedor = mysqli_query($conexao, $sql_vendedor);
                    $result_prod = mysqli_query($conexao, $sql_prod);

                    while ($row_cli = mysqli_fetch_array($result_cli)) {
                        $nome_cli = $row_cli[1];
                    }

                    while ($row_vende = mysqli_fetch_array($result_vendedor)) {
                        $nome_vende = $row_vende[1];
                    }

                    while ($row_prod = mysqli_fetch_array($result_prod)) {
                        $nome_prod = $row_prod[2];
                        $preco_uni = $row_prod[6];
                    }

                    $preco_total = $preco_uni * $quant;
                    echo ("<tr>
                    <td>" . $id . "</td>
                    <td>" . $nome_cli . " </td>
                    <td>" . $nome_vende . " </td>
                    <td>" . $nome_prod . " </td>
                    <td>" . $quant . " </td>
                    <td>R$ " . $preco_uni . ",00</td>
                    <td>R$ " . $preco_total . ",00</td>
                    <td><a href='javascript:direcionarParaImpressao(" . $id . ")'>Imprimir</a></td>");
                }
                    echo ("</tr></tbody></table>");
                ?>
            </div>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../js/script.js"></script>
    <script src="../js/cursorPersonalizado.js"></script>
    <script src="../js/estoque.js"></script>
</body>

</html>