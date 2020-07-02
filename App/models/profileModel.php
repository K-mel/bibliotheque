<?php 

class profileModel extends database {

    //LIVRE//

    //CREATION D'UN LIVRE
    public function addBook($book){
        if($this->Query("INSERT INTO book(isbn, titre, annee, resume, editeur, auteur, theme, disponibilite, dateRetour, userId) VALUES (?,?,?,?,?,?,?,?,?,?)", $book, $userId)){
            return true;
        }
    }
    
    
    //LECTURE DES LIVRES
    public function getData($userId){
        //$userId = $this->getSession('userId');
        if($this->Query("SELECT * FROM book WHERE userId", [$userId])){
            $data = $this->fetchAll();
            return $data;
        }
    }
   

    //LECTURE D'UN LIVRE "editer"
    public function edit_data($isbn, $userId){
        if($this->Query("SELECT * FROM book WHERE isbn = ? && userId = ? ", [$isbn, $userId])){
            $row = $this->fetch();
            return $row;
        }
    }

    
    //MODIFICATION D'UN LIVRE
    public function updateBook($updateData){
        if($this->Query("UPDATE book SET isbn = ?, titre = ?, annee = ?, resume = ?, editeur = ?, auteur = ?, theme = ?, disponibilite = ?, dateRetour = ? WHERE isbn = ? AND userId = ? ", $updateData)){
            return true;
        }
    }

    
    //SUPPRIMER UN LIVRE
    public function deleteBook($isbn, $userId){
        if($this->Query("DELETE FROM book WHERE isbn = ? && userId = ?", [$isbn, $userId])){
            return true;
        }

    }


   

}