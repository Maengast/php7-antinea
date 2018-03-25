<?php

//Get data
$json = file_get_contents($projectDirectory.'/data/shows.json');
$shows = json_decode($json, true);

$popularShows = $shows;
$ratedShows = $shows;

$popularShows = sortArray($popularShows, "popularity");
$ratedShows = sortArray($ratedShows, "rating");

$showsByPage = 10;

//Sorting function
function sortArray($_array, $_sortType){
    usort($_array, function ($_showA, $_showB) use ($_sortType) {
        return $_showB["statistics"][$_sortType] <=> $_showA["statistics"][$_sortType];
    });
    return $_array;
}

function changeArraySort($_array){
    usort($_array, function ($_showB, $_showA){
        return $_showB["statistics"]["rating"] <=> $_showA["statistics"]["rating"];
    });
    return $_array;
}

//return a random show
function getRandomShow(){
    global $shows;
    return array_rand($shows, 1);
}

//return data of a show
function getShowData($_elemToFind){
    global $shows;
    return $shows[$_elemToFind];

}

//Return all show with search words, sort by popularity
function searchShows($_searchValue){
    global $shows;
    $results = array_filter($shows, function($_show) use($_searchValue){
        return (strpos($_show,$_searchValue)!== false)? true : false;
    },ARRAY_FILTER_USE_KEY);

    $results=sortArray($results,"popularity");
    return $results;
}

//Retunr number of page
function getPagesNb($_showsNb){
    global $showsByPage;
    return ceil($_showsNb/$showsByPage);

}
 ?>
