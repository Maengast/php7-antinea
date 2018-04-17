<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/createEntity.php');
require_once($projectDirectory.'/src/dataManager.php');
require_once($projectDirectory.'/src/createHtml.php');

checkURLForm();
$matches = createMatches();

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/babyfootStyle.css">
</head>

<body class="Body">
    <?=createHeader("Match")?>

    <main class="Ranking">
        <div class="Ranking_Header">
            <p class="Ranking_Element Ranking_Header_Element"> n° </p>
            <p class="Ranking_Element_Team Ranking_Header_Element"> Equipe n°1 </p>
            <p class="Ranking_Element_Score Ranking_Header_Element"> Score </p>
            <p class="Ranking_Element_Team Ranking_Header_Element"> Equipe n°2 </p>
        </div>
        <div class="Ranking_Matches">

            <?php
                //display button for add form or a form
                if((isset($form)== true) && (isset($_POST["actionForm"]) == false)){
                    echo $form->displayForm();
                }else{
                    echo '<div class="Match">
                        <a class="Button Button_Text Button_Match" href='.getURL().'?form=match>Add match</a>
                    </div>';
                }

                //display all matches
                foreach ($matches as $match) {
                    echo $match->displayMatch();
                }
            ?>

            <!--<div class="Match">
                <p class="Ranking_Element"> #1 </p>
                <div class="Ranking_Element_Team Match_Team">
                    <p class="Match_Team_Element_Title"> Equipe n°1 </p>
                    <p class="Match_Team_Element_Player"> Joueur1 </p>
                    <p class="Match_Team_Element_Player"> Joueur2 </p>
                </div>
                <div class="Ranking_Element_Score Match_Score">
                    <p class="Match_Score_Element"> 0 </p>
                    <p class="Match_Score_Element"> - </p>
                    <p class="Match_Score_Element"> 2 </p>
                </div>
                <div class="Ranking_Element_Team Match_Team">
                    <p class="Match_Team_Element_Title"> Equipe n°1 </p>
                    <p class="Match_Team_Element_Player"> Joueur1 </p>
                    <p class="Match_Team_Element_Player"> Joueur2 </p>
                </div>
            </div>-->
        </div>
    </main>
</body>

</html>
