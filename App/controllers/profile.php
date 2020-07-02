<?php

class profile extends framework {

        public function __construct(){
            if(!$this->getSession('userId')){
                $this->redirect("accountController/loginForm");
            }
            $this->helper('link');
            $this->profileModel = $this->model("profileModel");
        }

        //LECTURE DE TOUS LES LIVRES
        public function index(){
           $userId = $this->getSession('userId');
            $data = $this->profileModel->getData('$userId');
            $this->view("profile", $data);
        }


        // AJOUTER LE FORMULAIRE AJOUT LIVRE
        public function bookForm(){
            $this->view("addBook");
        }

        //OBJET LIVRE
        public function library(){

            $libraryData = [

                'isbn'          => $this->input('isbn'),
                'titre'         => $this->input('titre'),
                'annee'         => $this->input('annee'),
                'resume'        => $this->input('resume'),
                'editeur'       => $this->input('editeur'),
                'auteur'        => $this->input('auteur'),
                'theme'         => $this->input('theme'),
                'disponibilite' => $this->input('disponibilite'),
                'dateRetour'    => $this->input('dateRetour'),
                'isbnError'     => '',
                'titreError'    => '',
                'editeurError'  => '',
                'auteurError'   => ''
                
                ];

                if(empty($libraryData['isbn'])){
                    $libraryData['isbnError'] = "Un numéro ISBN doit être ajoutée";
                }

                if(empty($libraryData['titre'])){
                    $libraryData['titreError'] = "Un titre doit être ajoutée";
                }

                if(empty($libraryData['editeur'])){
                    $libraryData['editeurError'] = "le nom de l'éditeur doit être ajouté";
                }

                if(empty($libraryData['auteur'])){
                    $libraryData['auteurError'] = "le nom de l'auteur doit être ajouté";
                }

                if(empty($libraryData['isbnError']) && empty($libraryData['titreError']) && empty($libraryData['editeurError']) && empty($libraryData['auteurError'])){
                   
                    $data = [$libraryData['isbn'], $libraryData['titre'], $libraryData['annee'], $libraryData['resume'], $libraryData['editeur'],$libraryData['auteur'],$libraryData['theme'], $libraryData['disponibilite'], $libraryData['dateRetour'], $this->getSession('userId')];
                    
                    if($this->profileModel->addBook($data)){
                        $this->setFlash("bookAdded", "Votre livre a bien été ajouté à la bibliothèque");
                        $this->redirect("profile/index");
                    }

                }else{
                    $this->view("addBook", $libraryData);
                }
            
        }

        //EDITER UN LIVRE
        public function edit_book($isbn){

            $userId = $this->getSession('userId');
            $bookEdit = $this->profileModel->edit_data($isbn, $userId);

            $data = [

                'data'          => $bookEdit,
                'isbnError'     => '',
                'titreError'    => '',
                'editeurError'  => '',
                'auteurError'   => ''

            ];

            $this->view("edit_book", $data);
        }


        //MODIFIER UN LIVRE
        public function updateBook(){

            $isbn = $this->input('hiddenId');
            $userId = $this->getSession('userId');
            $bookEdit = $this->profileModel->edit_data($isbn, $userId);

            $libraryData = [
                
                'isbn'          => $this->input('isbn'),
                'titre'         => $this->input('titre'),
                'annee'         => $this->input('annee'),
                'resume'        => $this->input('resume'),
                'editeur'       => $this->input('editeur'),
                'auteur'        => $this->input('auteur'),
                'theme'         => $this->input('theme'),
                'disponibilite' => $this->input('disponibilite'),
                'dateRetour'    => $this->input('dateRetour'),
                
                'data'          => $bookEdit,
                'hiddenId'      => $this->input('hiddenId'),
                'isbnError'     => '',
                'titreError'    => '',
                'editeurError'  => '',
                'auteurError'   => ''
                
                ];

                if(empty($libraryData['isbn'])){
                    $libraryData['isbnError'] = "Veuillez mettre un numéro ISBN valide";
                }

                if(empty($libraryData['titre'])){
                    $libraryData['titreError'] = "Veuillez mettre un titre valide";
                }

                if(empty($libraryData['editeur'])){
                    $libraryData['editeurError'] = "Veuillez mettre un nom d'éditeur valide";
                }

                if(empty($libraryData['auteur'])){
                    $libraryData['auteurError'] = "Veuillez mettre un nom d'auteur valide";
                }

                if(empty($libraryData['isbnError']) && empty($libraryData['titreError']) && empty($libraryData['editeurError']) && empty($libraryData['auteurError'])){

                    $updateData = [$libraryData['isbn'], $libraryData['titre'], $libraryData['annee'], $libraryData['resume'], $libraryData['editeur'], $libraryData['auteur'], $libraryData['theme'],$libraryData['disponibilite'], $libraryData['dateRetour'], $libraryData['hiddenId'], $userId];
                    
                    if($this->profileModel->updateBook($updateData)){
                        /*echo "Les modifications ont bien été effectuées";*/
                        $this->setflash('bookUpdated', 'Les modifications ont bien été effectuées');
                        $this->redirect("profile/index");
                    }

                }else{
                    $this->view("edit_book", $libraryData);

                }

        }

        //SUPPRIMER UN LIVRE 
        public function delete($isbn){

            $userId = $this->getSession('userId');
            if($this->profileModel->deleteBook($isbn, $userId)){
                $this->setflash('deleted', 'Votre livre a bien été supprimé de la bibliothèque');
                $this->redirect('profile/index');
            }
        }


        // FERMER LA SESSION
        public function logout(){

            $this->destroy();
            $this->redirect("accountController/loginForm");
        }


}