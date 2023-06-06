<?php
session_start();

require_once('connexion.php');

if(isset($_SESSION['id'])){
    header('Location: index.php'); 
    exit;
}

// Si la variable "$_POST" contient des informations alors on les traitres
if(!empty($_POST)){
    extract($_POST);
    $valid = true;

//On se place sur le bon formulaire grace au "name" de la balise "input"

if(isset($_POST['inscription'])){
    $nom = htmlentities(trim($nom)); //récupération du nom     //les htmlentities pour éviter les message d'alerte lors sortie et l'enregistrement bdd, trim permet d'enlever les espaces avant et aprés
    $prenom = htmlentities(trim($prenom)); //récuperation du prenom
    $mail = htmlentities(strtolower(trim($mail))); //récuperation adresse mail //strtolower permet d'écrire mail tt en minuscule
    $num = htmlentities(trim($num));//récuperation num
    $mdp = trim($mdp); //récuperation du mdp
    $confmdp = trim($confmdp);//récuperation la confirmation du mdp

    //On vérifit le nom

    if(empty($nom)){
        $valid = false;
        $er_nom = "Le nom d'utilisateur ne peut pas être vide ";
    }

    //On vérifit le prénom 
    if(empty($prenom)){
        $valid = false;
        $er_prenom = "Le prenom d'utilisateur ne peut pas être vide"; 
    }

    //On vérifit l'adress email 

    if(empty($mail)){
        
        $valid = false; 
        $er_mail = "Le mail ne peut pas être vide";  

        //on vérifit que le mail est dans le bon format 
    }elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
        $valid = false; 
        $er_mail = "Le mail n'est pas valide";

      
    }

    //On vérifit le mdp

    if(empty($mdp)) {
        $valid = false;
        $er_mdp = "Le mot de passe ne peut pas être vide"; 

    }elseif($mdp != $confmdp){
        $valid = false; 
        $er_mdp ="La confirmation du mot de passe ne correspond pas"; 
    }
     //Si toutes les conditions sont remplies alors on fait le traitement 

     if($valid){

        //$mdp = crypt($mdp,"$6$rounds=5000$loubnahaddadjhgfdsqerhklioijjkhhgsellamjhgugug20av1989$");

        $date_creation_compte = date('Y-m-d H:i:s');


        //On insert nos données dans la table users

        $reqAdd = "INSERT INTO users(nom,prenom,mail,num,mdp,date_creation_compte) VALUES (?,?,?,?,?,?)".array($nom, $prenom, $mail, $num, $mdp, $date_creation_compte);

       header('Location: index.php');
       exit;
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300;400&family=Great+Vibes&family=Montserrat:ital,wght@1,200&family=Poppins&family=Rajdhani:wght@300;400&family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Inscription</title>
</head>
<body>
     
    <div id="para">Remplissez le formulaire ci-dessous :</div>
    <form method="post" id="form">

    <?php
    if (isset($er_nom)){

        ?>
        <div><?= $er_nom ?></div>

    <?php
    }

    ?>

    <input type="text" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>

    <?php
    if (isset($er_prenom)){
        ?>
        <div><?= $er_prenom ?></div>
        <?php
    }
    ?>
    <input type="text" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>

 
    <?php
    if(isset($er_mail)){
        ?>
        <div><?= $er_mail ?></div>
        <?php
    }

    ?>

    <input type="email" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required>

    <?php 
    if(isset($er_phone)){
        ?>
        <div><?= $er_phone ?></div>
        <?php
    }

    ?>

    <input type="text" placeholder="Numéro de téléphone" name="num" value="<?php if(isset($num)){ echo $num; }?>" required>

    <?php
        if(isset($er_mdp)){
            ?>
            <div><?= $er_mdp ?></div>
            <?php
        }

        ?>

        <input type="password" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
        <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
        <button type="submit" class="btnsubmit" name="inscription">Envoyer</button>
          </form>
    </body>
</html>