<?php
    $db = "datab1";
    $conn = mysqli_connect("localhost","root","",$db);
    $id_user = mysqli_real_escape_string($conn,$_GET['user_id']);
    $id_social = mysqli_real_escape_string($conn,$_GET['social_id']);
    $query = "DELETE FROM mipiace WHERE id_user=$id_user and id_social=$id_social";
    echo $query;
    mysqli_query($conn,$query);
    mysqli_close($conn);
        //echo 11;
    
?>