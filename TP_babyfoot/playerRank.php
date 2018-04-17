<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/createEntity.php');
require_once($projectDirectory.'/src/createHtml.php');
createPlayers();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" media="screen" href="css/babyfootStyle.css">
</head>

<body class="Body">
    <?=createHeader("Player")?>
</body>
