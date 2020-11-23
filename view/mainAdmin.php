<?php 
    session_start();
    require("head.php");
    require("enteteCon.php");
?>
<?php if(!empty($_SESSION['erreurs'])){ ?>
              <div class="alert alert-danger">
                <p>Vous devez remplire correctement le formulaire </p>
                <ul>  
                    <?php foreach($_SESSION['erreurs'] as $error){
                        ?>
                        <li><?= $error; ?></li>
                    <?php
                    } ?>
                </ul>
            </div>
<?php } ?>
<?php session_destroy(); ?>

<div class="regl1">
    <h1 class="text-center" style="color:black ">
        CONFIGURATION DES DONNÉES
    </h1>
    
    <div class="d-flex justify-content-between mb-3" style="margin:100px 100px">
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#listQuestionnaire" aria-expanded="false" aria-controls="listQuestionnaire">La liste des questionnaires</button>
            <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#ajoutQuestionnaire" aria-expanded="false" aria-controls="ajoutQuestionnaire">Ajouter un questionaire</button>
            <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#supprimerQuestionnaire" aria-expanded="false" aria-controls="supprimerQuestionnaire">Supprimer un questionaire</button>
    </div>
    
    <div class="row">
        <div class="col"> 
            <div class="collapse multi-collapse" id="listQuestionnaire">
                <div class="card card-body">
                    <div class="alert alert-info">
                        <ol id="listQst"></ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="collapse multi-collapse" id="ajoutQuestionnaire">
                <div class="card card-body">
                    <form action="../controller/ajoutQuestionnaire.php" method="post">
                        <div class="form-group">
                            <label for="cntn"></label>
                            <input type="text" class="form-control" name="cntn" id="cntn" placeholder="Entrer le nom du continent" required>
                            <label for="ajtQues"></label>
                            <input type="text" class="form-control" name="ajtQues" id="ajtQues" placeholder="Entrer votre questionnaire" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="collapse multi-collapse" id="supprimerQuestionnaire">
                <div class="card card-body">
                    <form action="../controller/supprimerQuesionnaire.php" method="post">
                        <div class="form-group">
                           <label for="sprcntn"></label>
                            <input type="text" class="form-control" name="sprcntn" id="sprcntn" placeholder="Entrer le nom du continent" required>
                            <label for="sprQues"></label>
                            <input type="text" class="form-control" name="sprQues" id="sprQues" placeholder="Entrer votre questionnaire" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-between mb-3" style="margin:100px 100px">
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#listJoueur" aria-expanded="false" aria-controls="listJoueur">La liste des joueurs</button>
        <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#supprimerJoueur" aria-expanded="false" aria-controls="supprimerJoueur">Supprimer un joueur</button>
    </div>

    <div class="row">
        <div class="col">
            <div class="collapse multi-collapse" id="listJoueur">
                <div class="card card-body">
                    <div class="alert alert-info">
                        <ol id="listJr"></ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="collapse multi-collapse" id="supprimerJoueur">
                <div class="card card-body">
                    <form action="../controller/supprimerJoueur.php" method="post">
                        <div class="form-group">
                            <label for="sprJr"></label>
                            <input type="email" class="form-control" name="sprJr" id="sprJr" placeholder="Entrer le mail du joueur" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    
    </div>

    
</div>

<script>

    $.ajax({
            url: "../controller/listQuestionnaire.php",
            method: "POST",
            success: function (donnee){
                var info = JSON.parse(donnee);
                var i = 0;
                while( i < info.length ){
                    $("#listQst").append("<li>"+info[i].continent+" : "+info[i].questionnaire+"</li>");
                    i++;
                }
                console.log(info);
            },
            error: function (erreur) {
                alert("ERREUR !!! ");
            },
    });

    $.ajax({
            url: "../controller/listJoueur.php",
            method: "POST",
            success: function (donnee){
                var info = JSON.parse(donnee);
                var i=0;
                while( i < info.length ){
                    $("#listJr").append("<li>Nom: "+info[i].nom+" ; Prénom: "+info[i].prenom+" ; E-mail: "+info[i].mail+"</li>");
                    i++;
                }
                console.log(info);
            },
            error: function (erreur) {
                alert("ERREUR !!! ");
            },
    });
</script>


<?php require("footer.php"); ?>