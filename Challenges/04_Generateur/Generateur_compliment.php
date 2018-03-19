<?php

$compliments = [
    'adjectif' => ['super', 'magnifique', 'inegalable'],
    'type' => ["d'IA", "d'UI", "d'outil"],
    'logiciel' => ['Unreal', 'Unity', 'CryEngine']
];


    print "Merci pour ce script " .$compliments['type'][mt_rand(0, count($compliments['type'])-1)] ." tu est un " .$compliments['adjectif'][mt_rand(0, count($compliments['adjectif'])-1)] ." developpeur\n";
    print "Cela vas beaucoup nous aider pour notre " .$compliments['adjectif'][mt_rand(0, count($compliments['adjectif'])-1)] ." jeu sur " .$compliments['logiciel'][mt_rand(0, count($compliments['logiciel'])-1)] ."\n";
 ?>
