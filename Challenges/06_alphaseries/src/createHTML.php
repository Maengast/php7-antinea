<?php
//Create nav bar
function createNavBar($_page){
    echo '<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/php7-antinea/Challenges/06_alphaseries/index.php">AlphaSeries</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu principal -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item'.(($_page=="Acceuil")? ' active"':'"').'>
                    <a class="nav-link" href="/php7-antinea/Challenges/06_alphaseries/index.php">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                <li class="nav-item '.(($_page=="Classement")? ' active"':'"').'>
                    <a class="nav-link" href="/php7-antinea/Challenges/06_alphaseries/classement.php?type=popularity&dir=c&page=1">
                         <i class="fas fa-trophy"></i> Classement
                    </a>
                </li>
                <li class="nav-item '.(($_page=="Aleatoire")? ' active"':'"').'>
                    <a class="nav-link" href="/php7-antinea/Challenges/06_alphaseries/aleatoire.php">
                        <i class="fas fa-random"></i> Une série aléatoire
                    </a>
                </li>
            </ul>

            <!-- Formulaire de recherche -->
            <form action="/php7-antinea/Challenges/06_alphaseries/recherche.php" method="get" class="form-inline my-2 my-lg-0">
                <input name="search" class="form-control mr-sm-2" type="text" placeholder="Rechercher une série" aria-label="Rechercher une série">
                <input type="hidden" name="page" value=1>
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i> <span class="d-md-none">Rechercher</span>
                </button>
            </form>
        </div>
    </nav>';
}


//Create common HTML
//rating
function createStarsRating($_rate){
    $_echo = '<span class="stars text-info" data-toggle="tooltip" data-placement="top" title='.$_rate.'>';
    while($_rate > 0) {
        if ($_rate > 1)
        $_echo.='<i class="fa fa-star"></i>';
        else $_echo.='<i class="fa fa-star-half"></i>';
        $_rate -=1;
        $_echo.="\n";
    }
    $_echo.='</span>';
    return $_echo;
}

//gender
function createGenderShow($_show){
    $_echo = '<p>';
    for ($i=0; $i<count($_show['genres']); $i++){
        $_echo.= '<span class="badge badge-secondary">'.$_show['genres'][$i].'</span>';
        $_echo.= "\n";
    }
    $_echo.= '<small>sortie en '.$_show["release_year"].' chez '.$_show["network"].'</small> <p>';
    return $_echo;
}

//pagination
function createPagination($_currentPage,$_maxPage){
    $start;
    if ($_currentPage==1){
        $start = 1;
    }else if($_currentPage<=$_maxPage-2){
        $start = ($_currentPage-1);
    }else{
        $start = ($_maxPage-2);
    }

    $url = $_SERVER['REQUEST_URI'];
    $_echo = '<nav aria-label="Page navigation example">
                <ul class="pagination">';

    if($_currentPage > 1){
        $_echo.= '<li class="page-item"><a class="page-link" href="'.getURL($_currentPage-1).'">&laquo;</a></li>'."\n";
    }
    if($_currentPage > 2){
        $_echo.= '<li class="page-item"><a class="page-link" href="'.getURL(1).'">1</a></li>'."\n";
    }

    if($_currentPage > 3){
        $_echo.= '<li class="page-item disabled"><a class="page-link">...</a></li>'."\n";
    }

    for($i =$start; $i<$start+3; $i++){
        $_echo.= '<li class="page-item'.(($i == $_currentPage)?' active"':'"').'><a class="page-link" href="'.getURL($i).'">'.$i.'</a></li>'."\n";
    }

    if ($_currentPage <$_maxPage-2){
        $_echo.= '<li class="page-item disabled"><a class="page-link">...</a></li>'."\n";
    }

    if($_currentPage <$_maxPage-1){
        $_echo.= '<li class="page-item"><a class="page-link" href="'.getURL($_maxPage).'">'.$_maxPage.'</a></li>'."\n";
    }

    if($_currentPage < $_maxPage){
        $_echo.= '<li class="page-item"><a class="page-link" href="'.getURL($_currentPage+1).'">&raquo;</a></li>'."\n";
    }

    $_echo .= '</ul>
            </nav>';
    return $_echo;
}

function getURL($_pageNb){
    return preg_replace('&page=.*&', 'page='.$_pageNb, $_SERVER['REQUEST_URI']);
}

//Create HTML by page
//__________Index________________
function createIndexCard($_show,$_index,$_type){
    //create card for index page
    $_echo;
    if ($_type =="rating")$_echo = '<i class="fa fa-star text-info"></i> La série est notée '.$_show["statistics"]["rating"].'/5';
    else $_echo = number_format($_show["statistics"]["popularity"],0,'',' ').' personnes regardent cette série';
    echo '
    <p>
        <div class="card">
          <img class="card-img-top" src='.$_show["images"]["banner"].'>
          <div class="card-body">
              <h5 class="card-title">#'.($_index+1).'- <a href="/php7-antinea/Challenges/06_alphaseries/serie.php?name='.$_show["slug"].'">'.$_show["name"].'</a></h5>
              <p class="card-text">'.$_echo.'</p>
          </div>
        </div>
    </p>';
}
function createIndexButton($_urlEnd){
    echo '
    <p>
        <a class="btn btn-outline-secondary" href="/php7-antinea/Challenges/06_alphaseries/classement.php?type='.$_urlEnd.'&dir=c&page=1" role="button">
            <i class="fa fa-trophy"></i> Voir tout le classement
        </a>
    </p>';
}

//__________Rank________________
function createRankHTML($_show, $_index){
    echo '<tr>
        <th scope="row">'.($_index+1).'</th>
        <td><a href="/php7-antinea/Challenges/06_alphaseries/serie.php?name='.$_show["slug"].'">'.$_show["name"].'</a></td>
        <td>
            '.createStarsRating($_show['statistics']['rating']).'
        </td>
        <td>'.number_format($_show['statistics']['popularity'],0,'',' ').'</td>
    </tr>';
}

//_________Research___________________
function createCardShowHTML($_show){
    echo '
    <div class="row">
        <div class="col-md-2 d-none d-md-block">
            <img src="'.$_show["images"]["poster"].'" alt="Poster de '.$_show["name"].'" class="img-thumbnail">
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="/php7-antinea/Challenges/06_alphaseries/serie.php?name='.$_show["slug"].'">'.$_show["name"].'</a>
                        '.createStarsRating($_show["statistics"]["rating"]).'
                        <small>'.number_format($_show["statistics"]["popularity"],0,'',' ').' personnes suivent la série</small>
                    </h4>
                    <p class="card-text"> '.$_show["synopsis"].'</p>
                </div>
            </div>
        </div>
    </div>

    <hr>';
}
 ?>
