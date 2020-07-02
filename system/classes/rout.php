<?php


class rout {

    //Default controller, method, params
    //pour modifier la page d'accueil il faut changer le controller
    public $controller = "accountController";
    public $method = "index";
    public $params = [];

    public function __construct()
    {
       $url = $this->url();
       if(!empty($url)){
           if(file_exists("../App/controllers/" . $url[0] . ".php")){
               $this->controller = $url[0];
               unset($url[0]);
           }else{
               echo "<div style='margin:0; padding:10px;background-color:silver;'>Désolé ".$url[0].".php n'a pas été trouvé</div>";
           }
       }

       //Include controller
       require_once "../App/controllers/" . $this->controller . ".php";
       $this->controller = new $this->controller;
       
       //Instantiate controller
       if(isset($url[1]) && !empty($url[1])){
           if(method_exists($this->controller, $url[1])){
               $this->method = $url[1];
               unset($url[1]);

           }else{
            echo "<div style='margin:0; padding:10px;background-color:silver;'>Désolé method ".$url[1].".php n'a pas été trouvé</div>";
           }
       }
       if(isset($url)){
            $this->params = $url;
        }else{
            $this->params = [];
        }
        //Appelle une fonction de rappel avec les paramètres rassemblés en tableau
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    //REECRITURE DE L'URL
    public function url(){
        if(isset($_GET['url'])){
            $url = $_GET['url'];
            //supprimer les espaces de fin de chaine
            $url = rtrim($url);
            //Supprime tous les caractères sauf les lettres, chiffres et $-_.+!*'(),{}|\\^~[]`<>#%";/?:@&=.
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }

}

