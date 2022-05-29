<?php
   include "autentificazione.php";
?> 

<DOCTYPE html>
<html>
   <head>
     <meta name="viewport"content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="css/Home_2.css"/>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
   </head>
 <body>  
    
 <header>
  <div id="overlay"></div>
  <nav id="navigazione">
     <div id="titolo">SOCIAIEL</div>
      <div id="elementi">
      <?php
                    $text = "Login";
                    echo "<a class='login' href='login_1.php'>$text</a>";
                    if(checkAuth()){
                        $text = "Area Post";
                        echo "<a class='login' href='AreaPersonale_1.php'>$text</a>";
                      }
                    if(checkAuth()){
                        $text = "Canale Social";
                        echo "<a class='social' href='Social.php'>$text</a>";
                      }
                  
                    
                  
       ?>
      <a id="logout" href="logout_1.php">Logout</a>
     </div>
   </nav>
  <h1>IL BLOG SUI SOCIAL</h1>
 </header>
   <p>
     Benvenuto, eseguendo il login avrai la possibilità di accedere a pagine esclusive solo per i membri registrati
     al sito. Eccole elencate qui sotto.<br>
     <br>
     In Area Post avrai la possibilità di generare immagini random di papere e poterle pubblicare in tale area aggiungundo un commneto. I tuoi
     caricamenti ed i tuoi commenti verranno visionati da tutti gli utenti<br>
     <br>
     Nel Canale Social troverai tutte le informazioni riguardanti i social più conosciuti e avrai la possibilità di supportare quelli che 
     preferisci tramite un mi piace<br>
     <br>
     Cosa aspetti? Esegui la registrazione!
   </p>

</body>   