<?php
require_once($projectDirectory.'/src/dataClass.php');
/**
 *
 */
 // Class for Match object
 class Match{
    private $teams = [];
    private $rank;
    function __construct(int $_rank,$_teams)
    {
        $this->rank = $_rank;
        $this->teams = $_teams;
        $this->setTeamVictory();
    }

    public function displayMatch(){
        $echo = '<div class="Match">
            <p class="Ranking_Element"> #'.$this->rank.'</p>'."\n";
        for ($i=0; $i <count($this->teams); $i++) {
            $echo.= $this->teams[$i]->displayTeam();
            if($i == 0){
                $echo.='<div class="Ranking_Element_Score Match_Score">'."\n";
                for ($t=0; $t <count($this->teams) ; $t++) {
                    $cssResult = ($this->teams[$t]->isWin == 1)? "Match_Score_Element_Victory" :($this->teams[$t]->isWin == -1)?"Match_Score_Element_Defeat" : "Match_Score_Element_Equality";
                    $echo.='<p class=" Match_Element Match_Score_Element" '.$cssResult.'">'.$this->teams[$t]->getScore().'</p>'."\n";
                    if($t==0){
                        $echo.='<p class="Match_Element Match_Score_Element"> - </p>'."\n";
                    }
                };
                $echo.='</div>'."\n";
            }
        }
        $echo.='</div>';
        return $echo;
    }

    function setTeamVictory(){
        if ($this->teams[0]->getScore() >$this->teams[1]->getScore()){
            $this->teams[0]->isWin = 1;
            $this->teams[1]->isWin = -1;
        }else if ($this->teams[0]->getScore() <$this->teams[1]->getScore()){
            $this->teams[0]->isWin = -1;
            $this->teams[1]->isWin = 1;
        }
    }
 }

//Class for team object
 class Team{
     private $name;
     private $players =[];
     private $score;
     public $isWin = 0;

     function __construct(string $_name,$_players,int $_score)
     {
         $this->name = $_name;
         $this->players = $_players;
         $this->score = $_score;
     }

     public function displayTeam(){
         $echo='<div class="Ranking_Element_Team Match_Team">
         <p class="Match_Element Match_Team_Element_Title">'.$this->name.'</p>'."\n";
         for ($i=0; $i <count($this->players) ; $i++) {
            $echo.= $this->players[$i]->displayPlayer();
         }
         $echo.='</div>'."\n";
         return $echo;
     }

     public function getScore(){
         return $this->score;
     }
 }

//Parent Class for player object
class Player
{
    protected $name;
    protected $nbMatchWin;
    protected $nbMatchLose;

    function __construct(string $_name,int $_nbMatchWin,int $_nbMatchLose)
    {
        $this->name = $_name;
        $this->nbMatchWin = $_nbMatchWin;
        $this->nbMatchLose = $_nbMatchLose;
    }

    public function displayPlayer(){
        $echo = '<p class="Match_Element Match_Team_Element_Player">'. $this->name.'</p>'."\n";
        return $echo;
    }

    public function getRatio(){

    }
}

//Child class PlayerRank for players ranking
class PlayerRank extends Player{
    private $rank;
    function __construct(int $_rank,string $_name,int $_nbMatchWin,int $_nbMatchLose)
    {
        parent::__construct($_name,$_nbMatchWin,$_nbMatchLose);
        $this->rank = $_rank;
    }

    public function displayPlayer(){

    }
}

 ?>
