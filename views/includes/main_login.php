<header>
    
    <div class="header-login g-0 justify-content-center">
        <div class="login-text col-5 offset-6 text-center">
            <img src="../../assets/imgs/logo1.svg" alt="logo">
        </div>
        <div class="col-3 offset-7">
            <h2 class="text-center">Espace Administrateur</h2>
            <p>Afin d'accéder à votre compte personnel administrateur, veuillez renseigner votre Identifiant et votre Mot de passe.
            </p>
            
            <form method="post">
                Identifiant : <input type="text" name="loginAdmin" value="" class="form-control mb-2">
                Mot de passe : <input type="password" name="passwordAdmin" value="" class="form-control mb-2">
                <div class="erreur"><?php echo $message ?></div>
                <input type="submit" name="submitLogin" class="btn button mt-3" value="Connexion">
            </form>
        </div> 
    </div>
</header>