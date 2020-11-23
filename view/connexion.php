<?php 
    session_start();
    require("head.php");
    require("entete.php");
?>

<?php if (!empty($_SESSION['erreurs']) ){?>
    <div class="alert alert-danger">
        <p>Le mail ou le mot de passe est incorrect.</p>
        <p>Veuillez réessayer.</p>
        <ul>  
              <?php foreach($_SESSION['erreurs'] as $error){
                  ?>
                  <li><?= $error; ?></li>
              <?php
              } ?>
          </ul>
    </div>
<?php }?>
<?php session_destroy(); ?>



<main class="main">
        <div class="loginbox">
            <h1 class="text-center form-group">
                <span class="glyphicon glyphicon-log-in"></span>
                Connexion
            </h1>
            <form action="../controller/cibleConnexion.php" method="post" class="mx-auto">
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Entrer votre e-mail">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Entrer votre mot de passe">
                </div>
                <div class="checkbox">
                    <input type="checkbox" value="Se souvenir de moi">Se souvenir de moi
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Connexion</button>
                    <button type="reset" class="btn btn-lg btn-primary btn-block annl" >Annuler</button>            
                </div>
            </form>
        </div>

</main>
  





<?php require("footer.php") ?>