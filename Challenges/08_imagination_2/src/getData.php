<?php
$dsn = 'mysql:host=127.0.0.1;dbname=challenges_sql';
$user = 'root';
$password = '';

$connection = new PDO($dsn, $user, $password);

function getMapSize($_connection,$_mapNb){
    return $_connection->prepare("
        SELECT height, width FROM map_list
        WHERE map_number=".$_mapNb.";
    ");
}

function getNumberShrub($_connection,$_mapNb){
    return $_connection->prepare("
        SELECT nb_shrub FROM map_list
        WHERE map_number=".$_mapNb.";
    ");
}

function getEnemyInfos($_connection,$_mapNb){
    return $_connection->prepare("
        SELECT nb_enemy, enemy_type FROM map_list
        WHERE map_number=".$_mapNb.";
    ");
}
 ?>
