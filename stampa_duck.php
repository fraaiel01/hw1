<?php
    $db = "datab1";
    $conn = mysqli_connect("localhost","root","",$db);

    $query = "SELECT * FROM posts p join utente u on p.cliente=u.identificativo order by id desc";
    $res = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($res)){
        $array[]= array(
        'id' => $row['cliente'],
        'content' => json_decode($row['content']), //avendo passato un JSON_OBJECT
        'user'=> $row['email']);
    }
    echo json_encode($array);
    mysqli_close($conn);
?>