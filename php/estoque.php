<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Estoque</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../css/estoque.css">
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
                <h1>Estoque</h1>
            </div>
            <div class="container-formulario">
                <form action="estoque.php" method="post">
                    <h1>Filtro por Fornecedor</h1>

                    <select name="f" id="fornecedor">
                        <option value="" selected disabled>Selecione um Fornecedor</option>
                        <?php
                        include "mysqlconecta.php";
                        $sql_for = "SELECT * FROM fornecedor ORDER BY nome_fornecedor";
                        $result_for = mysqli_query($conexao, $sql_for);
                        ?>

                        <?php while ($for = mysqli_fetch_assoc($result_for)) { ?>
                            <option value="<?php echo $for['id_fornecedor']; ?>"><?php echo $for['nome_fornecedor']; ?></option>
                        <?php } ?>
                    </select><br>

                    <h1>Filtro por Tamanho</h1>
                    <!-- Campo select para Tamanho -->
                    <select name="t" id="tamanho">
                        <option value="" selected disabled>Selecione o Tamanho</option>
                        <?php
                        // Consulta para buscar os tamanhos únicos da tabela de produtos
                        $sql_tam = "SELECT DISTINCT tamanho FROM produto ORDER BY tamanho";
                        $result_tam = mysqli_query($conexao, $sql_tam);

                        // Loop para exibir as opções de tamanho no select
                        while ($tam = mysqli_fetch_assoc($result_tam)) {
                            echo "<option value='" . $tam['tamanho'] . "'>" . $tam['tamanho'] . "</option>";
                        }
                        ?>
                    </select><br>
                    <!-- Botão de submit para enviar o formulário -->
                    <button type="submit" name="aplica">Aplicar Filtros</button>
                    <p>SixDev Technology <span>&copy; 2025</span></p>
                </form>
            </div>
            <?php
            // Conexão com o banco de dados
            include "mysqlconecta.php";

            // Recebe os valores do filtro: fornecedor e tamanho
            $id_forn = $_POST["f"] ?? ''; // Se não existir valor, atribui uma string vazia
            $tam = $_POST["t"] ?? ''; // Se não existir valor, atribui uma string vazia

            // Construção da consulta SQL para filtrar os dados com base nos filtros aplicados
            $sql = "SELECT * FROM produto WHERE 1=1"; // 1=1 é uma condição verdadeira, que sempre existe,"nota Dev: esta linha garante que as info 
            //dos produtos sempre aparece"

            // Se o filtro do fornecedor não estiver vazio, adiciona à consulta
            if (!empty($id_forn)) {
                $sql .= " AND id_fornecedor = '$id_forn'"; // Filtra os produtos pelo fornecedor selecionado
                // nota Dev: .= é um operador de concatenação 
            }

            // Se o filtro de tamanho não estiver vazio, adiciona à consulta
            if (!empty($tam)) {
                $sql .= " AND tamanho = '$tam'"; // Filtra os produtos pelo tamanho
                // nota Dev: .= é um operador de concatenação 
            }

            // Executa a consulta SQL
            $result_sql = mysqli_query($conexao, $sql);

            ?>
            <div class='container-tabela'>
                <!-- Exibição da tabela com os produtos -->
                <table border="1">
                    <thead>
                        <!-- Cabeçalho da tabela com os títulos das colunas -->
                        <tr>
                            <th>ID</th>
                            <th>Fornecedor</th>
                            <th>Nome</th>
                            <th>Modelo</th>
                            <th>Tamanho</th>
                            <th>Cor</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exibe os dados dos produtos em linhas -->
                        <?php while ($row = mysqli_fetch_array($result_sql)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td> <!-- Exibe o ID -->
                                <td><?= $row[1] ?></td> <!-- Exibe o Fornecedor -->
                                <td><?= $row[2] ?></td> <!-- Exibe o Nome -->
                                <td><?= $row[3] ?></td> <!-- Exibe o Modelo -->
                                <td><?= $row[4] ?></td> <!-- Exibe o Tamanho -->
                                <td><?= $row[5] ?></td> <!-- Exibe a Cor -->
                                <td>R$ <?= $row[6] ?>,00</td> <!-- Exibe o Preço -->
                                <!-- se eu usar id, ela só pega um item da coluna,
                                 mas se eu usar class, ela pega todos os itens da coluna -->
                                <td class="rowQuantidade"><?= $row[7] ?></td> <!-- Exibe a Quantidade -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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