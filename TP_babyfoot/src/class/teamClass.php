<?php
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
         $output='<div class="Ranking_Element_4 Match_Part Match_Team">
         <p class="Match_Part_Element Match_Team_Element_Title">'.$this->name.'</p>'."\n";
         for ($i=0; $i <count($this->players) ; $i++) {
            $output.= $this->players[$i]->displayPlayer();
         }
         $output.='</div>'."\n";
         return $output;
     }

     public function getScore(){
         return $this->score;
     }
 }
 ?>
