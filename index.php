<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="gravar_usuario.php" method="post">
        <label for="usuario">Nome do usuario:</label>
        <input type="text" name="usuario" id="usuario">

        <button type="submit">Enviar</button>
    </form>
    <script>
        function gravar() {
            fetch("gravar_usuario.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "aplication/json"
                    },
                    body: JSON.stringify({
                        usuario: document.getElementById("usuario").value
                    })
                })
                .then(r => r.json())
                .then(d => console.log(d));
        }
    </script>
</body>

</html>