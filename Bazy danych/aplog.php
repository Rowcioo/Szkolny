<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
  </head>
  <body>
  
<?php
  echo '<p><b>Aplikacja do logowania</b></p>';
  
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
                      <table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
                        <tr>
                          <td>Login:</td>
                          <td><input type=\"text\" name=\"login\" value=\"\"></td>
                        </tr>
                        <tr>
                          <td>Hasło:</td>
                          <td><input type=\"text\" name=\"haslo1\" value=\"\"></td>
                        </tr>
                        <tr>
                          <td>Hasło (powtórnie):</td>
                          <td><input type=\"text\" name=\"haslo2\" value=\"\"></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td align=\"right\"><input type=\"submit\" name=\"konto\" value=\"Załóż\"></td>
                        </tr>
                      </table>
                    </form>
                  </p>
                  ";
              break;
              
              
              case 'zaloz_konto':
                  if (
                        isset($_POST['login']) and 
                        $_POST['login'] != ''  and 
                        isset($_POST['haslo1']) and 
                        $_POST['haslo1'] != ''  and 
                        isset($_POST['haslo2']) and 
                        $_POST['haslo2'] != ''  and 
                        $_POST['haslo1'] === $_POST['haslo2']
                     )
                  {
                      // Sprawdzamy, czy podany login istnieje w bazie
                      $q = "
                            SELECT login 
                              FROM osoby
                              WHERE login = '$_POST[login]'
                           ";
                      $r = mysqli_query($mdb, $q);
                      if (mysqli_num_rows($r) == 0)
                      {
                          // Ok, login nie istnieje 
                          // Zapisujemy do bazy
                          // Tworzymy nowe konto
                          $q = "
                                INSERT INTO 
                                    osoby(login, haslo)
                                  VALUES ('$_POST[login]', '$_POST[haslo1]')
                               ";
                          $r = mysqli_query($mdb, $q);
                          header('Location: ./sesje.php');
                      }
                      else
                          echo
                          "
                          <p>
                            Nie założono konta. Podany login istnieje już w bazie
                            <a href=\"./aplog.php?p=nowe_konto\">[Powrót]</a>
                          </p>
                          ";
                      //echo "<p>$q;</p>";
                  }
                  else
                  {
                      echo
                      "
                      <p>
                        Nie podano poprawnych wartości
                        [Powrót]
                      </p>
                      ";
                  }
                  
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
