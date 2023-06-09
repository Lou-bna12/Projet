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
    $ville = trim($ville); //récuperation du mdp
    $cp = trim($cp);//récuperation la confirmation du mdp

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

    //On vérifit num

    if(empty($num)){
        $valid = false;
        $er_num = "Le numéro de téléphone ne peut pas être vide";
    }

    //On vérifit la ville 

    if(empty($ville)){
        $valid = false; 
        $er_ville = "Le champ ville ne peut être vide";
    }
    //On vérifit le cp

    if(empty($cp))
       $valid = false;
       $er_cp = "Le code postal ne peut pas être vide";

        //On insert nos données dans la table users

        $reqAdd = "INSERT INTO users(nom,prenom,mail,num,mdp,ville,cp) VALUES (?,?,?,?,?,?)".array($nom, $prenom, $mail, $num, $mdp, $ville, $cp);

       header('Location: index.php');
       exit;

      }
    }
?>

<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css" type="text/css">

    <title>Inscription</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Nos services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Prendre un rendez-vous</a>
        </li>
        <li class="nav-item">
         <a href="login.php" class="nav-link">Connexion</a>
       </li>
     </ul>
    </div>
  </div>
</nav>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Garage V.Parrot</a></li>
    <li class="breadcrumb-item active" aria-current="page">Prendre un rendez-vous</li>
  </ol>
</nav>
    <div>
        <h1>Remplissez le formulaire ci-dessous : </h1>
        <h4>
        Pour l'entretien de votre véhicule, quelle que soit la marque, vidange, réglage de train, pneumatiques ou autres veuillez prendre un rendez-vous.
  </h4>
</div>

<form class="row g-4 needs-validation" novalidate metho="post">
  <div class="col-md-10 position-relative">
    <label for="validationTooltip01" class="form-label">Nom : </label>
    <?php
    if(isset($er_nom)){
        ?>
         <div><?= $er_nom ?></div>
         <?php
    }
    ?>
    <input type="text" class="form-control" placeholder="Votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
     </div>

  <div class="col-md-10 position-relative">
    <label for="validationTooltip02" class="form-label">Prénom :</label>
    <?php
    if (isset($er_prenom)){
        ?>
        <div><?= $er_prenom ?></div>
        <?php
    }
    ?>
    <input type="text" class="form-control" placeholder="Votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
     </div>

  <div class="col-md-10 position-relative">
    <label for="validationTooltipUsername" class="form-label">Adresse mail : </label>
    <?php
    if(isset($er_mail)){
        ?>
        <div><?= $er_mail ?></div>
        <?php
    }

    ?>
   
    <div class="input-group has-validation">
      <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
      <input type="email" class="form-control" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>" required</div>
</div>

  <div class="col-md-10 position-relative">
    <label for="validationTooltip03" class="form-label">Numéro de téléphone :</label>
    <?php 
    if(isset($er_num)){
        ?>
        <div><?= $er_num ?></div>
        <?php
    }

    ?> 
    <input type="text"  placeholder="Numéro de téléphone" name="num" value="<?php if(isset($num)){ echo $num; }?>" required>
     </div>

  <div class="col-md-10 position-relative ">
    <select class="form-select" type="text" name="ville" value="<?php if(isset($ville)){echo $ville; }?>" required>
      <option selected disabled value="">Choisir votre ville...</option>
      <option>Angers</option>
      <option>Cholet</option>
     
    </select>
    
  </div>
  <div class="col-md-10 position-relative">
    <label for="validationTooltip05" class="form-label">Code postal :</label>
    <?php

if(isset($er_cp)){
    ?>
    <div><?= $er_ ?></div>
    <?php
}

?>


    <input type="text" class="form-control" placeholder="Veuillez saissir votre code postal" name="cp" value="<?php if(isset($cp)){echo $cp; }?>" required>
  </div>


  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre motif  " rows="3"></textarea>
</div>

  <div class="col-10">
    <button class="btn btn-success" name="inscription" type="submit">Envoyer</button>
  </div>
</form>  

<section class="footer">
  <div class="social">
     <a href="#"><i class="fab fa-instagram"></i></a>
     <a href="#"><i class="fab fa-telegram"></i></a>
     <a href="#"><i class="fab fa-facebook"></i></a>
     <a href="#"><i class="fab fa-twitter"></i></a>
  </div>

  <ul class="list">
    <li>
      <a href="#">Home</a>
    </li>

    <li>
      <a href="#">Services</a>
    </li>

    <li>
      <a href="#">À propos</a>
      </li>

      <li>
        <a href="#">Termes</a>
        </li>

        <li>
          <a href="#">Politique de confidentialité</a>
          </li>

  </ul>
<p class="copyright">
   Future Coders @ 2023
  </p>
     
</section

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>
</html>