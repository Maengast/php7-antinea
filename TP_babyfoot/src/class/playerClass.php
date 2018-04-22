<?php
//Parent Class for player object
class Player
{
    public $name;
    public $avatar;
    protected $nbMatchWin;
    protected $nbMatchLose;
    protected $ID;
    private $rank;
    private $img;
    function __construct(int $_ID,string $_avatar,int $_rank, string $_name,int $_nbMatchWin,int $_nbMatchLose)
    {
        $this->rank = $_rank;
        $this->ID = $_ID;
        $this->name = $_name;
        $this->nbMatchWin = $_nbMatchWin;
        $this->nbMatchLose = $_nbMatchLose;
        $this->avatar = $_avatar;
    }

    public function displayPlayer(){
        $output = '<div class="Match Text_15">
            <p class="Ranking_Element Match_Rank Title_20"> # '.$this->rank.'</p>
            <img class="Ranking_Element_3 Player_Part Player_Img" src='.$this->avatar.'></img>
            <p class="Ranking_Element_4 Match_Part_Element Player_Part">'.$this->name.'</p>
            <p class="Ranking_Element Player_Part">'.$this->nbMatchWin.'</p>
            <p class="Ranking_Element Player_Part ">'.$this->nbMatchLose.'</p>
            <p class="Ranking_Element_2 Player_Part">'.$this->getRatio().'</p>
            </div>';
        return $output;
    }

    public function getRatio(){
        if($this->nbMatchWin == 0) return 0;
        else if($this->nbMatchWin == 1 && $this->nbMatchLose == 0 ) return 1;
        else return $this->nbMatchWin/$this->nbMatchLose;
    }
    public function getID(){
        return $this->ID;
    }
    public function getName(){
        return $this->name;
    }
}

//Child class PlayerRank for players ranking
class PlayerMatch extends Player{
    function __construct(int $_ID,string $_name)
    {
        $this->ID = $_ID;
        $this->name = $_name;
    }

    public function displayPlayer(){
        $output = '<p class="Match_Part_Element Match_Team_Element_Player">'. $this->name.'</p>'."\n";
        return $output;
    }
}
 ?>
