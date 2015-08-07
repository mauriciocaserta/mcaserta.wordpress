<?php

$id = $_POST["id"];

if (!empty($id)) {
    $data = array(
        'id' => $id
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://app.server/delete');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    $response = curl_exec($ch);
}
else{
    $response = array(
        'mensagem'=>'INFORME UM ID'
    );
}

echo json_encode($response);




