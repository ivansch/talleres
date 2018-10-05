<pre>
<?php

  $opt =  [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  $host = 'mysql:host=127.0.0.1;dbname=talleres;port=8889';
  $db_user = 'root' ;
  $db_pass = 'root' ;

try {

  $db = new PDO($host, $db_user, $db_pass, $opt);
  
  $db = null;
} catch (\Exception $e) {


  echo $e->getMessage();
}
