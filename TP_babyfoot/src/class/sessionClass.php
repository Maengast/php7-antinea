<?php

class Session{

    function __construct(){
        session_start();
    }

    public function addFormID($_ID){
        $_SESSION['formID']=$_ID;
    }

    public function addSortInfo($_key,$_value){
        $_SESSION[$_key]=$_value;
    }
    public function getData($_key){
        if(isset($_SESSION[$_key])==false){
            if($_key == 'formID') $this->addFormID(-1);
            else{
                $this->addSortInfo($_key,'c');
            }
        }
        return $_SESSION[$_key];
    }

}
?>
