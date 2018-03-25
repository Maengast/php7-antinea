<?php
    $projectDirectory = __DIR__;
    require_once(__DIR__.'/src/functions.php');

    $keyShow = getRandomShow();
    header("Location:/php7-antinea/Challenges/06_alphaseries/serie.php?name=".$keyShow);
?>
