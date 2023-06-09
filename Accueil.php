<?php
require_once ('connexion.php');?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    
    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Accueil</title>
    <style>

 .myphoto {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: 1px solid #fff;

   
}  

    </style>
    

</head>
<body>

    <div id="global">

        <div id="profil">
             <?php 

            session_start();
            echo "Bienvenue ".$_SESSION['monLogin']."<br/>";
            $req="SELECT * FROM `utilisateurs` WHERE `id`='".$_SESSION['monLogin']."'";
            $result = mysqli_query($connect, $req);
            $ligne = mysqli_fetch_assoc($result);

             ?>
            <img src="<?php echo $ligne ['my_photo']; ?>" class="myphoto">
            <br><a href="deconnexion.php">Déconnexion</a></br>
    

        </div>

        <div id="tableaubord">

        <?php include("tableau_de_bord.php") ?>

        </div>
      
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>  

       </body>
</html>