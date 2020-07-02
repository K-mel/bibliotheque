<h2>LISTE DES LIVRES</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ISBN </th>
                <th>Titre</th>
                <th>Date Edition</th>
                <th>Editeur</th>
                <th>Auteur</th>
                <th>Thème</th>
                <th>Résumé</th>
                <th>Disponibilité</th>
                <th>Emprunté jusqu'au</th>
                <th>Editer</th>
                <th>Supprimer</th>
                            
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($data)): ?>
            
            <?php foreach($data as $book): ?> 

            <!--ucwords Met en majuscule la première lettre de tous les mots-->
            <tr>
                <td><?php echo ucwords ($book->isbn); ?></td>
                <td><?php echo ucwords ($book->titre); ?></td>
                <td><?php echo ucwords ($book->annee); ?></td>
                <td><?php echo ucwords ($book->editeur); ?></td>
                <td><?php echo ucwords ($book->auteur); ?></td>
                <td><?php echo ucwords ($book->theme); ?></td>
                <td><?php echo substr($book->resume, 0, 50); ?><?php echo '...';?></td>
                <td><?php echo ucwords ($book->disponibilite); ?></td>
                <td><?php echo ucwords ($book->dateRetour); ?></td>

                <td><a href="<?php echo BASEURL; ?>/profile/edit_book/<?php echo $book->isbn; ?>" class="btn btn-warning">Editer</a></td>
                <td><a href="<?php echo BASEURL; ?>/profile/delete/<?php echo $book->isbn; ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
                
            <?php endforeach; ?> 

        <?php endif; ?>
        </tbody>
    </table>