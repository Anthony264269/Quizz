<?php
require_once("./connexion.php");

 $request = $database->query('SELECT * FROM user');
 $stats = $request->fetchAll();


 foreach ($stats as $stat) { 

   echo $stat['stat'];
   echo $stat['pseudo'];

}
