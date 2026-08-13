<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

if (empty($titulo) || empty($autor) || empty($ano)) {
    die("Todos os campos devem ser preenchidos");
}

$sql = "UPDATE livros 
        SET titulo = ?, autor = ?, ano = ?
        WHERE id = ?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "ssii", $titulo, $autor, $ano, $id);

mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);

header("Location: ../index.php");
