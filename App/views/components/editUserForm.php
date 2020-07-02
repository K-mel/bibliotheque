<h2>MODIFIER</h2>

<form action="<?php echo BASEURL; ?>/user/updateUser" method="POST">

   
    <div class="form-group">
        <input type="text" name="nom" class="form-control" placeholder="Entrez le nom de l'utilisateur" value="<?php echo $data['data']->nom; ?>"> 

        <div class="error">

            <?php if($data['nomError']): echo $data['nomError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="text" name="prenom" class="form-control" placeholder="Entrez le prénom de l'utilisateur" value="<?php echo $data['data']->prenom; ?>"> 

        <div class="error">

            <?php if($data['prenomError']): echo $data['prenomError']; endif;?>

        </div>
        
    </div>


    <div class="form-group">
    <p>Date de naissance :</p>
        <input type="date" name="naissance" class="form-control" placeholder="date de naissance" value="<?php echo $data['data']->naissance; ?>"> 

        <div class="error">

            <?php if($data['naissanceError']): echo $data['naissanceError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Entrez l'email de l'utilisateur" value="<?php echo $data['data']->email; ?>"> 

        <div class="error">

            <?php if($data['emailError']): echo $data['emailError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="number" name="telephone" class="form-control" placeholder="Entrez le numéro de téléphone de l'utilisateur" value="<?php echo $data['data']->telephone; ?>"> 

        <div class="error">

            <?php if($data['telephoneError']): echo $data['telephoneError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="text" name="rue" class="form-control" placeholder="rue ..." value="<?php echo $data['data']->rue; ?>"> 

        <div class="error">

            <?php if($data['rueError']): echo $data['rueError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="text" name="ville" class="form-control" placeholder="ville ..." value="<?php echo $data['data']->ville; ?>"> 

        <div class="error">

            <?php if($data['villeError']): echo $data['villeError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="number" name="cp" class="form-control" placeholder="Code postal ..." value="<?php echo $data['data']->cp; ?>"> 

        <div class="error">

            <?php if($data['cpError']): echo $data['cpError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
    <p>Date de validité de la carte d'abonné :</p>
        <input type="date" name="validite" class="form-control" placeholder="Entrez la date de validité de l'abonnement" value="<?php echo $data['data']->validite; ?>"> 

        <div class="error">

            <?php if($data['validiteError']): echo $data['validiteError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <select name="categorie" class="form-control" value="<?php echo $data['data']->categorie; ?>">
            <option value="">Selectionner le profile</option>
            <option value="Etudiant">Etudiant</option>
            <option value="Professeur">Professeur</option>
        </select>
        <input type="hidden" name="hiddenId" value="<?php echo $data['data']->id; ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="MODIFIER" class="btn btn-primary">

    </div>

</form>