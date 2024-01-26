<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  
<?php
  echo '<p>Aplikacja do logowania</p>';
  
  require('./bazacon.php');
  
  // Inicjujemy sesje
  session_start();
  
  if (isset($_GET['p']))
  {
          switch($_GET['p'])
          {
              case 'nowe_konto':
                  // ****************
                  echo
                  "
                  <p>
                    <u>Zakładanie nowego konta</u><br>
                      <form method=\"post\" action=\"./aplog.php?p=zaloz_konto\">
                      <table>
                      <tr>
                        <td><b>Imie:</b></td> <td><input type=\"text\" name=\"imie1\" value=\"\"></td>
                        </tr>
                      <tr>
                        <td><b>Nazwisko:</b></td> <td><input type=\"text\" nazwisko=\"login\" value=\"\"><br></td>
                      </tr>
                      <tr>
                        <td><b>Hasło:</b></td> <td><input type=\"text\" name=\"haslo1\" value=\"\"></td>
                      </tr>
                      <tr>
                        <td><b>Hasło (powtórnie):</b></td> <td><input type=\"text\" name=\"haslo2\" value=\"\"></td>
                      </tr>
                        <input type=\"submit\" name=\"konto\" value=\"Załóż\">
                      </table>
                    </form>
                  </p>
                  ";
              break;
          }
  } 
  else
  {
      // Nie podano parametru
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
      
  }
  
 
  
  
  
?>
  </body>
</html>
