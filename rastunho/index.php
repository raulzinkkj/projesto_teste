<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label for="usuario">Nome do usuario:</label>
    <input type="text" name="usuario" id="usuario">

    <button onclick="gravar()">Enviar</button>

    <p id="mensagem"></p>

    <script>
        function gravar() {
            let usuario = document.getElementById("usuario").value;
            
            fetch("gravar_usuario.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json"
                    },
                    body: JSON.stringify({
                        usuario: usuario
                    })
                })
                .then(resposta => resposta.text())
                .then(dados => {
                    document.getElementById("mensagem").innerHTML = dados;
                });
        }
    </script>
</body>

</html>