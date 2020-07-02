<h2>MODIFIER LES DONNEES DU LIVRE</h2>

<form action="<?php echo BASEURL; ?>/profile/updateBook" method="POST">

    <div class="form-group disabled">
    <p>Numéro ISBN :</p>
        <input type="number" name="isbn" class="form-control " placeholder="numéro ISBN du livre" value="<?php echo $data['data']->isbn;?>"> 
        <div class="error">

            <?php if($data['isbnError']): echo $data['isbnError']; endif;?>

        </div>
        
    </div>

    <div class="form-group">
        <p>Titre :</p>
        <input type="text" name="titre" class="form-control" placeholder="Titre du livre" value="<?php echo $data['data']->titre;?>"> 
        <div class="error">

        <?php if($data['titreError']): echo $data['titreError']; endif;?>

        </div>
    </div>

    <div class="form-group">
    <p>Date édition :</p>
        <input type="date" name="annee" class="form-control" placeholder="Date d'édition" value="<?php echo $data['data']->annee; ?>"> 
    </div>

    
    
    <div class="form-group">
    <p>Résumé :</p>
        <input type="text" name="resume" class="form-control" placeholder="Résumé du livre" value="<?php echo $data['data']->resume; ?>"> 
    </div>

    <div class="form-group">
    <p>Editeur :</p>
        <input type="text" name="editeur" class="form-control" placeholder="Editeur du livre" value="<?php echo $data['data']->editeur; ?>"> 
        <div class="error">

            <?php if($data['editeurError']): echo $data['editeurError']; endif;?>

        </div>
    </div>

    <div class="form-group">
    <p>Auteur :</p>
        <input type="text" name="auteur" class="form-control" placeholder="Auteur du livre" value="<?php echo $data['data']->auteur; ?>"> 
        <div class="error">

            <?php if($data['auteurError']): echo $data['auteurError']; endif;?>
            
        </div>
    </div>

    <div class="form-group">
        <select name="theme" class="form-control" value="<?php echo $data['data']->theme; ?>">
        
            <option value=""> Selectionner le thème</option>
            <option value="Histoire">Histoire</option>
            <option value="Geographie">Geographie</option>
            <option value="Musique">Musique</option>
            <option value="Guerre">Guerre</option>
            <option value="Cinema">Cinema</option>
            <option value="Aventure">Aventure</option>
            <option value="Geographie">Geographie</option>
            <option value="Mathematique">Mathematique</option>
            <option value="Science">Science</option>
            <option value="Science">Manga</option>

        </select>
        
    </div>

    <div class="form-group">
        <select name="disponibilite" class="form-control" value="<?php echo $data['data']->disponibilite; ?>">
            <option value="" >Selectionner la disponibilité</option>
            <option value="Emprunte">Emprunté</option>
            <option value="Disponible">Disponible</option>
        </select>
        <input type="hidden" name="hiddenId" value="<?php echo $data['data']->isbn; ?>">
    </div>

    <div class="form-group">
        <p>Date de retour :</p>
        <input type="date" name="dateRetour" class="form-control" placeholder="Date retour" value="<?php echo $data['data']->dateRetour; ?>"> 
    </div>

    <div class="form-group">
        <input type="submit" value="Modifier" class="btn btn-primary">
        
    </div>

</form>