<?php
$functionDirectory = $projectDirectory.'/src/functions';
require_once($functionDirectory.'/createEntity.php');
require_once($functionDirectory.'/dataManager.php');
require_once($functionDirectory.'/createHtml.php');


$con = new Connection();
$session = new Session();

$playersData = $con->getPlayersData();
//If sort type -> data and form
if(getURLData("sortType")!=null){
    //create form
    $form = createForm();
    CheckUrlForm();
    //get data with right order
    if (getURLData("sortType") !="score"){
        $playersData = $con->getPlayersDataSort(getURLData("sortType"),getSortDir("sortType"));
    }
}

//create all players
$players = createPlayers();

$elementByPage = 10;
if(getURLData("page")!=null){
    $currentPage = getURLData("page");
    $start = $elementByPage*($currentPage-1);
    $end = $elementByPage*$currentPage;
}
function getCon(){
    global $con;
    return $con;
}

function getForm(){
    global $form;
    return $form;
}

function getSession(){
    global $session;
    return $session;
}

function getPlayersData(){
    global $playersData;
    return $playersData;
}

function getPlayers(){
    global $players;
    return $players;
}

//Retunr number of page
function getPagesNb($_elementNb){
    global $elementByPage;
    return ceil($_elementNb/$elementByPage);

}
?>
