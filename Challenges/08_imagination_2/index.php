<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/createEntity.php');
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
</head>

<body>
    <?= $map->changeStyleMap();?>
    <div class="Map">
        <?= $map->displayMap($shrubs,$enemies);?>
    </div>
    <div class="Buttons">
        <a class="Button Button_Text" href="/php7-antinea/Challenges/08_imagination_2/index.php?mapNb=1" role="button">
            Map 1
        </a>
        <a class="Button Button_Text" href="/php7-antinea/Challenges/08_imagination_2/index.php?mapNb=2" role="button">
             Map 2
        </a>
    </div>
</body>

</html>
