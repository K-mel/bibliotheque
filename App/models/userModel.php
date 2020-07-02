<?php 

class userModel extends database{

    ///UTILISATEURS///


    //CREATION D'UN UTILISATEUR
    public function addUser($user){
        if($this->Query("INSERT INTO subscribe(nom, prenom, naissance , email, telephone, rue, ville, cp, categorie, validite, userId) VALUES (?,?,?,?,?,?,?,?,?,?,?)", $user, $userId)){
            return true;
        }
    }

    //LECTURE DES UTILISATEURS
    public function getUsers($userId){
        //$userId = $this->getSession('userId');
        if($this->Query("SELECT * FROM subscribe WHERE userId", [$userId])){
            $data = $this->fetchAll();
            return $data;
        }
    }

    //LECTURE D'UN UTILISATEUR
    public function edit_user($id, $userId){
        if($this->Query("SELECT * FROM subscribe WHERE id = ? && userId = ? ", [$id, $userId])){
            $row = $this->fetch();
            return $row;
        }
    }

    //MODIFICATION D'UN UTILISATEUR
    public function updateUser($updateData){
        if($this->Query("UPDATE subscribe SET nom = ? , prenom = ? , validite = ? , email = ? , telephone = ? , rue = ? , ville = ? , cp = ? , naissance = ? , categorie = ? WHERE id = ? AND userId = ? ", $updateData)){
            return true;
        }
    }

     //SUPPRIMER UN UTILISATEUR
     public function deleteUser($id, $userId){
        if($this->Query("DELETE FROM subscribe WHERE id = ? && userId = ?", [$id, $userId])){
            return true;
        }
    }



}