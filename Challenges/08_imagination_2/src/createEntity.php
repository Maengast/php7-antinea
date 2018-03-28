<?php
require_once($projectDirectory.'/src/getData.php');
require_once($projectDirectory.'/src/class.php');

//get map number
if (isset($_GET["mapNb"]) != false && $_GET["mapNb"]>0 ){
    $mapNb = $_GET["mapNb"];
}else $mapNb=1;

//Create all entities of game
$map = createMap();
$shrubs = createShrubs();
$enemies = createEnemies();

//function create entities
function createMap(){
    global $connection;
    global $mapNb;
    $statement = getMapSize($connection,$mapNb);
    $statement->execute();
    $mapInfos=$statement->fetchAll(PDO::FETCH_ASSOC);
    $map = $mapInfos[0];
    return new map($map["height"],$map["width"]);
}

function createShrubs(){
    global $connection;
    global $mapNb;
    $statement = getNumberShrub($connection,$mapNb);
    $statement->execute();
    $nbShrub = $statement->fetchAll(PDO::FETCH_ASSOC);
    $array;
    for($i=0; $i<$nbShrub[0]["nb_shrub"];$i++){
        $array[]=new shrub();
    }
    return $array;
}

function createEnemies(){
    global $connection;
    global $mapNb;
    $statement = getEnemyInfos($connection,$mapNb);
    $statement->execute();
    $enemyInfos = $statement->fetchAll(PDO::FETCH_ASSOC);
    $array;
    foreach ($enemyInfos as $enemy) {
        for ($i=0; $i<$enemy["nb_enemy"];$i++){
            switch($enemy['enemy_type']){
                case "gobelin":
                $array[]=new gobelin();
                break;
            }
        }
    }
    return $array;
}


 ?>
