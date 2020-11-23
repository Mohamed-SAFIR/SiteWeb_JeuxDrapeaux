<?php

    session_start();
    $errors=array();

    if(questionnaire_verifie($_POST['sprQues'])){
        $errors['questionnaireExiste'] = "Ce questionnaire n'existe pas !!! ";
    }

    if(!empty($errors)){    
        $_SESSION['erreurs'] = $errors;
        header("Location: ../view/mainAdmin.php");
    }
    else{
        $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try{
            $commande='DELETE FROM questionnaire WHERE questionnaire=:sprQues';
            $requette= $bdd->prepare($commande);
            $requette->bindParam(':sprQues',$_POST['sprQues']);
            $requette->execute();
            header("Location: ../view/mainAdmin.php");
        }
        catch (PDOException $e) {
            echo utf8_encode("Echec de Insertion : " . $e->getMessage() . "\n");
            die(); // On arrête tout.

        }
    }

    function questionnaire_verifie($questionnaire){
        $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql="SELECT * FROM questionnaire WHERE questionnaire=:questionnaire";
        try{
            $commande = $bdd->prepare($sql);
            $commande->bindParam(':questionnaire',$questionnaire);
            $commande->execute();
            $resultat = $commande->fetch();
        }
        catch (PDOException $e)
        {
            echo ("Echec d'insertion :". $e->getMessage()."\n");
            die();
        }
        return empty($resultat);
    }

?>