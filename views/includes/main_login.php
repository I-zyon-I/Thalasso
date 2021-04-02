<header>
    
    <div class="header-login g-0 justify-content-center">
        <div class="login-text col-5 offset-6 text-center">
            <img src="../../assets/imgs/logo.svg" alt="logo">
        </div>
        <div class="col-3 offset-7">
            <h1 class="text-center">Connexion à votre compte</h1>
            <p>Afin d'accéder à votre compte personnel administrateur, veuillez renseigner votre Identifiant et votre Mot de passe.
            </p>
            
            <form action="?page=listeSejours" method="post">
                Identifiant : <input type="text" name="loginAdmin" value="" class="form-control mb-2">
                Mot de passe : <input type="text" name="passwordAdmin" value="" class="form-control mb-2">
                <input type="submit" name="submitLogin" class="btn button mt-3" value="Connexion">
            </form>
        </div> 
    </div>
</header>