<?php
// Class for Match object
class Match{
    private $ID;
   private $teams = [];
   private $rank;
   function __construct(int $_rank,$_teams,int $_ID)
   {
       $this->ID = $_ID;
       $this->rank = $_rank;
       $this->teams = $_teams;
       $this->setTeamVictory();


   }

   public function displayMatch(){
       $output = '<div class="Match Text">
           <p class="Ranking_Element Match_Rank Title_15"> # '.$this->rank.'</p>'."\n";
       for ($i=0; $i <count($this->teams); $i++) {
           $output.= $this->teams[$i]->displayTeam();
           if($i == 0){
               $output.='<div class="Ranking_Element_3 Match_Score Match_Part">'."\n";
               for ($t=0; $t <count($this->teams) ; $t++) {
                   $cssResult = ($this->teams[$t]->isWin == 1)? "Match_Score_Element_Victory" :($this->teams[$t]->isWin == -1)?"Match_Score_Element_Defeat" : "Match_Score_Element_Equality";
                   $output.='<p class="Match_Score_Element" '.$cssResult.'">'.$this->teams[$t]->getScore().'</p>'."\n";
                   if($t==0){
                       $output.='<p class="Match_Score_Element"> - </p>'."\n";
                   }
               };
               $output.='</div>'."\n";
           }
       }
       $output.='</div>';
       return $output;
   }

   function setTeamVictory(){
       //Set wich team is winner
       if ($this->teams[0]->getScore() >$this->teams[1]->getScore()){
           $this->teams[0]->isWin = 1;

           $this->teams[1]->isWin = -1;
       }else if ($this->teams[0]->getScore() <$this->teams[1]->getScore()){
           $this->teams[0]->isWin = -1;
           $this->teams[1]->isWin = 1;
       }
   }
}
 ?>
