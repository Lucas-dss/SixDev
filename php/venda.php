<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Venda</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/venda.css">
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
    <main>
        <section>
            <div class="container-navegador">
                <h1>Vendas</h1>
            </div>
            <div class="container-formulario">
                <form action="venda.php" method="post">
                    <?php
                    include "mysqlconecta.php";

                    $sql_cliente = "SELECT * FROM cliente";
                    $result_cliente = mysqli_query($conexao, $sql_cliente);
                    ?>
                    <select name="cli" id="cli" required>
                        <option value="" selected disabled>Selecione o Cliente</option>
                        <?php while ($cli = mysqli_fetch_assoc($result_cliente)) { ?>
                            <option value="<?php echo $cli['id_cliente']; ?>"><?php echo $cli['nome_cliente']; ?></option>
                        <?php } ?>
                    </select><br>
                    <?php
                    $sql_ven = "SELECT * FROM vendedor";
                    $result_ven = mysqli_query($conexao, $sql_ven);
                    ?>
                    <select name="ven" id="ven" required>
                        <option value="" selected disabled>Selecione o Vendedor</option>
                        <?php while ($ven = mysqli_fetch_assoc($result_ven)) { ?>
                            <option value="<?php echo $ven['id_vendedor']; ?>"><?php echo $ven['nome_vende']; ?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <?php

                    $sql_prod = "SELECT * FROM produto";
                    $result_produto = mysqli_query($conexao, $sql_prod);
                    ?>
                    <select name="pro" id="pro" required>
                        <option value="" selected disabled>Selecione o Produto</option>
                        <?php while ($pro = mysqli_fetch_assoc($result_produto)) { ?>
                            <option value="<?php echo $pro['id_produto']; ?>"><?php echo $pro['nome_produto']; ?></option>
                        <?php } ?>
                    </select><br>
                    <label for="quant">Digite a quantidade de produto desejado:</label>
                    <input type="number" name="quant" id="quant"
                        max="<?php
                                $sql_prod = "SELECT * FROM produto";
                                $result_produto = mysqli_query($conexao, $sql_prod);
                                ?>" min="1" required>
                    <button type="submit" name="enviar">Enviar</button>
                </form>
            </div>
            <?php
            if (isset($_POST['enviar'])) {
                $cliente = $_POST['cli'];
                $vendedor = $_POST['ven'];
                $produto = $_POST['pro'];
                $quant_vd = $_POST['quant'];

                $sql_venda = "INSERT INTO venda (id_cliente, id_vendedor, quantidade, prod_venda) VALUES ( '$cliente','$vendedor','$quant_vd','$produto')";
                if (mysqli_query($conexao, $sql_venda)) {
                    $sql_quant_venda = "SELECT * FROM venda";
                    $result_quant_venda = mysqli_query($conexao, $sql_quant_venda);
                    while ($row_venda = mysqli_fetch_assoc($result_quant_venda)) {
                        $id = $row_venda['prod_venda'];
                        // id da venda
                        $id_venda = $row_venda['id_venda'];
                        $quant_venda = $row_venda['quantidade'];
                    }
                    $sql_quant_prod = "SELECT * FROM produto WHERE id_produto like '%$id%'";
                    $result_quant_prod = mysqli_query($conexao, $sql_quant_prod);
                    while ($row_quant_prod = mysqli_fetch_assoc($result_quant_prod)) {
                        $quant_total = $row_quant_prod['quantidade'];
                    }
                    if ($quant_total >= $quant_venda) {
                        echo "<br><div class='mensagem'>Sua compra foi efetuada com sucesso! Um relatório foi adicionado.</div><br>";
                        $nova_quant = $quant_total - $quant_venda;
                        $sql_up = "UPDATE produto SET quantidade ='$nova_quant' WHERE id_produto = '$id'";
                        $result_up = mysqli_query($conexao, $sql_up);
                    } else {
                        echo "<div class='mensagem'><span>Erro:</span> A quantidade requerida é maior do que o total. Tente de novo.</div>";
                        // deleta a linha no relatório se caso der erro na hora da compra
                        $sql_venda =+ mysqli_query($conexao, "DELETE FROM venda WHERE id_venda = '$id_venda'");
                    }
                } else {
                    echo "<div class='mensagem'>Erro: " . mysqli_error($conexao) . "</div>";
                }

                mysqli_close($conexao);
            }
            ?>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../js/script.js"></script>
    <script src="../js/cursorPersonalizado.js"></script>
    <script src="../js/consulta.js"></script>
</body>

</html>