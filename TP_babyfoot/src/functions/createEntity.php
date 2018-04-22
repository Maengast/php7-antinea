<?php
require_once($projectDirectory.'/src/class.php');
require_once($projectDirectory.'/src/functions.php');


//Create matches objects
function createMatches(){
    //Get matches data
    $matchesData = getCon()->getMatchesData(getSortDir("sortType"));
    $matches = [];
    //for every match
    foreach ($matchesData as $key =>$match) {
        //Create Teams'match
        $matches[]= new Match($key,createMatchTeams($match),$match["ID"]);
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
    $playersData = getPlayersData();
    $players = [];
    // for each team player
    for ($i=1; $i <3 ; $i++) {
        //get player informations
        $playerID = $_match["team".$_teamIndex."_player".$i];
        $player = $playersData[$playerID][0];
        $players[] = new PlayerMatch($playerID,$player["name"]);
    }
    //return team players
    return $players;
}

//Create player for players ranking
function createPlayers(){
    $playersData = getPlayersData();

    $players = [];
    $rank=1;
    //for each players
    foreach ($playersData as $key => $player) {
        $player = $player[0];
        //create a player object
        $players[] = new Player($key,$player["avatar"],$rank,$player["name"],$player["nb_victory"],$player["nb_defeat"]);
        $rank++;
    }

    return $players;

}




?>
