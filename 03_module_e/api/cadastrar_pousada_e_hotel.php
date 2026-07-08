<?php
// Inclusão do arquivo de conexão
include '../conexao/conexao.php';
//Variáveis que pegam o valor do formulário
//$dados = json_decode(file_get_contents("php://input"), true);
$nome_pousada_e_hotel = $_POST['nome_pousada_e_hotel'];
$local_pousada_e_hotel = $_POST['local_pousada_e_hotel'];
$preco_pousada_e_hotel = $_POST['preco_pousada_e_hotel'];
$comodidades_pousada_e_hotel = $_POST['comodidades_pousada_e_hotel'];
$quartos_pousada_e_hotel = $_POST['quartos_pousada_e_hotel'];
$imagens_pousada_e_hotel = $_FILES['imagens_pousada_e_hotel'];

for ($i = 0; $i < count($imagens_pousada_e_hotel["name"]); $i++) {
        $nome_imagem = time() . "_" . $imagens_pousada_e_hotel['name'][$i];

        move_uploaded_file(
                $imagens_pousada_e_hotel['tmp_name'][$i],
                '../uploads/' . $nome_imagem
        );
}

//Insere os registros no banco de dados
$sql = "INSERT INTO pousadas_e_hoteis (nome_pousada_e_hotel, local_pousada_e_hotel, preco_pousada_e_hotel, comodidades_pousada_e_hotel, quartos_pousada_e_hotel, imagem_pousada_e_hotel)
        VALUES (:nome_pousada_e_hotel, :local_pousada_e_hotel, :preco_pousada_e_hotel, :comodidades_pousada_e_hotel, :quartos_pousada_e_hotel, :imagem_pousada_e_hotel)";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome_pousada_e_hotel', $nome_pousada_e_hotel);
$stmt->bindParam(':local_pousada_e_hotel', $local_pousada_e_hotel);
$stmt->bindParam(':preco_pousada_e_hotel', $preco_pousada_e_hotel);
$stmt->bindParam(':comodidades_pousada_e_hotel', $comodidades_pousada_e_hotel);
$stmt->bindParam(':quartos_pousada_e_hotel', $quartos_pousada_e_hotel);
$stmt->bindParam(':imagem_pousada_e_hotel', $nome_imagem);
$stmt->execute();
