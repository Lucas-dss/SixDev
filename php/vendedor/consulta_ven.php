<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Consulta de Vendedores</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <link rel="stylesheet" href="../../css/consulta.css">
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
                <a href="../fornecedor/cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="cadastro_ven.php">
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
                <a href="../cadastro_cli.php">
                    <li>Cliente</li>
                </a>
                <a href="../cadastro_for.php">
                    <li>Fornecedor</li>
                </a>
                <a href="../cadastro_ven.php">
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
                <a href="consulta_ven.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png" alt="icon de consulta"></a>
                <h1>Vendedores</h1>
                <a href="cadastro_ven.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png" alt="icon de cadastro"></a>
            </div>
            <div class="container-consulta">
                <form action="" method="post">
                    <h1>Consulta de Registros de Vendedores</h1>
                    <div class="formulario-bloco">
                        <label for="busca">Buscar Vendedor</label>
                        <input type="text" name="busca" id="busca" placeholder="Nome do Vendedor">
                    </div>
                    <button type="submit">Buscar</button>
                    <p>SixDev Technology <span>&copy; 2025</span></p>
                </form>
            </div>
            <?php
            include "../mysqlconecta.php";

            $busca = '';

            if (isset($_POST["busca"])) {
                $busca = $_POST["busca"];
            }

            $query = mysqli_query(
                $conexao,
                "SELECT id_vendedor, nome_vende, tel_vende , cpf_vende , end_vende 
                FROM vendedor WHERE nome_vende LIKE '%$busca%' 
                GROUP BY id_vendedor ORDER BY id_vendedor"
            );

            echo ("<div class='container-tabela'><table><thead>");
            echo ("<tr> 
            <th> ID </th>
            <th> Nome do Vendedor </th>
            <th> Telefone </th>
            <th> CPF </th>
            <th> Endereço </th>
            <th> Exclusão </th>
            <th> Alteração </th>
            </tr></thead><tbody>");

            while ($saida = mysqli_fetch_array($query)) {
                $id_vendedor = $saida[0];
                $nome_vende = $saida[1];
                $tel_vende  = $saida[2];
                $cpf_vende  = $saida[3];
                $end_vende  = $saida[4];

                echo ("<tr>");
                echo ("<td>" . $id_vendedor . "</td>");
                echo ("<td>" . $nome_vende . "</td>");
                echo ("<td>" . $tel_vende  . "</td>");
                echo ("<td>" . $cpf_vende  . "</td>");
                echo ("<td>" . $end_vende  . "</td>");
                echo ("<td><a href='?excluir_id=" . $id_vendedor . "' id='botaoExcluir'>EXCLUIR</a></td>");
                echo ("<td><a href='alterar_ven.php?id=" . $id_vendedor . "'>ALTERAR</a></td>");
                echo ("</tr>");
            }

            echo ("</tbody></table></div>");

            if (isset($_GET['excluir_id'])) {
                $id = $_GET['excluir_id'];
                if (!empty($id)) {
                    $query = mysqli_query($conexao, "DELETE FROM vendedor WHERE id_vendedor = '$id'") or die("ERRO AO EXCLUIR");
                    $query =+ mysqli_query($conexao, "DELETE FROM venda WHERE id_vendedor = '$id'") or die("ERRO AO EXCLUIR");
                    echo "<div class='mensagem'>Registro <span>excluído</span> com sucesso!</div>";
                }
            }

            echo ("<div class='container-botoes'><a href=cadastro_ven.php><button>VOLTAR PARA O CADASTRO</button></a></div></div>");

            mysqli_close($conexao);
            ?>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../../js/script.js"></script>
    <script src="../../js/cursorPersonalizado.js"></script>
    <script src="../../js/consulta.js"></script>
</body>

</html>