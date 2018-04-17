<?php
require_once($projectDirectory.'/src/gameClass.php');
require_once($projectDirectory.'/src/dataClass.php');

$con = new Connection();

//Get players data
$playersData = $con->getPlayersData();

//Create matches objects
function createMatches(){
    global $con;
    //Get matches data
    $matchesData = $con->getMatchesData();
    $matches = [];
    //for every match
    foreach ($matchesData as $key =>$match) {
        //Create Teams'match
        $matches[]= new Match($key,createMatchTeams($match));
    }
    //Return all the matches object
    return $matches;
}

function createMatchTeams($_match){
    $teams = [];
    //for each match team
    for ($i=1; $i <3 ; $i++) {
        $name = $_match["team".$i];
        //Create Players' Team
        $teamPlayers = createTeamPlayers($_match,$i);
        //get team score
        $score = $_match["score_team".$i];
        $teams[] = new Team($name, $teamPlayers,$score);
    }
    // Return match Teams
    return $teams;
}

//create players of a team
function createTeamPlayers($_match,int $_teamIndex){
    global $playersData;
    $players = [];
    // for each team player
    for ($i=1; $i <3 ; $i++) {
        //get player informations
        $player = $playersData[$_match["team".$_teamIndex."_player".$i]][0];
        $players[] = new Player($player["name"],$player["nb_victory"],$player["nb_defeat"]);
    }
    //return team players
    return $players;
}

//Create player for players ranking
function createPlayers(){
    global $playersData;

    $players = [];
    $rank=1;
    //for each players
    foreach ($playersData as $key => $player) {
        $player = $player[0];
        //create a player object
        $players[] = new PlayerRank($rank,$player["name"],$player["nb_victory"],$player["nb_defeat"]);
        $rank++;
    }

    return $players;

}





?>
