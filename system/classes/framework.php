<?php

error_reporting(0);

class framework {

    //GESTION DES VUES
    public function view($viewName, $data =[]){

        if(file_exists("../App/views/" . $viewName . ".php")){

            require_once "../App/views/$viewName.php";

        }else{
            echo "<div style='margin:0; padding:10px;background-color:silver;'>Désolé le fichier $viewName.php n'a pas été trouvé</div>";
        }
    }



    public function model($modelName){

        if(file_exists("../App/models/" . $modelName . ".php")){
            
            require_once "../App/models/$modelName.php";
            return new $modelName;
        }else{
            echo "<div style='margin:0; padding:10px;background-color:silver;'>Désolé le fichier $modelName.php n'a pas été trouvé</div>";
        }       
    }

    // protégé contre les attaques xss
    public function input($inputName){

        if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == 'post'){
            return trim(strip_tags($_POST[$inputName]));
            
        }else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == 'get'){
            return trim(strip_tags($_GET[$inputName]));
        }


    }


    //ERREUR DU FICHIER QUI N'EST PAS TROUVE
    public function helper($helperName){
        if(file_exists("../system/helpers/" . $helperName . ".php")){
            require_once "../system/helpers/" . $helperName . ".php";
        }else{
            echo "<div style='margin:0; padding:10px;background-color:silver;'>Désolé le fichier $helperName.php n'a pas été trouvé</div>";
        }       

    }

    //Set session
    public function setSession($sessionName, $sessionValue){

        if(!empty($sessionName) && !empty($sessionValue)){

            $_SESSION[$sessionName] = $sessionValue;

        }
    }

    //Get session
    public function getSession($sessionName){
        if(!empty($sessionName)){
            return $_SESSION[$sessionName];
        }
    }

    //unset session
    public function unsetSession($sessionName){

        if(!empty($sessionName)){
            unset($_SESSION[$sessionName]);
        }

    }

    //Destroy whole session
    public function destroy(){

        session_destroy();

    }

    //set flash message
    public function setflash($sessionName, $msg){

            if(!empty($sessionName) && !empty($msg)){
                $_SESSION[$sessionName] = $msg;
            }
    }

    //Montrer les messages flash
    public function flash($sessionName, $className){

        if(!empty($sessionName) && !empty($className) && isset($_SESSION[$sessionName])){

            $msg = $_SESSION[$sessionName];

            echo "<div class='". $className ."'>".$msg."</div>";
            unset($_SESSION[$sessionName]);
        }

    }


    //REDIRECTION
    public function redirect($path){
        header("location:" . BASEURL . "/" . $path);
    }

}