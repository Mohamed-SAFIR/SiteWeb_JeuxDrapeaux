<?php

    session_start();
    $errors=array();


    if(email_verification($_POST['sprJr']))
    {
        $errors['questionnaireExiste'] = "Ce joueur n'existe pas !!! ";    
    }
    if(!empty($errors)){    
        $_SESSION['erreurs'] = $errors;
        header("Location: ../view/mainAdmin.php");
    }
    else{
        $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        try{
            $commande='DELETE FROM espaceMembre WHERE mail=:sprJr';
            $requette= $bdd->prepare($commande);
            $requette->bindParam(':sprJr',$_POST['sprJr']);
            $requette->execute();
            header("Location: ../view/mainAdmin.php");
        }
        catch (PDOException $e) {
            echo utf8_encode("Echec de Insertion : " . $e->getMessage() . "\n");
            die(); // On arrête tout.

        }
    }

    function email_verification($mail)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeu_drapeaux', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql="SELECT * FROM espaceMembre WHERE mail=:mail";
        try
        {
            $requete = $bdd->prepare($sql);
            $requete->bindParam(':mail',$mail);
            $requete->execute();
            $resultat = $requete->fetch();
        }
        catch (PDOException $e)
        {
            echo ("Echec d'insertion :". $e->getMessage()."\n");
            die();
        }
        return empty($resultat); // return FALSE si le resultat existe et non-vide.

    }
?>