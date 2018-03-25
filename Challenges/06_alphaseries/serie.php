<?php
$projectDirectory = __DIR__;
require_once($projectDirectory.'/src/functions.php');
require_once($projectDirectory.'/src/createHTML.php');

//$showName = $_GET["name"];
$show = getShowData($_GET["name"]);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>AlphaSeries</title>

    <!-- CSS Bootstrap 4 : https://getbootstrap.com/docs/4.0/getting-started/introduction/ -->
    <link defer rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS Font Awesome 5 : https://fontawesome.com/get-started -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/brands.js" integrity="sha384-sCI3dTBIJuqT6AwL++zH7qL8ZdKaHpxU43dDt9SyOzimtQ9eyRhkG3B7KMl6AO19" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link href="css/alphaseries.css" rel="stylesheet">
</head>
<body>
    <!-- Barre de navigation -->
    <?=createNavBar("")?>

    <main role="main">
        <!-- Header -->
        <div class="jumbotron" style="position: relative">
            <div class="jumbotron-background" style="background-image: url(<?= $show['images']['banner'] ?>);"></div>
            <div class="container">
                <h1 class="display-3"><?= $show['name']?></h1>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">
            <div class="row">

                <!-- Poster de la série -->
                <div class="col-md-3 d-none d-md-block">
                    <img src="<?=$show["images"]["poster"]?>" alt="Poster de <?=$show["name"]?>" class="img-thumbnail">
                </div>

                <!-- Fiche série -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?=$show["name"]?>

                                <!-- Affichage de la note avec le bon nombre d'étoiles et un tooltip -->
                                <?= createStarsRating($show["statistics"]["rating"])?>
                            </h4>
                            <h6 class="card-subtitle mb-2 text-muted"><?=$show["statistics"]["season_count"]?> saisons, <?=$show["statistics"]["episode_count"]?> épisodes</h6>
                            <h5>
                                <?= number_format($show["statistics"]["popularity"],0,'',' ')?> personnes suivent la série
                            </h5>
                            <?= createGenderShow($show)?>
                            <p class="card-text">
                                <?=$show["synopsis"]?>
                            </p>
                            <a target="_blank" href="https://www.betaseries.com/serie/<?= $show["slug"]?>" class="card-link">
                                <i class="fa fa-external-link-alt"></i>
                                Voir la fiche sur BetaSeries
                            </a>
                        </div>
                    </div>
                    <br />
                    <?php
                        if ($show["youtube_id"]!=null || isset($show["youtube_id"]) !=false ){
                            echo '<div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-0">
                                        <i class="fab fa-youtube"></i> Bande annonce
                                    </h5>
                                </div>
                                <div class="embed-responsive embed-responsive-21by9">
                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/'.$show["youtube_id"].'?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>';
                        }
                    ?>
                </div>
            </div>

            <hr>
        </main>

        <!-- Footer -->
        <footer class="container">
            <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.betaseries.com">BetaSeries</a></p>
        </footer>

        <!-- JavaScript Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script type="text/javascript">
        // activation des tooltips bootstrap de partout
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        </script>
    </body>
    </html>
