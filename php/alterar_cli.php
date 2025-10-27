<?php
include "mysqlconecta.php";

if (isset($_GET["id"])) {
    $id_cliente = $_GET["id"];

    // Se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome_cliente = $_POST["nome_cliente"];
        $tel = $_POST["tel"];
        $cpf = $_POST["cpf"];
        $end = $_POST["end"];

        $query = mysqli_query(
            $conexao,
            "UPDATE cliente 
             SET nome_cliente = '$nome_cliente', tel = '$tel', cpf = '$cpf', end = '$end' 
             WHERE id_cliente = '$id_cliente'"
        ) or die("Erro na atualização");

        if ($query) {
            echo "<div class='mensagem'>ALTERADO COM <span> SUCESSO </span></div>";
        } else {
            echo "<div class='mensagem'><h1>ERRO AO ALTERAR</h1></div>";
        }
    }

    // Buscar dados atuais do cliente
    $query = mysqli_query(
        $conexao,
        "SELECT id_cliente, nome_cliente, tel, cpf, end 
         FROM cliente 
         WHERE id_cliente = '$id_cliente'"
    ) or die("ERRO");

    while ($saida = mysqli_fetch_array($query)) {
        $id_cliente = $saida['id_cliente'];
        $nome_cliente = $saida['nome_cliente'];
        $tel = $saida['tel'];
        $cpf = $saida['cpf'];
        $end = $saida['end'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Six Dev | Alterar Cliente</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/alterar.css">
    <link rel="icon" href="../img/Icon.png">
</head>

<body>
    <div class="custom-cursor site-wide">
        <div class="pointer"></div>
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
                <a href="consulta_cli.php"><img src="https://cdn-icons-png.flaticon.com/512/702/702988.png" alt="icon de consulta"></a>
                <h1>Clientes</h1>
                <a href="cadastro_cli.php"><img src="https://cdn-icons-png.flaticon.com/512/748/748137.png" alt="icon de cadastro"></a>
            </div>
            <div class="container-alterar">
                <form method="POST" action="">
                    <h1>Alteração do Registro do Cliente</h1>
                    <div class="container-tabela">
                        <table>
                            <tr>
                                <td><b>ID</b></td>
                                <td><b>Nome</b></td>
                                <td><b>Telefone</b></td>
                                <td><b>CPF</b></td>
                                <td><b>Endereço</b></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="id" value="<?php echo $id_cliente; ?>" readonly></td>
                                <td><input type="text" name="nome_cliente" value="<?php echo $nome_cliente; ?>" minlength="4" maxlength="50" autofocus></td>
                                <td><input type="text" name="tel" value="<?php echo $tel; ?>" minlength="11" maxlength="11"></td>
                                <td><input type="text" name="cpf" value="<?php echo $cpf; ?>" minlength="11" maxlength="11"></td>
                                <td><input type="text" name="end" value="<?php echo $end; ?>" minlength="7" maxlength="100"></td>
                            </tr>
                        </table>
                    </div>
                    <button type="submit">Salvar</button>
                </form>
            </div>
            <?php
            echo ("<div class='container-botoes'><a href=consulta_cli.php><button>PÁGINA ANTERIOR</button></a>");
            echo ("<a href=../index.html><button>VOLTAR PARA A PÁGINA INICIAL</button></a></div>");
            mysqli_close($conexao);
            ?>
        </section>
    </main>
    <footer>
        <p>SixDev Technology © 2025</p>
    </footer>
    <script src="../js/script.js"></script>
    <script src="../js/cursorPersonalizado.js"></script>
</body>

</html>