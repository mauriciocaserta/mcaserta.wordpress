<?php

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://app.server/usuarios');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        $response = curl_exec($ch);
     
       echo $response;
        
       