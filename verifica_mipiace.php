<?php
    $array=array();
    $db = "datab1";
    $conn = mysqli_connect("localhost","root","",$db);
    $id_user = mysqli_real_escape_string($conn,$_GET['user_id']);
    $query = "SELECT id_social FROM mipiace WHERE id_user='$id_user'";
    $res = mysqli_query($conn,$query);

    while($row=mysqli_fetch_assoc($res)){
       $array[]=array(
           'id_social'=>$row['id_social']
       );

    }

    echo json_encode($array); //mi converete l'array in json cosi da poterlo passare
    mysqli_close($conn);
    
?>