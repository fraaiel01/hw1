<?php
    
    include "Autentificazione.php";
    
    if(!checkAuth())
        header("Location: home_1.php")

    
?> 

<!DOCTYPE html>
<html>

<head>
   <meta name="viewport"content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/AreaP_2.css"/>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
   <script  src="script/AreaPers.js" defer="true"></script>
</head>   
     <body>  
         <header>
          <div id="overlay"></div>
            <nav id="navigazione">
             <div id="titolo">SOCIAIEL</div>
                <div class="elementi">
                  <a id="home" href="home_1.php">Home</a>
                  <a id="social" href="Social.php">Canale Social</a>
                  <a id="logout" href="logout_1.php">Logout</a>

                </div>
            </nav>
           <h1>AREA POST</h1>
         </header>
 
         <div id="profilo">
          <img class="utente" src="images/utente_p.png"/>
            <?php
              $text2="Benvenuto nella tua Area Personale";
              $nome= $_SESSION["username"];
              echo"<div class='bv'>$text2</div>";
              echo"<div class='nome'><strong>$nome</strong></div>";

             ?>
         </div>
         
        <section>
         <form name="post" method='post' id='form'>

              <div>
                <input type="submit" value = "CLICCA PER GENERARE UNA PAPERA" id="ricerca">
                <div id="risposta"></div>
            </div>
            <div class = "submit hidden" id= 'invio1'>
                <label">INSERISCI UN COMMENTO : </label><input type="text" name="descrizione" id="commento">
            </div>
            <div class="submit hidden" id = 'invio2'>
                <input type="submit" value="CARICA NELLA SEZIONE POST" id="salva">
            </div>
          </form>
         <h1>POST CARICATI</h1>
         <div id='risposta2'></div>
        </section> 
           
        <footer>
           <div id="intestazione_finale">© 2022 SOCIAIEL <br>
                 STUDENTE: Francesco Aiello <br>
                 MATRICOLA: 1000003387
        </footer>
        
    </body>

</html>