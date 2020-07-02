<?php

class accountModel extends database {

    //Contrôle si l'email existe déjà
    public function checkEmail($email){
        if($this->Query("SELECT email FROM users WHERE email = ?", [$email])){
            if($this->rowCount() > 0 ){
                return false;
            }else{
                return true;
            }
        }
    }

    //Création d'un compte utilisateur admin
    public function createAccount($data){
        if($this->Query("INSERT INTO users (fullName, email, password) VALUES (?,?,?)", $data)){
        }return true;
    }
    
    //Connexion au site
    public function userLogin($email, $password){
        if($this->Query("SELECT * FROM users WHERE email = ?", [$email])){
            if($this->rowCount() > 0){
                $row = $this->fetch();
                $dbPassword = $row->password;
                $userId = $row->id;
                if(password_verify($password, $dbPassword)){
                    $user = ['status' => 'ok', 'data' => $userId];
                    return $user;
                }else{
                    return ['status' => 'passwordNotMatched'];
                }
            }else{
                return ['status' => 'emailNotFound'];
            }
        }
    }


}