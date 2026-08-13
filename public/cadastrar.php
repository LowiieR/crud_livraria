<?php

include "../infra/conexao.php";

$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

if (empty($titulo) || empty($autor) || empty($ano)) {
    die("Todos os campos devem ser preenchidos.");
}

$sql = "INSERT INTO livros (titulo,autor,ano) VALUES ('?','?','?')";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssi", $titulo, $autor, $ano);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("Location: ../index.php");
?>