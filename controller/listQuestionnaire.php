<?php 

        $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try{
            $commande = $bdd->prepare('SELECT * FROM questionnaire');
            $commande->execute();
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($resultat);
        }
        catch (PDOException $e) {
            echo utf8_encode("Echec de Insertion : " . $e->getMessage() . "\n");
            die(); // On arrête tout.
        }


?>