<?php

$nome = $_POST["nome"];
$senha = $_POST["senha"];

    if (!empty($nome) && !empty($senha)) {
        
        $retorno = false;

        $data = array(
           'nome' => $nome,
           'senha' => $senha
       );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http://app.server/login');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));

            $response = curl_exec($ch);

            $response = json_decode($response);
            
            if ($response->retorno != null) {
                $retorno = true;
            } else {
                $retorno = false;
            }
        }else{
            
        $retorno = array(
           'retorno' => 'Insira um nome de Usuário e a Senha'
        );
    }
    
        $rArr = array(
            'retorno' => $retorno
        );
    
    echo json_encode($rArr);

   