<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  
<?php
  echo '<p>Aplikacja do logowania</p>';
  
  // Inicjujemy sesje
  session_start();
  
  //$_SESSION['kazio'] = 'jestem';

  
  if (isset($_GET['wyloguj']))
  {
      unset($_SESSION['login']);
  } 


  if (isset($_POST['user']))
  {
      $_SESSION['login'] = $_POST['user'];
      header('Location: ./sesje.php');
  }    
  
  
  if (isset($_SESSION['login']))
  {
      echo
      "
      <p>
        Zalogowany: $_SESSION[login]<br>
        <a href=\"./sesje.php?wyloguj\">[Wyloguj]</a>
      </p>
      ";
  }
  else
  {
      // Formularz do logowania
      echo
      "
      <form method=\"post\" action=\"./sesje.php\">
        <input type=\"text\" name=\"user\" value=\"\"><br>
        <input type=\"submit\" name=\"login\" value=\"Zaloguj\">
      </form>
      ";
      
      // Link do zakladania konta
      echo
      "
      <p>
        Załóż <a href=\"./aplog.php?p=nowe_konto\">[Nowe konto]</a>
      </p>
      ";
  }
  
 
  
  
  
?>
  </body>
</html>
