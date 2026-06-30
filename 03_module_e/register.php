<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            width: 300px;
            height: 450px;
            padding: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            border: solid 1px black;
            border-radius: 10px;
            gap: 20px;
        }   

        h1 {
            text-align: center;
            font-size: 2.9rem;
        }

        input {
            height: 32px;
            padding: 5px;
            border: solid 1px black;
            border-radius: 5px;
        }

        button {
            height: 32px;
            padding: 5px;
            border: solid 1px black;
            border-radius: 5px;
            font-weight: bold;
            color: white;
            background: black;
            transition: 0.4s;
        }

        button:hover {
            color: black;
            background: white;
        }

        .junto {
            display: flex;
            flex-direction: column;
        }

        p {
            position: relative;
            bottom: -5px;
            left: 0;
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cadastre-se</h1>
        <div class="junto">
            <label for="nome_usuario">Nome:</label>
            <input type="text" name="nome_usuario" id="nome_usuario" placeholder="Digite seu Nome">
        </div>
        <div class="junto">
            <label for="email_usuario">E-mail:</label>
            <input type="email" name="email_usuario" id="email_usuario" placeholder="Digite seu E-mail">
        </div>
        <div class="junto">
            <label for="senha_usuario">Senha:</label>
            <input type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite sua Senha" required>
        </div>
        <button onclick="gravar()">Enviar</button>

        <p id="mensagem"></p>
    </div>

    <script>
        function gravar() {
            let nome_usuario = document.getElementById("nome_usuario").value;
            let email_usuario = document.getElementById("email_usuario").value;
            let senha_usuario = document.getElementById("senha_usuario").value;

            if (senha_usuario.trim() == "") {
                document.getElementById("mensagem").innerHTML =
                    "Senha é obrigatoria!";

                return;
            }

            fetch("api/gravar_usuario.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    body: JSON.stringify({
                        nome_usuario: nome_usuario,
                        email_usuario: email_usuario,
                        senha_usuario: senha_usuario
                    })
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    document.getElementById("mensagem").innerHTML = dados;
                });

            document.getElementById("email_usuario").value = "";
            document.getElementById("senha_usuario").value = "";
        }
    </script>
</body>

</html>