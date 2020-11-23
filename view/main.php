<?php 
    session_start();
    require("head.php");
    require("enteteCon.php");
?>

<div class="regl1">
    <h1 class="t1 text-center pad ">
        <?php echo 'BIENVENUE ' .$_SESSION['info']['nom'].' '. $_SESSION['info']['prenom']; ?> 
    </h1>
    <div class=diiv>
        <br><br>
        <h4 class="text-center conx">
            Choisisez un mode de jeu ( un continent ) que vous souhaitez mieux découvrir.
        </h4>
        <br>
        <div class="dropdown text-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Choisir le mode
            </button>
            <div class="dropdown-menu pa" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="afrique.php">Afrique</a>
                <a class="dropdown-item" href="asie.php">Asie + Australie</a>
                <a class="dropdown-item" href="europe2.php">Europe</a>
                <a class="dropdown-item" href="usa.php">USA</a>
                <a class="dropdown-item" href="monde.php">Le monde entier</a>
            </div>
        </div>
    </div>
</div>

<?php require("footer.php")?>