<?php 
    session_start();
    require("head.php");
    require("entete.php");
?>


<main class="main">
    <div class="inscbox">
        <h1 class="text-center form-group">
            <span class="glyphicon glyphicon-user"></span>
            Inscription
        </h1>
        <form action="../controller/cibleInscription.php" method="post" class="mx-auto">
            <div class="form-group">
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" required placeholder="Entrer votre nom" class="form-control">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" required placeholder="Entrer votre prénom" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">E-mail : </label>
                <input type="email" name="email" id="email" required placeholder="Entrer votre e-mail" class="form-control">
            </div>
            <div class="form-group">
                <label for="passw">Mot de passe : </label>
                <input type="password" name="passw" id="passw" required placeholder="Entrer votre mot de passe " class="form-control">
            </div>
       
            <div class="form-group">
                <button type="submit" class="btn btn-lg btn-primary btn-block">Inscription</button>
                <button type="reset" class="btn btn-lg btn-primary btn-block annl">Annuler</button>
            </div>
        </form>
    </div>

</main>


<?php require("footer.php") ?>