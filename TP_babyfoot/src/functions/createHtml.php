                       <?php
$ranking = ["Match","Player"];

function createHeader($_itemactive){
    global $ranking;
    $output = '<header class="Header Header_Ranking Overlay_Ranking">
        <p class="Title Title_30 Header_Element"> Babyfoot Games </p>
        <div class="Header_Author Header_Element">
            <p class="Text Text_20"> Hugo & Antinea </p>
        </div>
    </header>
    <div class="Tabs">
        <div class="Tabs_Element">';

    foreach ($ranking as $type) {
        $output.= '<a class="Tabs_Tab'.(($_itemactive==$type)? " Tabs_Tab_Active" : "").' Text Text_15" href= '.$type.'Rank.php'.getUrlEnd().'>'.$type.'s</a>'."\n";
    }
    $output.= '</div>
    </div>';
    return $output;
}

function createPagination($_currentPage,$_maxPage){
    $start;
    if ($_currentPage==1){
        $start = 1;
    }else if($_currentPage<=$_maxPage-2){
        $start = ($_currentPage-1);
    }else{
        $start = ($_maxPage-2);
    }
    $_echo = '<nav aria-label="Page navigation example">
                <ul class="Pagination">';

    if($_currentPage > 1){
        $_echo.= '<li class="PageNumber"><a class="PageNumberText" href="'.getNewURL('page',$_currentPage-1).'">&laquo;</a></li>'."\n";
    }
    if($_currentPage > 2){
        $_echo.= '<li class="PageNumber"><a class="PageNumberText" href="'.getNewURL('page',1).'">1</a></li>'."\n";
    }

    if($_currentPage > 3){
        $_echo.= '<li class="PageNumber PageNumber_Disabled"><a class="PageNumberText">...</a></li>'."\n";
    }

    for($i =$start; $i<$start+3; $i++){
        $_echo.= '<li class="PageNumber'.(($i == $_currentPage)?' PageNumber_Active"':'"').'><a class="PageNumberText" href="'.getNewURL('page',$i).'">'.$i.'</a></li>'."\n";
    }

    if ($_currentPage <$_maxPage-2){
        $_echo.= '<li class="PageNumber PageNumber_Disabled"><a class="PageNumberText">...</a></li>'."\n";
    }

    if($_currentPage <$_maxPage-1){
        $_echo.= '<li class="PageNumber"><a class="PageNumberText" href="'.getNewURL('page',$_maxPage).'">'.$_maxPage.'</a></li>'."\n";
    }

    if($_currentPage < $_maxPage){
        $_echo.= '<li class="PageNumber"><a class="PageNumberText" href="'.getNewURL('page',$_currentPage+1).'">&raquo;</a></li>'."\n";
    }

    $_echo .= '</ul>
            </nav>';
    return $_echo;
}
?>
