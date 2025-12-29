<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitando API</title>
</head>
<body>
    <h1>Requisitando api</h1>
    <h2>descubra sua rua(logradouro) a partir do cep</h2>

    <form action="" method="post">
        digite seu cep:
        <input type="text" name="cep" id="">
        <button type="submit">enviar</button>
    </form>
    <br>
</body>
</html>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cep = $_POST['cep'];

    $url = "https://viacep.com.br/ws/$cep/json/";
    $ch = curl_init(); // Inicia a sessão cURL

    // Define a URL e o método GET (por padrão já é GET, mas é bom explicitar)
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como string

    // Executa a requisição
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Erro cURL: ' . curl_error($ch);
    } else {

        $data = json_decode($response, true);
        print_r("Este é sua rua(logradouro): " . $data['logradouro']);
    }

    curl_close($ch);
}





?>