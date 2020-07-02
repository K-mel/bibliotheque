<?php


class accountController extends framework {

    public function __construct(){
        if($this->getSession('userId')){
            $this->redirect("profile");
        }
        $this->helper("link");
        $this->accountModel = $this->model('accountModel');
    }

    public function index(){
        $this->view("signup");
    }

    public function createAccount(){

        $userData = [
            
            'fullName'       => $this->input('fullName'),
            'email'          => $this->input('email'),
            'password'       => $this->input('password'),
            'fullNameError'  => '',
            'emailError'     => '',
            'passwordError'  => ''
        ];

        if(empty($userData['fullName'])){
            $userData['fullNameError'] = 'Vous devez entrer un nom';
        }
        if(empty($userData['email'])){
            $userData['emailError'] = 'Vous devez entrer un email';
        }else{
            if(!$this->accountModel->checkEmail($userData['email'])){
                $userData['emailError'] = 'Désolé cet email exist déjà';
            }
        }
        if(empty($userData['password'])){
            $userData['passwordError'] = 'Vous devez entrer un password';

        }else if(strlen($userData['password']) < 5){

            $userData['passwordError'] = 'Vous devez entrer au moins 5 caratères';
        }
        if(empty($userData['fullNameError']) && empty($userData['emailError']) && empty($userData['passwordError'])){
            $password = password_hash($userData['password'], PASSWORD_DEFAULT);
            $data = [$userData['fullName'], $userData['email'], $password];

            if($this->accountModel->createAccount($data)){
                $this->setFlash("accountCreated", "Votre compte a bien été créé");
                $this->redirect("accountController/loginForm");
            }
        }else{
            $this->view('signup', $userData);
        }
    }

    public function loginForm(){
        $this->view("login");
    }

    public function userLogin(){

        $userData = [

            'email' => $this->input('email'),
            'password' => $this->input('password'),
            'emailError' => '',
            'passwordError' => ''

        ];

        if(empty($userData['email'])){
            $userData['emailError'] = "Vous devez remplir une adresse email valide";
        }

        if(empty($userData['password'])){
            $userData['passwordError'] = "Vous devez remplir un password valide";
        }

        if(empty($userData['emailError']) && empty($userData['passwordError'])){

           $result = $this->accountModel->userLogin($userData['email'], $userData['password']);
           
           if($result['status'] === 'emailNotFound'){

                $userData['emailError'] = "Email invalid";

                $this->view("login", $userData);

           }else if($result['status'] === 'passwordNotMatched'){

                $userData['passwordError'] = "Password invalid";

                $this->view("login", $userData);

           }else if($result['status'] === "ok"){
                $this->setSession("userId", $result['data']);
                $this->redirect("profile");
           }    

        }else{
            $this->view("login", $userData);
        }

    }

}