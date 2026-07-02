<?php
include '../conexao/conexao.php';

session_start();

header('Content-Type: application/json; charset=utf-8');

$dados = json_decode(file_get_contents("php://input"), true);

$email_usuario = $dados['email_usuario'] ?? null;
$senha_usuario = $dados['senha_usuario'] ?? null;

$sql = "SELECT * FROM usuarios WHERE email_usuario = :email_usuario";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(":email_usuario", $email_usuario);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {

    if (password_verify($senha_usuario, $usuario['senha_usuario'])) {

        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['email_usuario'] = $usuario['email_usuario'];
        $_SESSION['senha_usuario'] = $usuario['senha_usuario'];

        echo json_encode([
            "sucesso" => true,
        ]);
    } else {

        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Senha inválida."
        ]);
    }
} else {
    echo json_encode([
        "sucesso" => false,
        "mensagem" => "Usuário não encontrado."
    ]);
}
