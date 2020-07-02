<h2>AJOUTER UN NOUVEL UTILISATEUR</h2>

<form action="<?php echo BASEURL; ?>/user/userbase" method="POST">


    <div class="form-group">
        <input type="text" name="nom" class="form-control" placeholder="Nom" value="<?php if($data['nom']): echo $data['nom']; endif; ?>"> 
        <div class="error">
            <?php if($data['nomError']): echo $data['nomError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="prenom" class="form-control" placeholder="Prénom" value="<?php if($data['prenom']): echo $data['prenom']; endif; ?>"> 
        <div class="error">
            <?php if($data['prenomError']): echo $data['prenomError']; endif;?>
        </div>
    </div>

   
    <div class="form-group">
    <p>Date de naissance :</p>
        <input type="date" name="naissance" class="form-control" placeholder="date de naissance" value="<?php if($data['naissance']): echo $data['naissance']; endif; ?>"> 
        <div class="error">
            <?php if($data['naissanceError']): echo $data['naissanceError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php if($data['email']): echo $data['email']; endif; ?>"> 
        <div class="error">
            <?php if($data['emailError']): echo $data['emailError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="number" name="telephone" class="form-control" placeholder="Numéro de téléphone" value="<?php if($data['telephone']): echo $data['telephone']; endif; ?>"> 
        <div class="error">
            <?php if($data['telephoneError']): echo $data['telephoneError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="rue" class="form-control" placeholder="rue ..." value="<?php if($data['rue']): echo $data['rue']; endif; ?>"> 
        <div class="error">
            <?php if($data['rueError']): echo $data['rueError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="text" name="ville" class="form-control" placeholder="ville ..." value="<?php if($data['ville']): echo $data['ville']; endif; ?>"> 
        <div class="error">
            <?php if($data['villeError']): echo $data['villeError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <input type="number" name="cp" class="form-control" placeholder="Code postal ..." value="<?php if($data['cp']): echo $data['cp']; endif; ?>"> 
        <div class="error">
            <?php if($data['cpError']): echo $data['cpError']; endif;?>
        </div>
    </div>

    <div class="form-group">
        <select name="categorie" class="form-control" value="<?php if($data['categorie']): echo $data['categorie']; endif; ?>">
            <option value="">Selectionner le profile</option>
            <option value="Etudiant">Etudiant</option>
            <option value="Professeur">Professeur</option>
        </select>
    </div>

    <div class="form-group">
    <p>Date de validité de la carte d'abonné :</p>
        <input type="date" name="validite" class="form-control" placeholder="Entrez la date de validité de l'abonnement" value="<?php if($data['validite']): echo $data['validite']; endif; ?>"> 
        <div class="error">
            <?php if($data['validiteError']): echo $data['validiteError']; endif;?>
        </div>
    </div>


    <div class="form-group">
        <input type="submit" value="Ajouter un utilisateur" class="btn btn-primary">

    </div>

</form>