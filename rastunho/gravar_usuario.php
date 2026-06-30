<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = json_decode(file_get_contents("php://input"), true);

    $usuario = $dados['usuario'];

    $sql = "INSERT INTO usuarios (usuario) VALUES (:usuario)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->execute();

    echo json_encode(["mensagem" => "Nome gravado com sucesso!"]);
}
