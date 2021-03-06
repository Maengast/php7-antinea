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

<body class="Body Body_Ranking">
    <?=createHeader("Player")?>
    <main class="Ranking">
        <div class="Match Ranking_Header Title_15">
            <p class="Ranking_Element Ranking_Header_Element"> n° </p>
            <p class="Ranking_Element_3 Ranking_Header_Element"> Avatar </p>
            <p class="Ranking_Element_4 Ranking_Header_Element"> Pseudo </p>
            <a class="Ranking_Element Ranking_Header_Element" href="<?=getNewURL("sortType","nb_victory")?>"> Victoire </a>
            <a class="Ranking_Element Ranking_Header_Element" href="<?=getNewURL("sortType","nb_defeat")?>"> Défaite </a>
            <a class="Ranking_Element_2 Ranking_Header_Element" href="<?=getNewURL("sortType","ratio")?>"> Ratio </a>
        </div>

        <div class="Ranking_Matches">

            <?php
                //display button for add form or a form
                if((isset($form)== true) && (isset($_POST["actionForm"]) == false)){
                    echo $form->displayForm();
                }else{
                    echo '<div class="Match Match_Button">
                        <a class="Button Button_AddForm Text Text_15" href='.getNewURL('form','p').'>Add Player</a>
                    </div>';
                }

                //display  matches
                for($i=$start;$i<$end;$i++){
                    if (isset($players[$i])){
                        echo $players[$i]->displayPlayer();
                    }
                    else break;
                }

                if (count($players)>$elementByPage) echo createPagination((int)$currentPage,(int)getPagesNb(count($players)));

            ?>
        </div>
    </main>
</body>
