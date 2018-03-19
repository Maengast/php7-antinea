<?php

//word
$word = "";
$wordHide = "";
$charTry = "";
$numberOfTry = 0;
$maxTry = 9;
//Hangman
$hangManSymbol = array ('-','|','_','O','|','-','-','\\','/');
$hangManLine= array (array(5),array(4,3,2,1),array(0),array(1),array(2,3),array(2),array(2),array(4),array(4));
$hangManColumn= array (array(0,1,2),array(1),array(2,3,4),array(4),array(4),array(3),array(5),array(5),array(3));


SetWord();

//end game
//replay or exit game
function EndGame(){
    global $word;
    global $wordHide;
    global $charTry;
    global $numberOfTry;

    $yes = false;
    while (!$yes) {
        print "Voulez-vous rejouez? 1 : oui; 0: non\n";
        $userInput = trim(fgets(STDIN));
        if (is_numeric($userInput)){
            if ($userInput == 1){
                SetWord();
                $word = "";
                $wordHide = "";
                $numberOfTry = 0;
                $charTry = "";
            }
            else if ($userInput == 0){
                 exit("Fin\n");
            }
            else {
                print "Entrez une valeur egale a 1 ou 0 \n";
            }
        }else{
            print "Entrez une valeur numerique\n";
        }
    }
}

//result of user input
function Results($_ch){
    global $word;
    global $wordHide;
    global $charTry;
    global $numberOfTry;
    global $maxTry;
    if (strpos($word, strtoupper($_ch)) !== false || strpos($word, strtolower($_ch)) !== false){
        for ($i = 0; $i< strlen($word); ++$i){
            if (strtoupper($word)[$i] == strtoupper($_ch)[0]){
                $wordHide = ReplaceChar($wordHide,$i,$word[$i]);
                $word = ReplaceChar($word,$i,'_');
            }
        }
    }else{
        $numberOfTry++;
        DisplayHangMan();
        print "Faux , il vous reste " .($maxTry - $numberOfTry) ." essaie \n";
        $charTry.=$_ch;
    }
    if ($numberOfTry == $maxTry ){
        print "Vous avez perdue\n";
        EndGame();
    }
    else if (strpos($wordHide, "_") !== false){
        Play();
    }else{
        print "Vous avez gagner\n";
        print $wordHide ."\n";
        EndGame();
    }

}
//ask player 2 enter a char
function Play(){
    global $wordHide;

    $yes = false;
    while (!$yes) {
        print "Entrez une lettre\n";
        print $wordHide."\n";

        $_ch = trim(fgets(STDIN));
        if (CheckUserInput($_ch, true)) {
            Results($_ch);
            break;
        }
    }
}

//ask player 1 enter a word
function SetWord(){
    global $word;
    global $wordHide;
    global $maxTry;
    global $numberOfTry;
    $yes = false;
    while (!$yes) {
        print "Joueur 1 , entrez un mot \n";
        $word = trim(fgets(STDIN));;
        if (CheckUserInput($word,false)){
            for ($i = 0; $i<strlen($word);++$i) {
                if ($word[$i] == '-'){
                    $wordHide.= "-";
                }else $wordHide.= "_";
            }

            print "Joueur 2 , vous pouvez jouer \n";
            print "il reste " .($maxTry - $numberOfTry) ." essais \n";
            break;

        }
    }
    Play();
}

//check several condition
//empty string
//special char
//lenght
//char already entered
function CheckUserInput($_input, $_isChar){
    global $charTry;

    if ($_input == ""){
        print "Entrez un caractere \n";
        return false;
    }
    if (!CheckInput($_input)|| ($_isChar && $_input[0] == '-')){
        print "Entrez un mot sans numero ni caractere spéciaux \n";
        return false;
    }
    if($_isChar){
        if (strlen($_input)>1){
            print "Entrez un seul caractere \n";
            return false;
        }
        if (strpos($charTry, $_input) !== false){
            print "Vous avez déja entrez cette letrre \n";
            return false;
        }
    }
    return true;
}

//Check if word or char contain special char
function CheckInput($_input){
    $s = strtoupper($_input);
    for ($i = 0; $i < strlen($s); $i++) {
        if ((ord($s[$i]) < ord('A') || ord($s[$i]) > ord('Z')) && ord($s[$i]) != ord('-')){
            return false;
        }
    }
    return true;
}

//replace word char by another char
function ReplaceChar($_string, $_index, $_ch){
    $newString = $_string;
    $newString[$_index] = $_ch;
    return $newString;
}

//display hangman
function DisplayHangMan(){
    for($l=0; $l < 6;$l++){
        for ($c = 0; $c <6; $c++){
            $_symbol = ReturnSymbol($l,$c);
            if ($_symbol != 'N')print $_symbol;
            else print " ";
        }
        print "\n";
    }
}

//get symbol
function ReturnSymbol($_l, $_c){
    global $numberOfTry;
    global $hangManLine;
    global $hangManSymbol;
    global $hangManColumn;

    for ($i =0; $i< $numberOfTry; $i++) {
        $Line = false;
        $Column = false;
        for ($line = 0; $line <count($hangManLine[$i]); $line++) {
            for ($column = 0; $column < count($hangManColumn[$i]); $column++) {
                if ($hangManColumn[$i][$column] == $_c && $hangManLine[$i][$line] == $_l){
                    $Column = true;
                    $Line = true;
                    return $hangManSymbol[$i];
                }
            }
        }
    }
    return 'N';
}
 ?>
