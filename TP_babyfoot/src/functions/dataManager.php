<?php
require_once($projectDirectory.'/src/class.php');
require_once($projectDirectory.'/src/functions.php');

function getUrlEnd(){
    $str = "?sortType=ratio&form=&page=1";
    return $str;
}

//get current URL page
function getURL(){
    return $_SERVER['REQUEST_URI'];
}

function getNewURL($_variable, $_value){
    return preg_replace('/'.$_variable.'=[^&]*/',$_variable.'='.$_value,getURL());
}

function getURLData($_key){
    if(isset($_GET[$_key])){
        return $_GET[$_key];
    }
    else return null;
}

//get sort direction
//d:decreascent
//c:creascent
function getSortDir($_sortType){
    return getSession()->getData($_sortType);
}

function changeSortDir($_sortType){
    $value;
    if(getSortDir($_sortType) == 'd'){
        $value= 'c';
    }else{
        $value = 'd';
    }
    getSession()->addSortInfo($_sortType,$value);
}

//check url for form action
function checkURLForm(){
    $form = getForm();
    $session = getSession();
    //if a post have been send
    if(isset($_POST["actionForm"])){
        $id = $_POST["idForm"];
        if ($id != $session->getData("formID")){
            if(isset($form) == false) return;

            //check other posts data
            if(!$form->getPostData()){
                //Form informations are not full
                wrongForm();
            }
            else{
                //add ID on session
                $session->addFormID($id);

                //Add Data to database
                $form->addPostData(getCon());
            }
        }
    }
}

//Create right form
function createForm(){
    $formType = getURLData("form");
    switch ($formType) {
        case 'm':
            $form = new FormMatch(getURL(),"Match");
            break;
        case 'p':
            $form = new FormPlayer(getURL(),"Match");
            break;
        case 'dm':
            $form = new FormMatchDelete("");
            break;
        default:
            $form = null;
            break;
    }
    return $form;
}

//form not complete
function wrongForm(){
    echo '<script>alert("Le fomulaire est incomplet");</script>';
}

 ?>
