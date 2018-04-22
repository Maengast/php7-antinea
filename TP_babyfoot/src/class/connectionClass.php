<?php
//Class for connection object
class Connection{
    private $dns = 'mysql:host=127.0.0.1;dbname=babyfoot';
    private $user = 'root';
    private $password = '';
    private $connection;

    //create a connection to database
    function __construct(){
        $this->connection = new PDO($this->dns, $this->user, $this->password);
    }

//Get all data of matches
    function getMatchesData(string $_dir){
        $statement = $this->connection->prepare("
        SELECT * FROM matches;
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

//Get all data of players
    function getPlayersDataSort(string $_order, string $_dir){
        $dir = ($_dir == 'c')? "ASC" : "DESC";
        $statement = $this->connection->prepare("
            SELECT * FROM players
            ORDER BY ".$_order." ".$dir
        );
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }

    function getPlayersData(){
        $statement = $this->connection->prepare("
            SELECT * FROM players
            ORDER BY ratio DESC;
            ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }

    function addMatchData($_postData){
        $statement = $this->connection->prepare("INSERT INTO matches (team1,score_team1,team1_player1,team1_player2,team2,score_team2,team2_player1,team2_player2)
            VALUES (:team1,:score_team1,:team1_player1,:team1_player2,:team2,:score_team2,:team2_player1,:team2_player2);
        ");

        foreach ($_postData as $key => $data) {
            $statement->bindValue(':'.$key,$data);
        }
        $statement->execute();
    }

    function addPlayerData($_postData){
        $statement = $this->connection->prepare("INSERT INTO players (avatar,name,nb_victory,nb_defeat,ratio)
            VALUES (:avatar,:name,:nb_victory,:nb_defeat,:ratio);
        ");

        foreach ($_postData as $key => $data) {
            $statement->bindValue(':'.$key,$data);
        }
        $statement->execute();
    }

    function deleteMatch(int $_id){
        $statement = $this->connection->prepare("
            DELETE FROM matches
            WHERE id=".$_id.";
        ");
        $statement->execute();
    }

    function changePlayersData($_postData){
        $statement = $this->connection->prepare('UPDATE players SET nb_victory= :nb_victory,nb_defeat= :nb_defeat,ratio= :ratio');

        foreach ($_postData as $key => $data) {
            if ($key != "ID"){
                $statement->bindValue(':'.$key,$data);
            }

        }
        $statement->execute();
    }

}
 ?>
