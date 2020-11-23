<?php

    $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    $id_qst=$_POST["id_qst"];

    try{
        $commande = $bdd->prepare('SELECT * FROM questionnaire');
        $commande->bindParam(':id_qst',$id_qst);
        $commande->execute();
        $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultat);
    }
    catch (PDOException $e) {
        echo utf8_encode("Echec de Insertion : " . $e->getMessage() . "\n");
        die(); // On arrête tout.
    }


?>