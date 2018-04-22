<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/functions.php');

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/babyfootStyle.css">
</head>

<body class="Body Body_Index">
    <div class="Header Header_Index Overlay_Index">
        <p class="Title Header_Title Header_Element">BabyfootGames</p>
        <div class="Header_Description Header_Element">
            <p class="Text Text_20">description</p>
            <a class="Button Button_Index Text Text_15" href= "matchRank.php<?=getUrlEnd()?>">Voir les Classements</a>
        </div>
    </div>

    <div class="Ranking">
        <p class="Title Title_20"> Top 3</p>
        <div class="Ranking_Index">
            <?php
            for ($i=0; $i <3 ; $i++) {
                echo '<div class="Player">
                    <img class="Player_Img" src='.$players[$i]->avatar.'>
                    <p class=" Title Title_15">'.$players[$i]->name.' </p>
                    <p class="Text"> ratio : '.$players[$i]->getRatio().' </p>
                </div>';
            }
            ?>
        </div>
    </div>

</body>

</html>
