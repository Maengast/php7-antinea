<?php

$fileText = file('fichier_text.txt', FILE_USE_INCLUDE_PATH | FILE_SKIP_EMPTY_LINES);
$char = [];
$charCount = 0;

foreach ($fileText as $line) {
    $line = trim($line);
    for ($i = 0; $i < strlen($line); $i++){
        if (!($line[$i] == " ")){
            if (array_key_exists($line[$i],$char)){
                $char[$line[$i]]++;
            }else{
                $char[$line[$i]] = 1;
            }
            $charCount++;
        }
    }
}

print_r($char);
print count($char) ."(".$charCount.")";

 ?>
