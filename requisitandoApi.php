<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitando API</title>
</head>
<body>
    <h1>Requisitando api</h1>

    <form action="" method="post">
        <p>Veja todos os professores e suas turmas: </p>
        <button type="submit">enviar</button>
    </form>
    <br>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $url = "localhost:8080/professores";
    $ch = curl_init(); // Inicia a sessão cURL

    // Define a URL e o método GET (por padrão já é GET, mas é bom explicitar)
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string

    // Executa a requisição
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {

        
        $arrayDeArrays = json_decode($response, true);
        // 2. Acessar os dados (ex: percorrer o array)
        foreach ($arrayDeArrays as $subArray) {
            echo $subArray["nome"] . ": <br>";
            $quantidadeTurmas = count($subArray["turmas"]);
            for ($i=0; $i < $quantidadeTurmas; $i++) { 
                echo $subArray["turmas"][$i]["nome"] . "<br>";
            }
        }
    }

    curl_close($ch);
}





?>