<?php

CheckArgv();

function CheckArgv(){
    global $argv;
    if (!(count($argv) == 4)){
        return print "Impossible à calculer, entrer une operation tel que : 5 + 3\n ";
    }
    for ($i = 1; $i<count($argv); $i++){
        if (!isset($argv)){
            return print "Entrez des valeurs non nul\n";
        }
    }
    if (!(is_numeric($argv[1]) && is_numeric($argv[3]))){
        return print "Entrer des valeurs numérique séparer par un opérateur\n";
    }

    if (!($argv[2] == '*' || $argv[2] == '-' || $argv[2] == '+' || $argv[2] == '/')){
        return print "Entrez un opérateur tel que '*', '/', '-','+'\n";
    }
    Calculate();
}

function Calculate(){
    global $argv;
    $total;
    switch ($argv[2]){
        case '-':
            $total =  $argv[1]-$argv[3];
        break;
        case '+':
            $total =  $argv[1]+$argv[3];
        break;
        case '/':
            if ($argv[2] == '/' && $argv[3] == 0){
                return print "Impossible de diviser par zero\n";
            }
            $total =  $argv[1]/$argv[3];
        break;
        case '*':
            $total =  $argv[1]*$argv[3];
        break;
    }

    print "Le resultat est " .$total ."\n";
}
 ?>
