<?php
require_once 'connexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="style.css" rel="stylesheet">
    <title>Accueil</title>
</head>
<body>
    <div id="globale">

        <div id="profile">
             <?php 
            session_start();
            echo "Bienvenue ".$_SESSION['monLogin']."<br/>";
            $req="SELECT * FROM `utilisateurs` WHERE `id`='".$_SESSION['monLogin']."'";
            $result = mysqli_query($connect, $req);
            $ligne = mysqli_fetch_assoc($result);

             ?>
            <img src="<?php echo $ligne ['my_photo'] ?>" class="myphoto">
            <br>
            <a href="deconnexion.php" class="deconnexion">Déconnexion</a>

        </div>

        <div id="tableaubord">

        </div>
           

    
</body>
</html>