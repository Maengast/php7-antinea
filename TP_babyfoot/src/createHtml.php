<?php
$ranking = ["Match","Player"];

function createHeader($_itemActive){
    global $ranking;
    $echo = '<header class="Header">
        <p class="Header_Title"> Babyfoot Games </p>
        <div class="Header_Author">
            <p> Hugo & Antinea </p>
        </div>
    </header>
    <div class="Tabs">
        <p class="Tabs_Title">Classement</p>
        <div class="Tabs_Element">
            <a class="Tabs_Tab'.(($_itemActive=="Match")? " Tabs_Tab_Active" : "").'" href=index.php >Matchs</a>
            <a class="Tabs_Tab'.(($_itemActive=="Player")? " Tabs_Tab_Active" : "").'" href=playerRank.php >Players</a>'."\n";
    /*foreach ($ranking as $type) {
        <a class="Tabs_Tab'.($type==$_itemActive)? '_Active' : ''.'" href= >Add match</a>
        $echo.= '<p class="Tabs_Tab'.($type==$_itemActive)? '_Active' : ''.'">'.$type.'</p>'."\n";
    }*/
    $echo.= '</div>
    </div>';
    return $echo;
}
 ?>
