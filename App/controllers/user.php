<?php 

class user extends framework{

    public function __construct(){
            
        if(!$this->getSession('userId')){
            $this->redirect("accountController/loginForm");
        }
        $this->helper('link');
        $this->userModel = $this->model("userModel");

    }

    //GESTION DE LA SESSION

    public function index(){
        $userId = $this->getSession('userId');
        $data = $this->userModel->getUsers('$userId');
        $this->view("user", $data);
    }

 
        //AJOUTER LE FORMULAIRE DES UTILISATEURS
        public function userForm(){
            $this->view("addUser");
        }
        

        // OBJET UTILISATEUR
        public function userbase(){
            
            $userData = [

                'nom'               => $this->input('nom'),
                'prenom'            => $this->input('prenom'),
                'naissance'         => $this->input('naissance'),
                'email'             => $this->input('email'),
                'telephone'         => $this->input('telephone'),
                'rue'               => $this->input('rue'),
                'ville'             => $this->input('ville'),
                'cp'                => $this->input('cp'),
                'categorie'         => $this->input('categorie'),
                'validite'          => $this->input('validite'),
                
                'nomError'          => '',
                'prenomError'       => '',
                'validiteError'     => '',
                'emailError'        => '',
                'telephoneError'    => '',
                'naissanceError'    => '',
                'categorieError'    => ''
                
                
                ];

                if(empty($userData['nom'])){
                    $userData['nomError'] = "Ajoutez un nom";
                }

                if(empty($userData['prenom'])){
                    $userData['prenomError'] = "Ajoutez un prénom";
                }

                if(empty($userData['email'])){
                    $userData['emailError'] = "Ajoutez une adresse email valide";
                }

                if(empty($userData['telephone'])){
                    $userData['telephoneError'] = "Ajoutez un numéro de téléphone";
                }
                if(empty($userData['naissance'])){
                    $userData['naissanceErrorError'] = "Ajoutez une date de naissance";
                }

                if(empty($userData['categorie'])){
                    $userData['categorieError'] = "Ajoutez une catégorie";
                }
                
                
                if(empty($userData['nomError']) && empty($userData['prenomError']) && empty($userData['emailError']) && empty($userData['telephoneError']) && empty($userData['naissanceErrorError']) && empty($userData['categorieError'])){
                   
                    $data = [$userData['nom'], $userData['prenom'], $userData['naissance'], $userData['email'],  $userData['telephone'], $userData['rue'], $userData['ville'], $userData['cp'], $userData['categorie'], $userData['validite'], $this->getSession('userId')];
                    
                    if($this->userModel->addUser($data)){
                        
                        $this->setFlash("userAdded", "L'utilisateur a bien été ajouté dans base de données");
                        $this->redirect("user/index");
                    }

                }else{
                    $this->view("addUser", $userData);
                }
            
        }

 
        // EDITER LES FICHES UTILISATEURS
        public function edit_user($id){
         
            $userId = $this->getSession('userId');
            $userEdit = $this->userModel->edit_user($id, $userId);

            $data = [

                'data'                      => $userEdit,
                'nomError'                  => '',
                'prenomError'               => '',
                'validiteError'             => '',
                'emailError'                => '',
                'telephoneError'            => '',
                'naissanceError'            => '',
                'categorieError'            => ''

            ];

            $this->view("edit_user", $data);
        }


        //MODIFIER UNE FICHE UTILISATEUR
        public function updateUser(){

            $id = $this->input('hiddenId');
            $userId = $this->getSession('userId');
            $userEdit = $this->userModel->edit_user($id, $userId);

            $userData = [

                'nom'                       => $this->input('nom'),
                'prenom'                    => $this->input('prenom'),
                'validite'                  => $this->input('validite'),
                'email'                     => $this->input('email'),
                'telephone'                 => $this->input('telephone'),
                'rue'                       => $this->input('rue'),
                'ville'                     => $this->input('ville'),
                'cp'                        => $this->input('cp'),
                'naissance'                 => $this->input('naissance'),
                'categorie'                 => $this->input('categorie'),
                
                'data'                      => $userEdit,
                'hiddenId'                  => $this->input('hiddenId'),
                'nomError'                  => '',
                'prenomError'               => '',
                'emailError'                => '',
                'telephoneError'            => '',
                'naissanceError'            => '',
                'categorieError'            => ''
                
                
                ];


                if(empty($userData['nom'])){
                    $userData['nomError'] = "Ajoutez un nom";
                }

                if(empty($userData['prenom'])){
                    $userData['prenomError'] = "Ajoutez un prénom";
                }

                if(empty($userData['email'])){
                    $userData['emailError'] = "Ajoutez une adresse email valide";
                }

                if(empty($userData['telephone'])){
                    $userData['telephoneError'] = "Ajoutez un numéro de téléphone";
                }
                if(empty($userData['naissance'])){
                    $userData['naissanceError'] = "Ajoutez une date de naissance";
                }

                if(empty($userData['categorie'])){
                    $userData['categorieError'] = "Ajoutez une catégorie";
                }
                
                
                if(empty($userData['nomError']) && empty($userData['prenomError']) && empty($userData['emailError']) && empty($userData['telephoneError']) && empty($userData['naissanceError']) && empty($userData['categorieError'])){
                   
                    $updateData = [$userData['nom'], $userData['prenom'],$userData['naissance'], $userData['email'], $userData['telephone'], $userData['rue'], $userData['ville'], $userData['cp'],$userData['categorie'],  $userData['validite'] , $userData['hiddenId'], $userId];
                    
                    
                    if($this->userModel->updateUser($updateData)){
                        /*echo "Les modifications ont bien été effectuées";*/
                        $this->setflash('userUpdated', 'Les modifications ont bien été effectuées');
                        $this->redirect("user/index");
                    }

                }else{
                    $this->view("edit_user", $userData);

                }

        }


        //SUPPRIMER LES UTILISATEURS
        public function deleteUser($id){

            $userId = $this->getSession('userId');
            if($this->userModel->deleteUser($id, $userId)){
                $this->setflash('deletedUser', 'Utilisateur supprimé de la base de données');
                $this->redirect('user/index');
            }
        }
        

        // FERMER LA SESSION
        public function logout(){

            $this->destroy();
            $this->redirect("accountController/loginForm");
        }




}