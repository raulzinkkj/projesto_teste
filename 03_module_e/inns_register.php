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
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            display: flex;
            align-items: center;
            padding: 10px;
            flex-direction: column;
            border: solid 1px black;
            border-radius: 10px;
            width: 100%;

        }

        h1 {
            font-size: 1.6rem;
            margin-bottom: 10px;
        }

        .tudojunto {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            width: 100%;
        }

        .tudojunto2-0 {
            display: grid;
            align-items: end;
            grid-template-columns: 1fr 1fr 1fr 200px;
            gap: 20px;
            width: 100%;
        }

        .juntinho {
            display: grid;
            align-items: end;
            grid-template-columns: 1fr 200px;
            gap: 20px;
            width: 100%;
        }

        .junto {
            padding: 10px;
            width: 100%;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }

        #listaComodidades {
            min-height: 40px;
        }

        #listaQuartos {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            min-height: 157px;
        }

        #listaImagens {
            min-height: 154px;
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
        <div class="tudojunto">
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
        </div>
        <div class="junto">
            <label for="">Comodidades:</label>
            <div style="display: flex; gap:5px; margin-top: 5px;">
                <input type="text" id="comodidade_pousada_e_hotel" placeholder="Ex: Wi-fi">

                <button type="button" onclick="adicionarComodidade()" style="width: 120px;">Adicionar</button>
            </div>
            <div id="listaComodidades" style="margin-top: 10px;"></div>
        </div>
        <div class="tudojunto2-0">
            <div class="junto">
                <label for="nome_quarto">Nome do Quarto:</label>
                <input type="text" name="nome_quarto" id="nomeQuarto" placeholder="Digite o nome do quarto">
            </div>
            <div class="junto">
                <label for="capacidade_quarto">Capacidade:</label>
                <input type="number" name="capacidade_quarto" id="capacidadeQuarto" placeholder="Digite a capacidade">
            </div>
            <div class="junto">
                <label for="preco_quarto">Preço Diário:</label>
                <input type="number" name="preco_quarto" id="precoQuarto" placeholder="Digite o preço">
            </div>
            <div class="junto">
                <button onclick="adicionarQuarto()">Adicionar Quarto</button>
            </div>
        </div>


        <div id="listaQuartos"></div>

        <div class="juntinho">
            <div class="junto">
                <label for="imagem_pousada_e_hotel">Imagem da Pousada ou Hotel:</label>
                <input type="file" name="imagem_pousada_e_hotel" id="imagem_pousada_e_hotel" multiple accept="image/*">
            </div>
            <div class="junto">
                <button onclick="gravar()">Enviar</button>
            </div>
        </div>
        <div id="listaImagens"></div>
        <p id="mensagem"></p>
    </div>
    <script>
        let comodidades_pousada_e_hotel = [];
        let quartos_pousada_e_hotel = [];
        let imagens_pousada_e_hotel = [];

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
                "quartos_pousada_e_hotel",
                JSON.stringify(quartos_pousada_e_hotel)
            );

            imagens_pousada_e_hotel.forEach(imagem => {
                formData.append("imagens_pousada_e_hotel[]", imagem);
            });

            fetch("api/cadastrar_pousada_e_hotel.php", {
                    method: "POST",
                    body: formData
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    window.location.href = "inns.php";
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

        function adicionarQuarto() {
            const nome_pousada_e_hotel = document.getElementById("nomeQuarto").value.trim();
            const capacidade_pousada_e_hotel = document.getElementById("capacidadeQuarto").value;
            const preco_pousada_e_hotel = document.getElementById("precoQuarto").value;

            if (nome_pousada_e_hotel == "" || capacidade_pousada_e_hotel == "" || preco_pousada_e_hotel == "") {
                alert("Preencha todos os campos.");
                return;
            }

            quartos_pousada_e_hotel.push({
                nome_pousada_e_hotel: nome_pousada_e_hotel,
                capacidade_pousada_e_hotel: Number(capacidade_pousada_e_hotel),
                precoDiario: Number(preco_pousada_e_hotel)
            });

            mostrarQuartos();

            document.getElementById("nomeQuarto").value = "";
            document.getElementById("capacidadeQuarto").value = "";
            document.getElementById("precoQuarto").value = "";
        }

        function mostrarQuartos() {

            const lista = document.getElementById("listaQuartos");

            lista.innerHTML = "";

            quartos_pousada_e_hotel.forEach((quarto_pousada_e_hotel, indice) => {

                lista.innerHTML += `
            <div style="
            border: solid 1px black;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            ">
            
            <b>${quarto_pousada_e_hotel.nome_pousada_e_hotel}</b><br>
            
            Capacidade: ${quarto_pousada_e_hotel.capacidade_pousada_e_hotel}<br>
            
            R$ ${quarto_pousada_e_hotel.precoDiario}
            
            <br><br>
            
            <button type="button" onclick="removerQuarto(${indice})">❌ Remover</button>
            </div>
            `;
            });
        }

        function removerQuarto(indice) {

            quartos_pousada_e_hotel.splice(indice, 1);

            mostrarQuartos();
        }

        document.getElementById("imagem_pousada_e_hotel").addEventListener("change", adicionarImagens);

        function adicionarImagens() {
            const arquivos = document.getElementById("imagem_pousada_e_hotel").files;

            for (const arquivo of arquivos) {
                if (imagens_pousada_e_hotel.length >= 5) {
                    alert("Máximo de 5 imagens.");
                    break;
                }

                imagens_pousada_e_hotel.push(arquivo);
            }

            document.getElementById("imagem_pousada_e_hotel").value = "";

            mostrarImagens();
        }

        function mostrarImagens() {
            const lista = document.getElementById("listaImagens");

            lista.innerHTML = "";

            imagens_pousada_e_hotel.forEach((imagem, indice) => {

                const reader = new FileReader();

                reader.onload = function(e) {

                    lista.innerHTML += `
                <div style="
                display: inline-block;
                margin: 10px;
                text-align:center;
                ">

                <img
                    src="${e.target.result}"
                    width="120"
                    height="90"
                    style="
                        object-fit: cover;
                        border-radius: 8px;
                        border: solid 1px gray;
                        ">

                        <br>

                        <button type="button" onclick="removerImagem(${indice})">❌ Remover</button>

                        </div>
            `;
                };

                reader.readAsDataURL(imagem);
            });
        }

        function removerImagem(indice) {
            imagens_pousada_e_hotel.splice(indice, 1);

            mostrarImagens();
        }

        const checkbox = document.getElementById("tema");
    </script>
</body>

</html>