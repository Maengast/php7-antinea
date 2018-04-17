<?php
require_once($projectDirectory.'/src/dataClass.php');

$form;

//get current URL page
function getURL(){
    return $_SERVER['REQUEST_URI'];
}

//get current script
function getPage(){
    return $_SERVER['SCRIPT_FILENAME'];
}

//check url for form action
function checkURLForm(){
    global $form;

    //if url have form data
    if(isset($_GET["form"])){
        //create form
        $form = createForm($_GET["form"]);
        //if a post have been send
        if(isset($_POST["actionForm"])){
            //check other posts data
            if(!$form->getPostData()){
                //Form informations are not full
                wrongForm();
            }
            else{
                //add Form information to database
                addDataForm();
            }
        }
    }
}

//Create right form
function createForm(string $_formType){
     /*if ($_formType == "match") */$form =new FormMatch(getURL(),"Match");
     return $form;
}

//add form data on database
function addDataForm(){
    //replace url
    //Add to database
}

//form not complete
function wrongForm(){
    print "manque info";
}
 ?>
