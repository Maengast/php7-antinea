<?php
//Parent class for form object
class Form{
    protected $action;
    protected $posts = [];
    private $classForm;
    function __construct(string $_action, string $_classForm){
        $this->action = $_action;
        $this->classForm = $_classForm;
    }

    public function displayForm(){
        $output = '<form  action="'.$this->action.'" method="POST">
        <div class="'.$this->classForm. ' Text">
        <input type="hidden" name="actionForm" value=add>
        <input type="hidden" name="idForm" value='.rand().'>'."\n";
        return $output;
    }
    protected function checkPost(string $_str){
        if ($_POST[$_str] == ""){
            return false;
        }else{
            $this->posts[$_str] = $_POST[$_str];
            return true;
        }
    }

    public function addPostData($_con){
        $_con->addMatchData($this->posts);
    }
}

//Child class for Match Form
class FormMatch extends Form{

    public function displayForm(){
        $output = parent:: displayForm();
        $output.= '<div class="Ranking_Element Match_Part">
            <p class="Match_Rank_Element Title_15"># New </p>
            <button type="submit" class="Button Button_SendForm Text">Ajouter</button>
        </div>'."\n";
        for ($t=1; $t < 3 ; $t++) {
            $output.= '<div class="Ranking_Element_4 Match_Part">
                <input name="team'.$t.'" type="text" class="Match_Team_Element_Title Match_Part_Element_Form Match_Part_Element" placeholder="Nom de team">'."\n";
                for ($p=1; $p <3 ; $p++) {
                    $output.= '<select name="team'.$t.'_player'.$p.'" class="Match_Team_Element_Player Match_Part_Element_Form Match_Part_Element"'.$p.'">'."\n";
                    $output.='<option value="">Joueur</option>'."\n";
                    foreach (getPlayers() as $player) {
                        $output.='<option value='.$player->getID().'>'.$player->getName().'</option>'."\n";
                    }
                    $output.='</select>'."\n";
                }
            $output.= '</div>'."\n";
            if ($t==1){
                $output.='<div class="Ranking_Element_3 Match_Part Match_Score">'."\n";
                    for ($i=1; $i <3 ; $i++) {
                        $output.= '<input name="score_team'.$i.'" type="number" class="Match_Score_Element Match_Part_Element_Form" placeholder="Score team'.$i.'">'."\n";
                        if ($i == 1) $output.= '<p class="Match_Score_Element"> - </p>'."\n";
                    }
                $output.='</div>'."\n";
            }
        }
        $output.='</div>
        </form>'."\n";
        return $output;
    }

    //get all posts send by a form
    public function getPostData(){
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
        return true;
    }

    public function addPostData($_con){
        $playersData =getPlayersData();
        if($this->posts["score_team1"]>$this->posts["score_team2"]){
            var_dump("sup");
            for ($t=1; $t <3 ; $t++) {
                for ($p=1; $p <3 ; $p++) {
                    $str = "team".$t."_player".$p;
                    $playerData = [];
                    $playerData["ID"] = $this->posts[$str];
                    $playerData["nb_victory"] = $playersData[$playerData["ID"]][0]["nb_victory"]+ ($t==1)?1:0;
                    $playerData["nb_defeat"] = $playersData[$playerData["ID"]][0]["nb_defeat"]+($t==1)?0:1;

                    if($playerData["nb_victory"] == 0) $playerData["ratio"] =  0;
                    else if($playerData["nb_victory"]==1 && $playerData["nb_defeat"] == 0 ) $playerData["ratio"] = 1;
                    else $playerData["ratio"] =  $playerData["nb_victory"]/ $playerData["nb_defeat"];
                    $_con->changePlayersData($playerData);
                }
            }
        }

        if($this->posts["score_team1"]<$this->posts["score_team2"]){
            for ($t=1; $t <3 ; $t++) {
                for ($p=1; $p <3 ; $p++) {
                    $str = "team".$t."_player".$p;
                    $playerData = [];
                    $playerData["ID"] = $this->posts[$str];
                    $playerData["nb_victory"] = $playersData[$playerData["ID"]][0]["nb_victory"]+ ($t==1)?0:1;
                    $playerData["nb_defeat"] = $playersData[$playerData["ID"]][0]["nb_defeat"]+($t==1)?1:0;

                    if($playerData["nb_victory"] == 0) $playerData["ratio"] =  0;
                    else if($playerData["nb_victory"]==1 && $playerData["nb_defeat"] == 0 ) $playerData["ratio"] = 1;
                    else $playerData["ratio"] =  $playerData["nb_victory"]/ $playerData["nb_defeat"];
                    $_con->changePlayersData($playerData);
                }
            }
        }
        $_con->addMatchData($this->posts);
    }
}

class FormPlayer extends Form{
    public function displayForm(){
        $output = parent:: displayForm();
        $output.='<p class="Ranking_Element Match_Rank Title_15"> # New</p>
        <select name="avatar" class="Ranking_Element_3 Match_Team_Player_Form">'."\n";
            for ($i=0; $i <12 ; $i++) {
                $output.='<option style="background:url(img/Avatar'.$i.'.png) no-repeat; width:100px; height:100px; value="img/Avatar'.$i.'.png">img/Avatar'.$i.'.png</option>'."\n";
            }
        $output.='</select>'."\n";
        $output.='<input name="name" type="text" class="Ranking_Element_4 Match_Team_Form" placeholder="Pseudo">
            <input name="nb_victory" type="number" class="Ranking_Element_2" placeholder="nb Match Win">
            <input name="nb_defeat" type="number" class="Ranking_Element_2" placeholder="nb Match Lose">'."\n";
        $output.='<button type="submit" class="Button Button_SendForm Button_SendForm_Player Text">Ajouter</button>'."\n";
        $output.='</div>
        </form>'."\n";

        return $output;
    }

    public function getPostData(){
        if(!$this->checkPost("avatar")) return false;
        if(!$this->checkPost("name")) return false;
        if(!$this->checkPost("nb_victory")) return false;
        if(!$this->checkPost("nb_defeat")) return false;


        if($_POST["nb_victory"] == 0) $this->posts["ratio"] =  0;
        else if($_POST["nb_victory"]==1 && $_POST["nb_defeat"] == 0 ) $this->posts["ratio"] = 1;
        else $this->posts["ratio"] =  $_POST["nb_victory"]/ $_POST["nb_defeat"];

        return true;
    }

    public function addPostData($_con){
        $_con->addPlayerData($this->posts);
    }
}
 ?>
