<?php
require_once("./connexion.php")

 $request = $database->query('SELECT * FROM user');
 $stats = $request->fetchAll();


 foreach ($stats as $stat) { 

   <br> echo $stats['stat'] :  echo $stats['pseudo']<br/>

}
