<?php 
require_once("connexion.php");

?>
<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Connexion</title>
</head>
<body>
    <div id="container">
        <form action="" method="post" class="formulaire">
            <h1>Connexion</h1>
            <label for="Username"><b>Nom d'utilisateur : </b></label>
            <input type="text" name="txtlogin" id="Username" placeholder="Entrer votre nom d'utilisateur" class="zonetext">

            <label for="password"><b>Mot de passe :</b></label>
            <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe"  class="zonetext">
            <input type="submit" value="Connexion" name="btsubmit" id="submit" class="submit">  

        <?php

        if(isset($_POST['btsubmit']))
        {
            $req="SELECT * FROM `utilisateurs` WHERE `id`='".$_POST['txtlogin']."' AND `password`='".$_POST['password']."'";
          if  ($result=mysqli_query($connect,$req))
          {
            $ligne=mysqli_fetch_assoc($result);
            if($ligne!=0)
            {
                session_start();
                $_SESSION['monLogin']=$_POST['txtlogin'];
                header("location:Accueil.php");
            }
            else{
                echo "<p style='color:red'>Login ou mot de passe incorrect</p>";
            }
          }
        }
      
       
    ?>

        </form>
    </div>

      
    
</body>
</html>