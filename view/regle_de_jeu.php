<?php require("head.php") ?>
<nav class="navbar navbar-expand-lg navbar-light">
    <a id ="active" class="navbar-brand " href="index.php">
      <span class="glyphicon glyphicon-home"></span>
      Accueil
    </a>
</nav>    

<div class="regl">
    
  <h1 class="t1 text-center hh1">Les règles du jeu</h1>
  <h3 class="sous">Description du jeu </h3>
  <p>Le principe général du jeu est de proposer des questionnaires constitués de quelques questions ( drapeaux ==>> sa localisation sur la carte du monde ).</p>
  <p>Chaque question consiste à localiser à l'aide d'un clic de souris, l'emplacement du pays représenté par le drapeau de la question.</p>
  <h3 class="sous">Types de questionnaires </h3>
  <p>Vous avez deux types de questionnaires</p>
  <ol>
    <li> Le premier type : <br> Vous pouvez jouer d'une façon anonyme, sans inscription.</li>
       <ul>
          <li>Vous devez répondre à quelques questions.</li>
          <li>On vous donne un drapeau et une carte d'un continent : vous devez trouver le pays représenté par le drapeau.</li>
          <li>Pour chaque bonne réponse, votre score augmente d'un certain nombre de point.</li>
       </ul>
    <li> Le deuxième type : <br> Vous devez vous inscrire pour jouer la version complète.</li>
        <ul>
          <li>En gros, vous avez la même chose avec le premier type avec quelques trucs de plus.</li>
          <li>Vous avez un nombre ilimité de questionnaires.</li>
          <li>vous avez le choix de choisir que quel continent vous voulez jouer ou même sur la totalité de la carte.</li>
        </ul>
  </ol>
  <h3 class="sous">Modes de jeu </h3>
  <p>Vous avez deux modes de jeu </p>
  <ol>
      <li>Mode restreint : <br>Ce mode est pour le type de questionnaire qui ne demande pas une inscription.</li>
          <ul>
              <li>On restreint le jeu des drapeaux à un seul continent.</li>
          </ul>
      <li>Mode large : <br> Ce mode est uniquement résérvé pour le type de questionnaires qui demande une inscription.</li>
          <ul>
              <li>On joue sur la totalité de la carte du monde.</li>
          </ul>
  </ol>
  
  <hr>
  <ul>
      <li>Si vous voullez jouer sans faire une inscription, veuillez cliquer sur <a href="jouer.php" >ce lien. </a> </li>
      <li>Si vous voullez obtenir la version complète du jeu, veuillez inscrire sur <a href="inscription.php">ce lien.</a> </li>
      <li>Ou si vous êtes déjà inscrit, veuillez cliquez sur <a href="connexion.php">ce lien</a> pour vous connectez.</li>
  </ul>
</div>


<?php require("footer.php")?>