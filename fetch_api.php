<?php
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL,
    "https://random-d.uk/api/random");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
    $res = curl_exec($curl);
    echo($res);

?>