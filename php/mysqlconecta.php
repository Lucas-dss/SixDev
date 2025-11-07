<?php

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$bancoDados = "pf";

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados) or die("problemas para conectar com o banco, verifique os dados");
