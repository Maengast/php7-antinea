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
function getMatchesData(/*string $_order*/){
        $statement = $this->connection->prepare("
        SELECT * FROM matches;
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

//Get all data of players
function getPlayersData(/*string $_order*/){
        $statement = $this->connection->prepare("
            SELECT ID, name, nb_victory, nb_defeat FROM players
            ORDER BY nb_victory;
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }


    function addMatchData($_postData){
        $statement = $this->connection->prepare("
            SELECT ID, name, nb_victory, nb_defeat FROM players
            ORDER BY nb_victory;
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }

    function addPlayerData(){
        $statement = $this->connection->prepare("
            SELECT ID, name, nb_victory, nb_defeat FROM players
            ORDER BY nb_victory;
        ");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_ASSOC);
    }

}

class Session{

}

//Parent class for form object
class Form{
    private $action;
    protected $posts = [];
    private $classForm;
    function __construct(string $_action, string $_classForm){
        $this->action = $_action;
        $this->classForm = $_classForm;
    }

    function displayForm(){
        $echo = '<form class='.$this->classForm.' action="'.$this->action.'" method="POST">
        <input type="hidden" name="actionForm" value=add>'."\n";
        return $echo;
    }
    protected function checkPost(string $_str){
        if ($_POST[$_str] == ""){
            return false;
        }else{
            $this->posts[$_str] = $_POST[$_str];
            return true;
        }
    }
}

//Child class for Match Form
class FormMatch extends Form{

    function displayForm(){
        $echo = parent:: displayForm();
        $echo.= '<p class="Ranking_Element"> #New match </p>'."\n";
        for ($t=1; $t < 3 ; $t++) {
            $echo.= '<div class="Ranking_Element_Team Match_Team form-group">
                <input name="team'.$t.'" type="text" class="Match_Team_Element_Title Match_Team_Form" id="product" placeholder="Nom de team">'."\n";
                for ($p=1; $p <3 ; $p++) {
                    $echo.= '<input name="team'.$t.'_player'.$p.'" type="text" class="Match_Team_Element_Player Match_Team_Player_Form" id="product" placeholder="Nom du joueur '.$p.'">'."\n";
                }
            $echo.= '</div>'."\n";
            if ($t==1){
                $echo.='<div class="Ranking_Element_Score Match_Score">'."\n";
                    for ($i=1; $i <3 ; $i++) {
                        $echo.= '<input name="score_team'.$i.'" type="text" class="Match_Score_Element Match_Score_Element_Form" id="product" placeholder="Score team'.$i.'">'."\n";
                        if ($i == 1) $echo.= '<p class="Match_Score_Element"> - </p>'."\n";
                    }
                $echo.='</div>'."\n";
            }
        }
        $echo.='<button type="submit" class="Button Button_Text Button_Add">Ajouter un match</button>'."\n";
        $echo.='</form>'."\n";
        return $echo;
    }

    //get all posts send by a form
    function getPostData(){
        for ($t=1; $t <3 ; $t++) {
            $str = "team".$t;
            if(!$this->checkPost($str)) return false;
            $str = "score_team".$t;
            if(!$this->checkPost($str)) return false;
            for ($p=1; $p <3 ; $p++) {
                $str = "team".$t."_player".$p;
                if(!$this->checkPost($str)) return false;
            }
        }
        var_dump($this->posts);
        return true;
    }

    function addPostData($_con){
        $_con->addMatchData($this->post);
    }
}
?>
