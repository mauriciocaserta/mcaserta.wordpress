<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$assunto = $_POST["assunto"];
$mensagem = $_POST["mensagem"];

if (!empty($nome) && !empty($email) && !empty($assunto) && !empty($mensagem)) {

    $data = array(
        'nome' => $nome,
        'email' => $email,
        'assunto' => $assunto,
        'mensagem' => $mensagem
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://app.server/contato');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));

    $response = curl_exec($ch);
} else {
    $response = array (
        'erro' => true,
        'mensagem' => 'Campos inválidos'
    );
}

echo json_encode($response);