<?php
function arrayRand($data) {
    $randomIndex = mt_rand(0, count($data) - 1);

    // retourne un élément aléatoire d'un tableau
    return $data[$randomIndex];
}

function Insultron(){
    $adjectives1 = arrayRand(require(__DIR__.'/../data/adjectif.php'));
    $adjectives2 = arrayRand(require(__DIR__.'/../data/adjectif.php'));
    $animal = arrayRand(require(__DIR__.'/../data/animals.php'));
    $emoji = arrayRand(require(__DIR__.'/../data/emoji.php'));

    return sprintf(
        "Tu es %s comme un %s %s ! %s\n",
        $adjectives1,
        $adjectives2,
        $animal,
        $emoji
    );
}

?>
