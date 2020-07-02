<h2>AJOUTER UN LIVRE</h2>

<form action="<?php echo BASEURL; ?>/profile/library" method="POST">

    <div class="form-group">
        <input type="number" name="isbn" class="form-control" placeholder="Numéro ISBN du livre" value="<?php if($data['isbn']): echo $data['isbn']; endif; ?>"> 

        <div class="error">

            <?php if($data['isbnError']): echo $data['isbnError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <input type="text" name="titre" class="form-control" placeholder="Titre du livre" value="<?php if($data['titre']): echo $data['titre']; endif; ?>"> 
        <div class="error">
            
            <?php if($data['titreError']): echo $data['titreError']; endif;?>

        </div>
    </div>
    
    <div class="form-group">
        <p>Date d'édition</p>
        <input type="date" name="annee" class="form-control" placeholder="Date d'édition" value="<?php if($data['annee']): echo $data['annee']; endif; ?>"> 
    </div>

    <div class="form-group">
        <input type="text" name="resume" class="form-control" placeholder="Résumé du livre" value="<?php if($data['resume']): echo $data['resume']; endif; ?>"> 
    </div>

    <div class="form-group">
        <input type="text" name="editeur" class="form-control" placeholder="Editeur du livre" value="<?php if($data['editeur']): echo $data['editeur']; endif; ?>"> 
        <div class="error">

            <?php if($data['editeurError']): echo $data['editeurError']; endif;?>

        </div>
    </div>

    <div class="form-group">
        <input type="text" name="auteur" class="form-control" placeholder="Auteur du livre" value="<?php if($data['auteur']): echo $data['auteur']; endif; ?>"> 
        <div class="error">

            <?php if($data['auteurError']): echo $data['auteurError']; endif;?>
            
        </div>
    </div>

    <div class="form-group">
        <select name="theme" class="form-control" value="<?php if($data['theme']): echo $data['theme']; endif; ?>">
            <option value="">Selectionner le thème</option>
            <option value="Histoire">Histoire</option>
            <option value="Geographie">Geographie</option>
            <option value="Musique">Musique</option>
            <option value="Guerre">Guerre</option>
            <option value="Cinema">Cinema</option>
            <option value="Aventure">Aventure</option>
            <option value="Geographie">Geographie</option>
            <option value="Mathematique">Mathematique</option>
            <option value="Science">Science</option>
            <option value="Amour">Amour</option>
            <option value="Policier">Policier</option>
            <option value="Fantastique">Fantastique</option>
            <option value="Science-fiction">Science-fiction</option>
            <option value="Manga">Manga</option>
            <option value="Bande dessinée">Bande dessinée</option>
            
        </select>
    </div>

    <div class="form-group">
        <select name="disponibilite" class="form-control" value="<?php if($data['disponibilite']): echo $data['disponibilite']; endif; ?>">
            <option value="">Selectionner la disponibilité</option>
            <option value="Emprunte">Emprunté</option>
            <option value="Disponible">Disponible</option>
        </select>
    </div>

    <div class="form-group">
        <p>Date de retour</p>
        <input type="date" name="dateRetour" class="form-control" placeholder="Date retour" value="<?php if($data['dateRetour']): echo $data['dateRetour']; endif; ?>"> 
    </div>

    <div class="form-group">
        <input type="submit" value="Ajouter dans la bibliothèque" class="btn btn-primary">

    </div>

</form>