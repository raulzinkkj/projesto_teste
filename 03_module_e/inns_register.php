<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inns-Registro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            align-items: center;
            padding: 10px;
            flex-direction: column;
            border: solid 1px black;
            border-radius: 10px;
            width: 400px;
        }

        h1 {
            font-size: 1.6rem;
            margin-bottom: 10px;
        }

        .junto {
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        label {
            font-weight: bolder;
        }

        input {
            margin-top: 5px;
            width: 100%;
            height: 35px;
            border-radius: 5px;
            border: solid 1px gray;
            padding: 5px;
        }

        input[type="file"] {
            margin-top: 5px;
            width: 100%;
            height: 35px;
            border: solid 1px gray;
            padding: 5px;
            border-radius: 5px;
        }

        button {
            margin-top: 5px;
            width: 100%;
            height: 35px;
            border-radius: 5px;
            border: solid 1px black;
            padding: 5px;
            background: black;
            color: white;
            transition: 0.3s;
            font-weight: bold;
        }

        button:hover {
            background: white;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Pousadas e Hotéis</h1>
        <div class="junto">
            <label for="nome_pousada_e_hotel">Nome da Pousada ou Hotel:</label>
            <input type="text" name="nome_pousada_e_hotel" id="nome_pousada_e_hotel" placeholder="Digite o Nome">
        </div>
        <div class="junto">
            <label for="local_pousada_e_hotel">Local da Pousada ou Hotel:</label>
            <input type="text" name="local_pousada_e_hotel" id="local_pousada_e_hotel" placeholder="Digite o Local">
        </div>
        <div class="junto">
            <label for="preco_pousada_e_hotel">Preço da Pousada ou Hotel:</label>
            <input type="text" name="preco_pousada_e_hotel" id="preco_pousada_e_hotel" placeholder="Digite o Preço">
        </div>
        <div class="junto">
            <label for="">Comodidades:</label>
            <div style="display: flex; gap:5px; margin-top: 5px;">
                <input type="text" id="comodidade_pousada_e_hotel" placeholder="Ex: Wi-fi">

                <button type="button" onclick="adicionarComodidade()" style="width: 120px;">Adicionar</button>
            </div>
            <div id="listaComodidades" style="margin-top: 10px;"></div>
        </div>
        <div class="junto">
            <label for="imagem_pousada_e_hotel">Imagem da Pousada ou Hotel:</label>
            <input type="file" name="imagem_pousada_e_hotel" id="imagem_pousada_e_hotel">
        </div>
        <div class="junto">
            <button onclick="gravar()">Enviar</button>
        </div>

        <p id="mensagem"></p>
    </div>
    <script>
        let comodidades_pousada_e_hotel = [];

        function gravar() {
            const formData = new FormData();

            formData.append(
                "nome_pousada_e_hotel",
                document.getElementById("nome_pousada_e_hotel").value
            );

            formData.append(
                "local_pousada_e_hotel",
                document.getElementById("local_pousada_e_hotel").value
            );

            formData.append(
                "preco_pousada_e_hotel",
                document.getElementById("preco_pousada_e_hotel").value
            );

            formData.append(
                "comodidades_pousada_e_hotel",
                JSON.stringify(comodidades_pousada_e_hotel)
            );

            formData.append(
                "imagem_pousada_e_hotel",
                document.getElementById("imagem_pousada_e_hotel").files[0]
            );

            fetch("api/cadastrar_pousada_e_hotel.php", {
                    method: "POST",
                    body: formData
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    document.getElementById("mensagem");
                })
        }

        function adicionarComodidade() {
            const input = document.getElementById("comodidade_pousada_e_hotel");

            const texto = input.value.trim();

            if (texto == "") {
                return;
            }

            comodidades_pousada_e_hotel.push(texto);

            input.value = "";

            mostrarComodidades();
        }

        function mostrarComodidades() {
            const lista = document.getElementById("listaComodidades");

            lista.innerHTML = "";

            comodidades_pousada_e_hotel.forEach((item, indice) => {

                lista.innerHTML += `
                <div style="display: inline-block;">
                <div style="
                    display: flex;
                    padding: 2px 2px;
                    align-items: center;
                    margin-top: 5px;
                    border: solid 1px gray;
                    border-radius: 5px;
                    width: auto;
                    height: auto;
                    ">

                    <span>${item}</span>

                <button
                type="button"
                onclick="removerComodidades(${indice})"
                style="width: auto; height: auto; font-size: 0.7rem; margin-left: 3px; background: transparent; border: none;">
                ❌
                </button>

                </div>

                </div>
                    `;

            });
        }

        function removerComodidades(indice) {
            comodidades_pousada_e_hotel.splice(indice, 1);

            mostrarComodidades();
        }
    </script>
</body>

</html>