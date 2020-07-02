<h2>LISTE DES ABONNES</h2>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>NUMERO D'ABONNE</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>DATE DE NAISSANCE</th>
                <th>EMAIL</th>
                <th>TELEPHONE</th>
                <th>RUE</th>
                <th>VILLE</th>
                <th>CODE POSTALE</th>
                <th>CATEGORIE</th>
                <th>DATE DE VALIDITE</th>
                <th>EDITER</th>
                <th>SUPPRIMER</th>
              
             
            </tr>
        </thead>
       <tbody>
        <?php if(!empty($data)): ?>
            
            <?php foreach($data as $user): ?> 
            
            <tr>
                <td><?php echo strtoupper (substr($user->nom, 0 , 3) . substr($user->prenom, 0, 3)  . sprintf("%'.03d\n", $user->id )); ?></td>

                <td><?php echo ucwords ($user->nom); ?></td>

                <td><?php echo ucwords ($user->prenom); ?></td>

                <td><?php echo ucwords ($user->naissance); ?></td>

                <td><?php echo ucwords ($user->email); ?></td>

                <td><?php echo ucwords ($user->telephone); ?></td>

                <td><?php echo ucwords ($user->rue); ?></td>

                <td><?php echo ucwords ($user->ville); ?></td>

                <td><?php echo ucwords ($user->cp); ?></td>

                <td><?php echo ucwords ($user->categorie); ?></td>

                <td><?php echo ucwords ($user->validite); ?></td>

                <td><a href="<?php echo BASEURL; ?>/user/edit_user/<?php echo $user->id; ?>" class="btn btn-warning">Editer</a></td>
                
                <td><a href="<?php echo BASEURL; ?>/user/deleteUser/<?php echo $user->id; ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
                
            <?php endforeach; ?> 

        <?php endif; ?>
        </tbody>
    </table>

