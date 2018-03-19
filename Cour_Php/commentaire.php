<?php
/*commentaire paragraphe*/
 print 'Coucou';//n'interprete pas
 print "Coucou\n";//interprete
 ?>
 ======
 ======
 <?php

 // les variables en camelCase = 75;
 $captainAge = 75;
 $parrotName = "Kikou";
 $shipName = "";

 // j'ai écrasé la valeur
 $captainAge = 32;
 $captainAgeLabel = "32 ans";

 echo $captainAge . "\n"; // concaténation
 echo 'Mon perroquet : ' .$parrotName. ', mon bateau : ' . $shipName . "\n";
?>

 <?php

 // 4 types "scalar"
 $captainName = "Albator"; // type string
 $captainAge = 23; // type integer
 $captainHeight = 1.70; // type float
 $captainDead = false; // type bool (true, false)

 // un tableau simple "array"
 $captainStats = [
     'name' => $captainName,
     'age' => $captainAge,
     'height' => $captainHeight,
     'is_dead' => $captainDead,
 ];

 // pour débugger le contenu d'une variable
 var_dump($captainName);
 var_dump($captainAge);
 var_dump($captainHeight);
 var_dump($captainDead);
 var_dump($captainStats);

 ?>
 =====
 Vérification des types
 =====

 <?php
 // pour du debug, mais moins descriptif
 print_r($captainStats);

 // savoir de quel type est une variable
 var_dump(is_string($captainAge)); // false
 var_dump(is_int($captainAge)); // true
 var_dump(is_bool($captainAge)); // false
 var_dump(is_array($captainAge)); // true

 ?>

 ====
 TYPE NULL
 ====

 <?php
 // variable qui n'est pas définie
 // contient null
 var_dump($gabriel); // NULL
 var_dump(isset($gabriel)); // false
 var_dump(isset($captainAge)); // true

 // enlever la valeur d'une variable
 $captainAge = null;
 var_dump($captainAge);

 ?>

 ====
 LES CONSTANTES
 ====
 <?php

 // définition d'une constante
 define('PIRATE_FLAG', '💀');

 // affichage SANS $
 echo PIRATE_FLAG;

 // on ne peut pas la modifier
 // PIRATE_FLAG = '🎏'; syntax error
 define('PIRATE_FLAG', '🎏');
