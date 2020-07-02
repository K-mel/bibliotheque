<h2>CREER UN NOUVEL UTILISATEUR</h2>

    <form action="<?php echo BASEURL; ?>/accountController/createAccount" method="POST">

        <div class="form-group">
            <input type="text" name="fullName" class="form-control" placeholder="Entrez votre nom" value="<?php if(!empty($data['fullName'])): echo $data['fullName']; endif; ?>">
            <div class="error">
               <?php if(!empty($data['fullNameError'])): echo $data['fullNameError']; endif; ?> 
            </div>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Entrez votre email" value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
            <div class="error">
               <?php if(!empty($data['emailError'])): echo $data['emailError']; endif; ?> 
            </div>
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre password" value="<?php if(!empty($data['password'])): echo $data['password']; endif; ?>">
            <div class="error">
               <?php if(!empty($data['passwordError'])): echo $data['passwordError']; endif; ?> 
            </div>
        </div>

        <div class="form-group">
            <input type="submit" name="signupBtn" class="btn btn-primary" value="Envoyer">
        </div>

<!-- fin du form-group -->
    </form>