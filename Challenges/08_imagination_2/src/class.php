<?php
class map{
    public $height;
    public $width;

    public function __construct($_height, $_width){
        $this->height = $_height;
        $this->width = $_width;
    }
    public function changeStyleMap(){
        echo '<style type="text/css">
       .Map {
           grid-template-columns:repeat('.$this->width.','.(100/$this->width).'vw);
           grid-template-rows: repeat('.$this->height.','.(100/$this->height).'vh);
       }
       </style>';
    }

    //Display all tile , empty, shrub and enemy
    public function displayMap($_shrubs, $_enemies){
        //get tile enemy and shrub randomly
        $posShrub = getPos($_shrubs,1,$this->height*$this->width);
        $posEnemy = getPos($_enemies,1,$this->height*$this->width);;

        $nbShrubs = count($_shrubs)-1;
        $nbEnemies = count($_enemies)-1;

        for($i =0; $i< $this->height*$this->width-1; $i++){
            if ($i==0){
                $player = new player(5);
                $player->display();
            }
            if (in_array($i,$posShrub)){
                $_shrubs[$nbShrubs]->displayShrub();
                $nbShrubs--;
            } else if(in_array($i,$posEnemy)){
                $_enemies[$nbEnemies]->display();
                $nbEnemies--;
            }else{
                echo '<div class="Tile Tile_Empty Tile_Border"></div>';
            }
        }
    }
}

function getPos($_array, $_min, $_max){
    foreach ($_array as $value) {
        $array =[];
        while (count($array) < count($_array)) {
            $randNb = mt_rand($_min, $_max);
            if (count($array) > 0){
                if(in_array($randNb,$array)!=true){
                    $array[]=$randNb;
                }
            }
            else{
                $array[]=$randNb;
            }
        }
        return $array;
    }
}


class shrub{
    public $className = "Shrub";
    protected $canHide = true;
    public function displayShrub(){
        echo '<div class=" Tile Tile_Shrub Tile_Fit Tile_Border">
        <p class="Tile_Title"> '.$this->className.'</p>
        <p class="Tile_Text"> Can hide : '.(($this->canHide)? "yes" : "no").'</p>
        </div>';
    }

}

class character{
    public $className;
    protected $damages;

    public function __construct($_damages, $_className){
        $this->className = $_className;
        $this->damages = $_damages;
    }


}

class player extends character{
    public function __construct($_damages){
        parent::__construct($_damages,"Player");
    }
    public function display(){
        echo '<div class="Tile Tile_Player Tile_Fit Tile_Border">
        <p class="Tile_Title"> '.$this->className.'</p>
        <p class="Tile_Text"> damages: '.$this->damages.'</p>
        </div>';
    }
}

class enemy extends character{
    protected $type;
    public function __construct($_type, $_damages){
        parent::__construct($_damages,"Enemy");
        $this->type = $_type;
    }

    public function display(){
        echo '<div class="Tile Tile_Enemy Tile_Fit Tile_Border">
        <p class="Tile_Title"> '.$this->className.'</p>
        <p class="Tile_Text"> '.$this->type.'</p>
        <p class="Tile_Text"> damages: '.$this->damages.'</p>
        </div>';
    }
}

class gobelin extends enemy{
    public function __construct(){
        parent::__construct("gobelin",5);
    }
}
 ?>
