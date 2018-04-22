<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/functions.php');
$matches = createMatches();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/babyfootStyle.css">
</head>

<body class="Body Body_Ranking">
    <?=createHeader("Match")?>

    <main class="Ranking">
        <div class="Match Ranking_Header Title_15">
            <p class="Ranking_Element Ranking_Header_Element"> n° </p>
            <p class="Ranking_Element_4 Ranking_Header_Element"> Equipe n°1 </p>
            <a class="Ranking_Element_3 Ranking_Header_Element" href="<?=getNewURL("sortType","score")?>"> Score </a>
            <p class="Ranking_Element_4 Ranking_Header_Element"> Equipe n°2 </p>
        </div>
        <div class="Ranking_Matches">

            <?php
                //display button for add form or a form
                if((isset($form)== true) && (isset($_POST["actionForm"]) == false)){
                    echo $form->displayForm();
                }else{
                    echo '<div class="Match Match_Button">
                        <a class="Button Button_AddForm Text Text_15" href='.getNewURL('form','m').'>Add match</a>
                    </div>';
                }

                //display  matches
                for($i=$start;$i<$end;$i++){
                    if (isset($matches[$i])){
                        echo $matches[$i]->displayMatch();
                    }
                    else break;
                }

                //pagination
                if (count($matches)>$elementByPage) echo createPagination((int)$currentPage,(int)getPagesNb(count($matches)));

            ?>
        </div>
    </main>
</body>

</html>
