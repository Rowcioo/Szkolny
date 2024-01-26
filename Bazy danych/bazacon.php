<?php
  $db_server   = 'localhost';
  $db_user     = 'wiauser';
  $db_password = 'MalyCzarny669';
  $db_name     = 'wiadb';
  
  // Proba nawiazania polaczenia z serwerem baz danych
  // Podejscie proceduralne
  
  try
  {
	  $mdb = mysqli_connect(
							$db_server, 
							$db_user, 
							$db_password, 
							$db_name
						   );
  }
  catch (mysqli_sql_exception $wyj)
  {
	  $wyj_wiadomosc = $wyj->getMessage();
	  $wyj_numer     = $wyj->getCode();
	  echo "<p>Wyjatek info: $wyj_wiadomosc | numer: $wyj_numer</p>"; 
	  die('Blad polaczenia z serwerem baz danych. Koniec aplikacji.');
	  //exit('Blad polaczenia z serwerem baz danych. Koniec aplikacji.');
    //exit(1);
  }
  

