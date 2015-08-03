<?php

$nome = $_POST["nome"];
$senha = $_POST["senha"];

if (!empty($nome) && !empty($senha)) {
    
    $data = array(
        'nome'=>$nome,
        'senha'=>$senha
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://app.server/cadastro');
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