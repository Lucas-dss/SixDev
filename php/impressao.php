<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Impressão</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/impressao.css">
    <link rel="icon" href="../img/Icon.png">
</head>

<body onload="printPorId('idParaImprimir')">
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
    <div id="idParaImprimir">
        <section class="container-section-column">
            <h1>Six Dev Technology</h1>
            <p>COMPROVANTE DE VENDA</p>
        </section>
        <hr>
        <div>
            <section class="container-section">
                <div class="container-img">
                    <img src="../img/Icon.png" alt="logo do SixDev">
                </div>
                <div class="container-p">
                    <p>SENAI SANTA BARBARA DO OESTE</p>
                    <p>R. Ver. Sergio Leopoidino Alves, 500 - Distrito Industrial I, Santa Barbara d'Oeste - SP, 13456-166</p>
                </div>
            </section>
            <?php
            include "mysqlconecta.php";
            if (isset($_GET["id"])) {
                $id_ven = $_GET['id'];
                $sql_venda = "SELECT id_venda, id_cliente, id_vendedor, quantidade, prod_venda FROM venda WHERE id_venda like'%$id_ven%' ";
                $result_venda = mysqli_query($conexao, $sql_venda);

                while ($row_venda = mysqli_fetch_array($result_venda)) {

                    $cli = $row_venda[1];
                    $vendedor = $row_venda[2];
                    $quant = $row_venda[3];
                    $prod = $row_venda[4];
                }

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
            }

            echo ("<hr>");
            echo ("<div class='container-tabela'><table><thead>");
            echo ("<tr>
            <th>Prod.</th>
            <th>Quant.</th>
            <th>Unit.</th>
            <th>Total</th>
            </tr></thead>");
            echo ("<tbody>");
            echo ("<tr>
            <td>" . $nome_prod . " </td>
            <td>" . $quant . " </td>
            <td>" . $preco_uni . " </td>
            <td>" . $preco_total . "</td>
            </tr></tbody></table></div>");

            echo ("<hr>");
            $horario_saopaulo = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
            echo ("<h4> DATA/HORA DA IMPRESSÃO: <span>" . $horario_saopaulo->format('d/m/Y H:i:s') . "</span></h4>");
            ?>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, Helvetica, sans-serif;
                }

                #idParaImprimir {
                    width: 47.5%;
                    min-width: 200px;
                    margin: 180px 0;
                    padding: 5px 5px;
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-end;
                    border: 2px solid black;
                    font-weight: bold;
                }

                section {
                    display: flex;
                }

                .container-section {
                    overflow: hidden;
                    /* limpa o float */
                    display: flex;
                    flex-wrap: wrap;
                    /* Permite quebra de linha */
                    align-items: flex-start;
                }

                .container-img {
                    float: left;
                    margin-right: 20px;
                }

                .container-img img {
                    width: 150px;
                    height: 150px;
                }

                .container-p {
                    width: 80%;
                    height: 100%;
                    padding: 0 20px;
                    display: flex;
                    flex-direction: column;
                    font-size: 10px;
                    text-align: justify;
                    flex: 1 1 300px;
                    /* Ocupa o resto do espaço e quebra se necessário */
                    font-weight: bold;
                }

                .container-section-column {
                    display: flex;
                    justify-content: flex-start;
                    flex-direction: column;
                    align-items: center;
                }

                .container-section-column h1 {
                    font-size: 24px;
                    margin: 10px;
                    text-align: center;
                }

                .container-section-column p {
                    font-size: 12px;
                    text-align: center;
                }

                .container-tabela {
                    width: 100%;
                    max-height: 200px;
                    display: flex;
                    justify-content: center;
                }

                hr {
                    border: 1px dashed #000;
                    margin: 10px 0;
                }

                table {
                    width: 100%;
                    font-size: 12px;
                }

                thead {
                    background-color: #ffffff3b;
                }

                th {
                    border: none;
                    border-bottom: 1px dashed rgb(150, 150, 150);
                    height: 36px;
                }

                tr,
                td {
                    text-align: center;
                    height: 36px;
                    max-width: 25px;
                    padding-top: 5px;
                    overflow-wrap: break-word;
                    font-weight: bold;
                }

                /* o primeiro input (id) */
                td:nth-child(1) input {
                    text-align: center;
                }

                h4 {
                    font-size: 10px;
                    word-spacing: 10px;
                    margin: 10px;
                }

                h4 span {
                    word-spacing: 30px;
                }
            </style>
        </div>
    </div>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../js/script.js"></script>
    <script src="../js/cursorPersonalizado.js"></script>
</body>

</html>