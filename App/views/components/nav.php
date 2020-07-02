<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?php echo BASEURL; ?>/profile">BIBLIOTHEQUE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASEURL; ?>/profile">ACCUEIL<span class="sr-only">(current)</span></a>
      </li>


<?php if(!$this->getSession('userId')): ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL;?>/accountController">S'INSCRIRE</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL;?>/accountController/loginForm">SE CONNECTER</a>
      </li>

<?php else: ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL;?>/profile/bookForm">AJOUTER UN LIVRE</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL;?>/user/userForm">AJOUTER UN UTILISATEUR</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASEURL;?>/user">LISTE DES ABONNES</a>
      </li>


<?php endif;?>

    </ul>
        

<?php if($this->getSession('userId')):?>
 

    <ul class="my-2 my-lg-0"> 
   
      <a href="<?php echo BASEURL; ?>/profile/logout" class="btn btn-success">SE DECONNECTER</a>
    </ul>

  
<?php endif; ?>

  </div>
</nav>

<!-- fin de la NAVBAR-->