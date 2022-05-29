<?php
    include "Autentificazione.php";

    $db = "datab1";
    $conn = mysqli_connect("localhost","root","",$db);
    
    $email = $_SESSION["username"];
    $query1 = "SELECT identificativo FROM Utente WHERE email = '$email'";
    $res = mysqli_query($conn,$query1);
    $row = mysqli_fetch_assoc($res);

    $duck = mysqli_real_escape_string($conn,$_GET['duck']);
    $descr = mysqli_real_escape_string($conn,$_GET['descrizione']);
    $id=$row['identificativo'];

    $query = "INSERT INTO posts(cliente,content) VALUES('$id', JSON_OBJECT('url','$duck','descrizione','$descr'))";
    mysqli_query($conn,$query);
    mysqli_close($conn);
     
?>