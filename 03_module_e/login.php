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
            height: 350px;
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
            font-size: 2.5rem;
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
        <h1>Login</h1>
        <div class="junto">
            <label for="email_usuario">E-mail:</label>
            <input type="email" name="email_usuario" id="email_usuario" placeholder="Digite seu E-mail">
        </div>
        <div class="junto">
            <label for="senha_usuario">Senha:</label>
            <input type="password" name="senha_usuario" id="senha_usuario" placeholder="Digite sua Senha" required>
        </div>

        <button onclick="validar()">Entrar</button>

        <p id="mensagem"></p>
    </div>

    <script>
        function validar() {
            let email_usuario = document.getElementById("email_usuario").value;
            let senha_usuario = document.getElementById("senha_usuario").value;

            if (email_usuario.trim() == "") {
                document.getElementById("mensagem").innerHTML = "Digite o E-mail!";

                document.getElementById("senha_usuario").focus();
                return;
            }

            if (senha_usuario.trim() == "") {
                document.getElementById("mensagem").innerHTML = "Digite a Senha!";

                document.getElementById("senha_usuario").focus();
                return;
            }


            fetch("api/verifica_login.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    body: JSON.stringify({
                        email_usuario: email_usuario,
                        senha_usuario: senha_usuario
                    })
                })
                .then(resposta => resposta.json())
                .then(dados => {

                    if (dados.sucesso) {
                        window.location.href = "inns.php";
                    } else {
                        document.getElementById("mensagem").innerHTML = dados.mensagem;
                    }

                })
                .catch(erro => {
                    console.error(erro);
                    document.getElementById("mensagem").innerHTML = "Erro ao realizar login.";
                });

        }
    </script>
</body>

</html>