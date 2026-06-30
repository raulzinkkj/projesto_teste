<?php
include '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents("php://input"), true);

    $nome_usuario = $dados['nome_usuario'] ?? null;
    $email_usuario = $dados['email_usuario'] ?? null;
    $senha_usuario = $dados['senha_usuario'] ?? null;

    $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario)
            VALUES (:nome_usuario, :email_usuario, :senha_usuario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':email_usuario', $email_usuario);
    $stmt->bindParam(':senha_usuario', $senha_usuario);
    $stmt->execute();

    echo "Nome gravado com sucesso!";
}
