<?php $this->flash('accountCreated', 'alert alert-success'); ?>

<h2>SE CONNECTER</h2>

<form action="<?php echo BASEURL;  ?>/accountController/userLogin" method="POST">

    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Entrez votre email" value="<?php if(!empty($data['email'])): echo $data['email']; endif;  ?>">

        <div class="error">
            <?php if(!empty($data['emailError'])): echo $data['emailError']; endif; ?>

        </div>
    </div>

    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Entrez votre password" value="<?php if(!empty($data['password'])): echo $data['password']; endif;  ?>">

        <div class="error">
            <?php if(!empty($data['passwordError'])): echo $data['passwordError']; endif; ?>
        </div>
    </div>



    <div class="form-group">
        <input type="submit" name="loginBtn" class="btn btn-primary" value="Connexion">
    </div>

<!-- fin du form-group -->
</form>