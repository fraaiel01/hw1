<?php

    if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["conferma_password"]) &&
       !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["data"])){
        $db = "datab1";
        //connetto database
        $conn = mysqli_connect("localhost","root","",$db);
        $error = array();
        
        //controllo la validità della email
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $error[] = "email non valida";
        }

        //contollo la validità della password
        if(strlen($_POST["password"]) <8){
            $error[] = "Inserisci una password con almeno 8 caratteri";
        }

        if($_POST["password"] != $_POST["conferma_password"]){
            $error[] = "Le password inserite non corrispndono";
        }

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $data = mysqli_real_escape_string($conn, $_POST['data']);

        $query = "SELECT email FROM utente WHERE email = '$email'";
        $res = mysqli_query($conn, $query);

        if (mysqli_num_rows($res) > 0){
            $error[] = "email già utilizzata";
        }

        if(count($error) == 0) {
            $query = "INSERT INTO utente (nome, cognome, data_nascita,email,password) VALUES('$nome', '$cognome','$data','$email','$password')";
            if (mysqli_query($conn, $query)) {
                $_SESSION["identificativo"] = mysqli_insert_id($conn);
                $_SESSION["username"] = $_POST["email"];
                $_SESSION["nome"] = $_POST["nome"];  
                $_SESSION["cognome"] = $_POST["cognome"];
                mysqli_close($conn);
                header("Location: home_1.php");
                exit;

            }

        }

        mysqli_close($conn);    

    }

    if(isset($error)){
        foreach ($error as $e) {
            echo "<div class='error'>$e</div>";

        }

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <title>Signup</title>
        <link rel="stylesheet" href="css/Registrazione_2.css">
        <script  src="script/Registrazione2.js" defer="true"></script>

    </head>

<body>

<div id=pagina>
 <section>

 <div id='riquadro'>
 <h1>Effettua la registrazione!</h1>
  
<form name='signup' method='post'>
  
    <div class="padre">
    <div class="nome">
        <label>Nome <br></label><input type="text" name="nome">
    </div>
    </div>

    <div class="padre">
    <div class="cognome">
        <label>Cognome<br></label><input type="text" name="cognome">
    </div>
    </div>

    <div class="padre">
    <div class="data">
        <label>Data di Nascita<br></label><input type="date" name="data">
    </div>
    </div>

    <div class="padre">
    <div class="email">
        <label>Email<br></label><input type="text" name="email">
    </div>
    </div>

    <div class="padre">
    <div class="password">
        <label>Password<br></label><input type='password' name='password'>
    </div>
    </div>

    <div class="padre">
    <div class="conferma_password">         
    <label>Conferma Password<br></label><input type='password' name='conferma_password'>
    </div>
    </div>

    <div class="err"></div>
    <div class="submit">
    <input type='submit' value="Registrati">
    </div> 
</form>

    <div class="signup">Hai un account? <a href="login_1.php ">Accedi!</a></div>
  </div>

 </section>

 </div>

 </body>

</html>