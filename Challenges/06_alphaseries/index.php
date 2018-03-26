<?php
    $projectDirectory = __DIR__;
    require_once($projectDirectory.'/src/functions.php');
    require_once($projectDirectory.'/src/createHTML.php');
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
    <?=createNavBar("Acceuil")?>

    <main role="main">
        <!-- Header -->
        <div class="jumbotron" style="position: relative">

            <div class="jumbotron-background" style="background-image: url(<?= getShowData(getRandomShow())['images']['banner'] ?>);"></div>
            <div class="container">
                <h1 class="display-3">AlphaSeries</h1>
                <p>Retrouvez les meilleures séries TV !</p>
            </div>
        </div>

        <!-- Contenu -->
        <div class="container">
            <div class="row">

                <!-- Les 3 séries les plus populaires -->
                <div class="col-md-6">
                    <h2><i class="fa fa-fire"></i> Les plus populaires</h2>
                    <p>Les séries qui sont suivient par le plus de monde.</p>
                    <?php
                        for($i = 0; $i<3; $i++){
                            CreateIndexCard($popularShows[$i],$i,"popularity");
                        }
                        createIndexButton('popularity');
                    ?>
                </div>

                <!-- Les 3 séries les mieux notées -->
                <div class="col-md-6">
                    <h2><i class="fa fa-star"></i> Les mieux notées</h2>
                    <p>Les séries qui ont eu les meilleures notes.</p>
                    <?php
                        for($i = 0; $i<3; $i++){
                            createIndexCard($ratedShows[$i],$i,"rating");
                        }
                        createIndexButton('rating');
                    ?>
                </div>
            </div>
            <hr>
        </div>
    </main>

    <!-- Footer -->
    <footer class="container">
        <p>&copy; Les données proviennent du site <a target="_blank" href="https://www.betaseries.com">BetaSeries</a></p>
    </footer>

    <!-- JavaScript Bootstrap -->
    <script defer src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    // activation des tooltips bootstrap de partout
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    </script>
</body>
</html>
